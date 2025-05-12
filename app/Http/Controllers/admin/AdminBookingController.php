<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Repositories\Interface\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;


use App\Helpers\helpers;
use App\Http\Controllers\BookingController;
use App\Mail\ExampleMail;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
class AdminBookingController extends Controller
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
    //
    public function index()
    {
        $title = 'Danh sách người dùng Booking';
        $users = DB::table('booking')->get();
        // dd($users);
        return view('admin.booking.index', compact('users', 'title'));
    }

    public function showDataTable()
    {
        $bookings = Booking::get();
        return response()->json(['data' => $bookings]);
    }

    public function showDataTransactionsTable() {
        // Gọi api giao dịch
        $response = Http::get('https://sbaygroup.net/global-apis/bun-vcb.php', [
            'key' => env('PAYMENT_VCB_KEY', 'tin_sbay_key_vcb'),
            'gidzl' => env('PAYMENT_VCB_GIDZL')
        ]);
        
        if ($response !== null) {
            $data = json_decode($response, true);

            if (json_last_error() === JSON_ERROR_NONE) {
                $filteredData = collect($data['data'] ?? [])->filter(function ($item) {
                    $createdAt = Carbon::createFromTimestamp($item['createdAt']);
                    $threeDaysAgo = Carbon::now()->subDays(3);

                    return $createdAt >= $threeDaysAgo
                        && strpos($item['memo'], 'HD') === 0
                        && $item['type'] === 'deposit';
                })->values()->all();
                // Đảm bảo trả về một mảng, ngay cả khi không có dữ liệu
                return response()->json(['data' => $filteredData]);
            } else {
                return response()->json([]);
            }
        } else {
            return response()->json([]);
        }
    }
    
    public function show($id)
    {
    $token = Helpers::getToken($this->main_url, $this->client_id, $this->client_secret);
    $client = new Client();
    try {
        $response = $client->get($this->main_url . '/v3/booking?code=' . $id, [
            'headers' => [
                'Postman-Token' => (string) $token,
                'cache-control' => 'no-cache',
                'Authorization' => 'Bearer ' . $token,
            ]
        ]);
        $responseBody = json_decode($response->getBody(), true);
        if (!empty($responseBody['data'])) {
            $booking = $responseBody['data'][0];
            $bookingData = [
                'booking_id' => $booking['booking_id'],
                'status' => $booking['status'],
                'description' => $booking['description'],
                'final_price' => $booking['final_price'] ?? 0,
                'from' => $booking['from'],
                'to' => $booking['to'],
                'trip_name' => $booking['trip_name'],
                'trip_date' => $booking['trip_date'],
                'pickup_time' => $booking['pickup_time'],
                'drop_off_time' => $booking['drop_off_time'] ?? null,
                'created_user' => $booking['created_user'], 
                'created_date' => $booking['created_date'],
                'customer' => [
                    'customer_id' => $booking['customer_id'],
                    'name' => $booking['customer']['name'],
                    'phone' => $booking['customer']['phone'],
                    'email' => $booking['customer']['email'],
                ],
                'seat_codes' => $booking['seat_codes'] ?? [],
                'company' => $booking['company'],
                'comp_id' => $booking['comp_id'],
                'agent_id' => $booking['agent_id'],
                'is_confirmed' => $booking['is_confirmed'] ?? false,
                'is_bms_confirmed' => $booking['is_bms_confirmed'] ?? false,
                'cancelled_date' => $booking['cancelled_date'],
                'arrival_date' => $booking['arrival_date'],
                'bo_phone_info' => $booking['bo_phone_info'] ?? null,
            ];
            
            if (isset($booking['ticket']) && !empty($booking['ticket']['detail_info'])) {
                $tickets = [];
                foreach ($booking['ticket']['detail_info'] as $ticketDetail) {
                    $tickets[] = [
                        'code' => $ticketDetail['id'],
                        'status' => $ticketDetail['status'],
                        'fare' => $ticketDetail['fare'], // Thêm giá vé nếu cần
                        'customer_name' => $ticketDetail['customer_name'], // Thêm tên khách hàng nếu cần
                        'customer_phone' => $ticketDetail['customer_phone'], // Thêm số điện thoại nếu cần
                        'pickup_time' => $ticketDetail['pickup_time'], // Thêm thời gian đón nếu cần
                        'drop_off_time' => $ticketDetail['drop_off_time'],  
                        'seat'=>$ticketDetail['seat'], // Thêm thời gian trả nếu cần
            ];
            }
                $bookingData['ticket'] = $tickets;
            } else {
                $bookingData['ticket'] = [];
            }
            // dd($bookingData);
            return view('admin.booking.booking_detail', ['arrayData' => $bookingData]);
        } else {
            return response()->json(['message' => 'Booking not found.'], 404);
        }
       
    } catch (Exception $e) {
        // Xử lý lỗi
        return response()->json(['message' => 'Error occurred: ' . $e->getMessage()], 500);
    }
    }
    
        public function edit($id)
        {

            $user = DB::table('booking')->where('id', $id)->first();


            if ($user) {
                return response()->json(['success' => true, 'user' => $user]);
            } else {
                return response()->json(['success' => false, 'error' => 'Không tìm thấy người dùng.'], 404);
            }
        }

    public function update(Request $request, $id)
    {
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'seats' => 'required|string',
            'code' => 'nullable|string',
            'booking_code' => 'nullable|string',
            'ticket' => 'required|string',
            'price' => 'required|string',
            'pickup_id' => 'nullable|string',
            'droff_off_info' => 'nullable|string',
            'droff_off_point_id' => 'nullable|string',
            'status' => 'required|string',
        ]);

        // Lấy thông tin booking theo ID
        $booking = Booking::where('id', $id)->first();

        // Nếu không tìm thấy booking
        if (!$booking) {
            return response()->json([
                'success' => false,
                'message' => 'Không tìm thấy thông tin đặt chỗ.'
            ], 404);
        }

        $bookingController = new BookingController();
        $dataBooking = $bookingController->getInfoBookings($booking->booking_code);
        
        if ($request->status == config('apps.common.status_booking.paid')) {
            $paymentBooking = $bookingController->paymentBooking($booking->booking_code);

            if ($paymentBooking != null) {
                $booking->ticket_code = $paymentBooking['ticket_code'];
                $booking->vxr_transaction_id = $paymentBooking['vxr_transaction_id'];
                $booking->status = config('apps.common.status_booking.paid');
                
                Mail::to($booking->customer_email)->send(new ExampleMail($dataBooking));
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Không tìm thấy Booking'
                ]);
            }
        } else if ($request->status == config('apps.common.status_booking.cancel')) {
            $cancelBooking = $bookingController->cancelBooking($booking->booking_code);
            if ($cancelBooking != null) {
                $booking->status = config('apps.common.status_booking.cancel');

                Mail::to($booking->customer_email)->send(new ExampleMail($dataBooking));
            } else {
                return response()->json([
                    'success' => false,
                    'message' => "Booking đã bị huỷ"
                ]);
            }
        } else {
            $booking->status = $request->status;
        }
        
        $booking->customer_name     = $request->name;
        $booking->customer_email    = $request->email;
        $booking->customer_phone    = $request->phone;
        $booking->seats             = $request->seats;
        $booking->code              = $request->code;
        $booking->booking_code      = $request->booking_code;
        $booking->tickets           = $request->ticket;
        $booking->price             = $request->price;
        $booking->pickup_id         = $request->pickup_id;
        $booking->drop_off_info     = $request->droff_off_info;
        $booking->drop_off_point_id = $request->droff_off_point_id;
        $booking->save();

        return response()->json([
            'success' => true,
            'message' => 'Cập nhật thông tin đặt chỗ thành công.'
        ]);
    }

}
