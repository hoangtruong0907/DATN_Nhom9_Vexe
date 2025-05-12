<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\helpers;
use App\Mail\ExampleMail;
use App\Models\Booking;
use Carbon\Carbon;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
class BookingController extends Controller
{
    private $main_url;
    private $route_url;
    private $client_id;
    private $client_secret;
    private $use_profile_url;

    public function __construct()
    {
        $this->main_url = env('VXR_ACOUNT_SERVICE_URL_TEST');
        $this->route_url = env('VXR_ROUTE_URL_TEST');
        $this->use_profile_url = env('VXR_USER_PROFILE_URL_TEST');
        $this->client_id = env('VEXERE_CLIENT_ID');
        $this->client_secret = env('VEXERE_CLIENT_SECRET');
    }
    public function index(Request $request)
    {
        $seatInfo = $request->all();
        // dd($seatInfo);
        $token = Helpers::getToken($this->main_url, $this->client_id, $this->client_secret);
        $tripCode = $seatInfo['trip_code'];
        if (!$token) {
            return response()->json([
                'error' => 'Failed to retrieve token',
            ], 500);
        }

        $urlSeatMap = $this->main_url . "/v3/trip/seat_map?trip_code=" . $tripCode;
        $seatMap = Helpers::cacheData("seat-map-bus-" . $tripCode, $token, $urlSeatMap, 60 * 10);
        $pickup_points = $seatMap['pickup_points'];
        $transfer_points = $seatMap['transfer_points_at_arrive'];
        $drop_points = $seatMap['drop_off_points_at_arrive'];

        $selectedPickupPoint = [];
        $selectedDropPoint = [];

        foreach ($pickup_points as $point) {
            if (isset($point['point_id']) && $point['point_id'] == $seatInfo['pickup_id']) {
                $selectedPickupPoint = $point;
            }
        }

        foreach ($drop_points as $point) {
            if (isset($point['point_id']) && $point['point_id'] == $seatInfo['drop_off_point_id']) {
                $selectedDropPoint = $point;
            }
        }
        // dd($selectedDropPoint, $selectedPickupPoint);
        $seatData = json_decode($request->input('seatData'), true);

        $data = [
            "seatInfo" => $seatInfo,
            "seatTicket" => $seatData,
            "seatMap" => $seatMap,
            'pickup_points' => $pickup_points,
            'transfer_points' => $transfer_points,
            'drop_points' => $drop_points,
            'selectedPickupPoint' => $selectedPickupPoint,
            'selectedDropPoint' => $selectedDropPoint,
            'seatTemplateMap' => $seatMap['coach_seat_template'] ?? [],
        ];
        // dd($data);
        return view('payment.bookingconfirmation', [
            "seatInfo" => $seatInfo,
            "seatTicket" => $seatData,
            "seatMap" => $seatMap,
            'pickup_points' => $pickup_points,
            'transfer_points' => $transfer_points,
            'drop_points' => $drop_points,
            'selectedPickupPoint' => $selectedPickupPoint,
            'selectedDropPoint' => $selectedDropPoint,
            'seatTemplateMap' => $seatMap['coach_seat_template'] ?? [],
            'data' => json_encode($data),
        ]);
    }

    public function store(Request $request) {

        $data_booking = $request->all();
        try {
            // Post api
            $token = Helpers::getToken($this->main_url, $this->client_id, $this->client_secret);
            $uniqueToken = Str::uuid();
            $client = new Client();
            $response = $client->post( $this->main_url.'/v3/booking/reserve', [
                'headers' => [
                    'Postman-Token' => (string) $uniqueToken,
                    'cache-control' => 'no-cache',
                    'Authorization' => 'Bearer ' .  $token,
                    'Content-Type' => 'application/x-www-form-urlencoded',
                ],
                'form_params' => [
                    'trip_code' => $request->trip_code,
                    'seats' => $request->seats,
                    'customer_phone' => $request->customer_phone,
                    'customer_name' => $request->customer_name,
                    'customer_email' => $request->customer_email,
                    'pickup_id' =>  $request->pickup_id,
                    'drop_off_info' => $request->drop_off_info,
                    'drop_off_point_id' => $request->drop_off_point_id,
                ],
            ]);
            $responseBody = json_decode($response->getBody(), true);

            $booking = Booking::create([
                'order_code'        => 'HD' .substr(time(), -4) .substr(str_shuffle('0123456789'), 0, 4),
                'trip_code'         => $request->trip_code,
                'user_id'           => Auth::user() ? Auth::id() : null,
                'customer_name'     => $request->customer_name,
                'customer_phone'    => $request->customer_phone,
                'customer_email'    => $request->customer_email,
                'seats'             => $request->seats,
                'code'              => $responseBody['data']['code'],
                'booking_code'      => $responseBody['data']['booking_code'],
                'tickets'           => implode(',', $responseBody['data']['tickets']),
                'price'             => $request->price,
                'pickup_id'         => $request->pickup_id,
                'drop_off_info'     => $request->drop_off_info,
                'drop_off_point_id' => $request->drop_off_point_id,
                'status'            => config('apps.common.status_booking.reserve'),
            ]);

            $booking->save();
            $order_code = $booking->order_code;
            $order_price = $booking->price;

            // Save variables in the session
            session([
                'order_code' => $order_code,
                'order_price' => $order_price,
                'info_booking' => $data_booking,
                // 'data_booking' => $data_booking['data'],
            ]);
            return redirect()->route('payment');

        } catch (RequestException $e) {
            if ($e->hasResponse()) {
                $statusCode = $e->getResponse()->getStatusCode();
                $errorMessage = $e->getResponse()->getBody()->getContents();

                return response()->json([
                    'error' => 'Client error',
                    'status_code' => $statusCode,
                    'message' => $errorMessage
                ], $statusCode);
            } else {
                return response()->json(['error' => 'Request failed'], 500);
            }
        }
    }

    public function paymentBooking ($bookingCode) {
        // Post api
       try {
            $token = Helpers::getToken($this->main_url, $this->client_id, $this->client_secret);
            $uniqueToken = Str::uuid();
            $client = new Client();
            $response = $client->post( $this->main_url.'/v3/booking/pay', [
                'headers' => [
                    'Postman-Token' => (string) $uniqueToken,
                    'cache-control' => 'no-cache',
                    'Authorization' => 'Bearer ' .  $token,
                    'Content-Type' => 'application/x-www-form-urlencoded',
                ],
                'form_params' => [
                    'code' => $bookingCode,
                ],
            ]);
            $responseBody = json_decode($response->getBody(), true);
            return $responseBody['data'];
       } catch (\Exception $e) {
            return null;
       }
    }

    public function cancelBooking ($order_code) {
       try {
            $booking = Booking::where(['order_code'=> $order_code])->first();
            $booking->status = config('apps.common.status_booking.cancel');
            $booking->save();

            $token = Helpers::getToken($this->main_url, $this->client_id, $this->client_secret);
            $uniqueToken = Str::uuid();
            $client = new Client();
            $response = $client->post( $this->main_url.'/v3/booking/refund', [
                'headers' => [
                    'Postman-Token' => (string) $uniqueToken,
                    'cache-control' => 'no-cache',
                    'Authorization' => 'Bearer ' .  $token,
                    'Content-Type' => 'application/x-www-form-urlencoded',
                ],
                'form_params' => [
                    'code' => $order_code,
                ],
            ]);
            $responseBody = json_decode($response->getBody(), true);
            return $responseBody;
       } catch (\Throwable $th) {
            return null;
       }
    }

    public function updateBookingStatus(Request $request)
    {
        $check_memo = $request->order_code; // truyền vào order_code
        $check_type = "deposit";    // chỉ lấy giao dịch nhận
        $check_date = Carbon::now()->format('d/m/Y'); // Lấy giao dịch trong ngày hôm nay

        // Gọi api giao dịch
        $response = Http::get('https://sbaygroup.net/global-apis/bun-vcb.php', [
            'key' => env('PAYMENT_VCB_KEY', 'tin_sbay_key_vcb'),
            'gidzl' => env('PAYMENT_VCB_GIDZL')
        ]);

        $status = $request->status;
        $orderCode = $request->order_code;
        $statusConfig = config('apps.common.status_booking');

        // Xử lý trạng thái hủy
        if ($status == $statusConfig['cancel']) {
            $this->cancelBooking($orderCode);
            $booking = Booking::where('order_code', $orderCode)->first();

            if ($booking) {
                $data = $this->getInfoBookings($booking->booking_code);
                Mail::to($booking->customer_email)->send(new ExampleMail($data));
            }

            return $this->updateSessionAndRespond($statusConfig['cancel'], 'Success', '/payment-result');
        }
        // Xử lý trạng thái chờ
        else if ($status == $statusConfig['pending']) {
            $booking = Booking::where('order_code', $orderCode)->first();
            if ($booking) {
                $booking->status = $statusConfig['pending'];
                $booking->save();

                $data = $this->getInfoBookings($booking->booking_code);
                Mail::to($booking->customer_email)->send(new ExampleMail($data));
            }

            return $this->updateSessionAndRespond($statusConfig['pending'], 'Success', '/payment-result');
        }
        // Xử lý trạng thái giữ chỗ
        else if ($response->successful() && $status == $statusConfig['reserve']) {
            $result = array_reduce($response->json()['data'], function ($carry, $item) use ($check_memo, $check_type, $check_date) {
                return ($item['memo'] == $check_memo && $item['type'] == $check_type && $item['date'] == $check_date) ? $item : $carry;
            });

            if ($result != null) {
                $amount = intval(str_replace([',', '+'], '', $result['money']));
                $booking = Booking::where(['order_code' => $orderCode, 'price' => $amount])->first();

                if ($booking) {
                    $paymentBooking = $this->paymentBooking($booking->booking_code);
                    if ($paymentBooking != null) {
                        $booking->ticket_code = $paymentBooking['ticket_code'];
                        $booking->vxr_transaction_id = $paymentBooking['vxr_transaction_id'];
                        $booking->status = $statusConfig['paid'];
                        $booking->save();

                        $data = $this->getInfoBookings($booking->booking_code);
                        Mail::to($booking->customer_email)->send(new ExampleMail($data));

                        return $this->updateSessionAndRespond($statusConfig['paid'], 'Success', '/payment-result');
                    } else {
                        return $this->updateSessionAndRespond($statusConfig['reserve'], 'Success', '/payment-result');
                    }
                } else {
                    return $this->updateSessionAndRespond($statusConfig['reserve'], 'Không tìm thấy Booking', '', 400);
                }
            } else {
                return $this->jsonResponse(400, 'Không tìm thấy Booking trong api');
            }
        } else {
            return $this->jsonResponse(400, 'Api error');
        }
    }

    private function updateSessionAndRespond($status, $message, $url, $code = 200)
    {
        session(['order_status' => $status]);
        return response()->json(['code' => $code, 'message' => $message, 'url' => $url]);
    }

    private function jsonResponse($code, $message, $url = '')
    {
        return response()->json(['code' => $code, 'message' => $message, 'url' => $url]);
    }


    public function getInfoBookings($booking_code) {
        $token = Helpers::getToken($this->main_url, $this->client_id, $this->client_secret);
        $client = new Client();
        $response = $client->request('GET', 'https://uat-api.vexere.net/v3/booking', [
            'query' => ['code' => $booking_code],
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => "Bearer $token",
            ]
        ]);

        $data = json_decode($response->getBody(), true);
        return $data['data'];
    }


    public function bookingConfirmationTrain (Request $request) {
        $seatMap = [
            'data' => [
                'coach_seat_template' => [
                    [
                        'coach_name' => 'Toa A',
                        'row_num' => 5,
                        'col_num' => 4,
                        'seats' => [
                            ['row_num' => 1, 'col_num' => 1, 'is_available' => false, 'seat_code' => 'HL', 'full_code' => 'A1'],
                            ['row_num' => 1, 'col_num' => 2, 'is_available' => true, 'seat_code' => 'A2', 'full_code' => 'A2'],
                            ['row_num' => 1, 'col_num' => 3, 'is_available' => true, 'seat_code' => 'A3', 'full_code' => 'A3'],
                            ['row_num' => 1, 'col_num' => 4, 'is_available' => false, 'seat_code' => 'A4', 'full_code' => 'A4'],
                            ['row_num' => 2, 'col_num' => 1, 'is_available' => true, 'seat_code' => 'A5', 'full_code' => 'A5'],
                            ['row_num' => 2, 'col_num' => 2, 'is_available' => false, 'seat_code' => 'HL', 'full_code' => 'A6'],
                            ['row_num' => 2, 'col_num' => 3, 'is_available' => true, 'seat_code' => 'A7', 'full_code' => 'A7'],
                            ['row_num' => 2, 'col_num' => 4, 'is_available' => true, 'seat_code' => 'A8', 'full_code' => 'A8'],
                            ['row_num' => 3, 'col_num' => 1, 'is_available' => true, 'seat_code' => 'A9', 'full_code' => 'A9'],
                            ['row_num' => 3, 'col_num' => 2, 'is_available' => true, 'seat_code' => 'A10', 'full_code' => 'A10'],
                            ['row_num' => 3, 'col_num' => 3, 'is_available' => false, 'seat_code' => 'A11', 'full_code' => 'A11'],
                            ['row_num' => 3, 'col_num' => 4, 'is_available' => true, 'seat_code' => 'A12', 'full_code' => 'A12'],
                        ],
                    ],
                    [
                        'coach_name' => 'Toa B',
                        'row_num' => 6,
                        'col_num' => 5,
                        'seats' => [
                            ['row_num' => 1, 'col_num' => 1, 'is_available' => true, 'seat_code' => 'B1', 'full_code' => 'B1'],
                            ['row_num' => 1, 'col_num' => 2, 'is_available' => false, 'seat_code' => 'HL', 'full_code' => 'B2'],
                            ['row_num' => 1, 'col_num' => 3, 'is_available' => true, 'seat_code' => 'B3', 'full_code' => 'B3'],
                            ['row_num' => 1, 'col_num' => 4, 'is_available' => false, 'seat_code' => 'B4', 'full_code' => 'B4'],
                            ['row_num' => 1, 'col_num' => 5, 'is_available' => true, 'seat_code' => 'B5', 'full_code' => 'B5'],
                            ['row_num' => 2, 'col_num' => 1, 'is_available' => true, 'seat_code' => 'B6', 'full_code' => 'B6'],
                            ['row_num' => 2, 'col_num' => 2, 'is_available' => true, 'seat_code' => 'B7', 'full_code' => 'B7'],
                            ['row_num' => 2, 'col_num' => 3, 'is_available' => false, 'seat_code' => 'B8', 'full_code' => 'B8'],
                            ['row_num' => 2, 'col_num' => 4, 'is_available' => true, 'seat_code' => 'B9', 'full_code' => 'B9'],
                            ['row_num' => 2, 'col_num' => 5, 'is_available' => true, 'seat_code' => 'B10', 'full_code' => 'B10'],
                        ],
                    ],
                    [
                        'coach_name' => 'Toa C',
                        'row_num' => 4,
                        'col_num' => 3,
                        'seats' => [
                            ['row_num' => 1, 'col_num' => 1, 'is_available' => false, 'seat_code' => 'C1', 'full_code' => 'C1'],
                            ['row_num' => 1, 'col_num' => 2, 'is_available' => true, 'seat_code' => 'C2', 'full_code' => 'C2'],
                            ['row_num' => 1, 'col_num' => 3, 'is_available' => true, 'seat_code' => 'C3', 'full_code' => 'C3'],
                            ['row_num' => 2, 'col_num' => 1, 'is_available' => true, 'seat_code' => 'C4', 'full_code' => 'C4'],
                            ['row_num' => 2, 'col_num' => 2, 'is_available' => false, 'seat_code' => 'HL', 'full_code' => 'C5'],
                            ['row_num' => 2, 'col_num' => 3, 'is_available' => false, 'seat_code' => 'C6', 'full_code' => 'C6'],
                            ['row_num' => 3, 'col_num' => 1, 'is_available' => true, 'seat_code' => 'C7', 'full_code' => 'C7'],
                            ['row_num' => 3, 'col_num' => 2, 'is_available' => false, 'seat_code' => 'C8', 'full_code' => 'C8'],
                            ['row_num' => 3, 'col_num' => 3, 'is_available' => true, 'seat_code' => 'C9', 'full_code' => 'C9'],
                        ],
                    ],
                ],
            ],
        ];

        $carriage_list = [
            [
                "min_price" => 1601000,
                "price_data" => [
                    [
                        "id" => 3006137,
                        "seat_type" => "AnLT1",
                        "seat_type_description" => "Nằm khoang 4 điều hòa T1",
                        "discount_tg" => 0,
                        "train_tax_fee" => 0,
                        "train_insurance_fee" => 1,
                        "train_fee" => 0,
                        "train_original_fare" => 1703,
                        "discount_pt" => 0,
                        "fare" => 1704
                    ],
                    [
                        "id" => 3808304,
                        "seat_type" => "AnLT2",
                        "seat_type_description" => "Nằm khoang 4 điều hòa T2",
                        "discount_tg" => 0,
                        "train_tax_fee" => 0,
                        "train_insurance_fee" => 1,
                        "train_fee" => 0,
                        "train_original_fare" => 1600,
                        "discount_pt" => 0,
                        "fare" => 1601
                    ]
                ],
                "carriage_number" => 1,
                "carriage_name_app" => "1",
                "carriage_type_app" => "An28L",
                "seat_type_list" => ["AnLT1", "AnLT2"],
                "carriage_description" => "Giường nằm khoang 4 điều hòa",
                "seat_group" => "NAM",
                "total_carriage_seats" => 28,
                "locked_carriage_seats" => 0,
                "available_carriage_seats" => 28,
                "physical_train_id" => 1796,
                "physical_carriage_id" => 12192,
                "carriage_order" => 10,
                "carriage_status" => 1,
                "carriage_layout_app" => 5,
                "physical_seat_key" => null,
                "physical_subseat_key" => null
            ],
            [
                "min_price" => 1601000,
                "price_data" => [
                    [
                        "id" => 3006137,
                        "seat_type" => "AnLT1",
                        "seat_type_description" => "Nằm khoang 4 điều hòa T1",
                        "discount_tg" => 0,
                        "train_tax_fee" => 0,
                        "train_insurance_fee" => 1,
                        "train_fee" => 0,
                        "train_original_fare" => 1703,
                        "discount_pt" => 0,
                        "fare" => 1704
                    ],
                    [
                        "id" => 3808304,
                        "seat_type" => "AnLT2",
                        "seat_type_description" => "Nằm khoang 4 điều hòa T2",
                        "discount_tg" => 0,
                        "train_tax_fee" => 0,
                        "train_insurance_fee" => 1,
                        "train_fee" => 0,
                        "train_original_fare" => 1600,
                        "discount_pt" => 0,
                        "fare" => 1601
                    ]
                ],
                "carriage_number" => 2,
                "carriage_name_app" => "2",
                "carriage_type_app" => "An24L",
                "seat_type_list" => ["AnLT1", "AnLT2"],
                "carriage_description" => "Giường nằm khoang 4 điều hòa",
                "seat_group" => "NAM",
                "total_carriage_seats" => 24,
                "locked_carriage_seats" => 0,
                "available_carriage_seats" => 24,
                "physical_train_id" => 1796,
                "physical_carriage_id" => 1632,
                "carriage_order" => 20,
                "carriage_status" => 1,
                "carriage_layout_app" => 5,
                "physical_seat_key" => null,
                "physical_subseat_key" => null
            ],
            [
                "min_price" => 1088000,
                "price_data" => [
                    [
                        "id" => 2852452,
                        "seat_type" => "NML",
                        "seat_type_description" => "Ngồi mềm điều hòa",
                        "discount_tg" => 0,
                        "train_tax_fee" => 0,
                        "train_insurance_fee" => 1,
                        "train_fee" => 0,
                        "train_original_fare" => 1087,
                        "discount_pt" => 0,
                        "fare" => 1088
                    ]
                ],
                "carriage_number" => 3,
                "carriage_name_app" => "3",
                "carriage_type_app" => "A48L",
                "seat_type_list" => ["NML"],
                "carriage_description" => "Ngồi mềm điều hòa",
                "seat_group" => "NGM",
                "total_carriage_seats" => 48,
                "locked_carriage_seats" => 0,
                "available_carriage_seats" => 48,
                "physical_train_id" => 1796,
                "physical_carriage_id" => 2865,
                "carriage_order" => 30,
                "carriage_status" => 1,
                "carriage_layout_app" => 4,
                "physical_seat_key" => null,
                "physical_subseat_key" => null
            ],
            // Thêm các toa khác tương tự...
        ];




        return view('payment.train_bookingconfirmation', [
            'seatMap' => $seatMap,
            'carriage_list' => $carriage_list,
        ]);
    }
}
