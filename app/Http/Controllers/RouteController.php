<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;
use App\Helpers\helpers;
use App\Models\Banner;
use Carbon\Carbon;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\BlogPostModel;
use App\Models\PostType;

use function PHPUnit\Framework\isNull;

class RouteController extends Controller
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

    public function index()
    {
        $token = Helpers::getToken($this->main_url, $this->client_id, $this->client_secret);

        if (!$token) {
            return response()->json([
                'error' => 'Failed to retrieve token',
            ], 500);
        }

        $all_area = $this->getAllRoute($token);

        $postTypes = BlogPostModel::distinct()->pluck('type');

        // Lấy tất cả các bài viết đã xuất bản và phân trang
        $allPosts = BlogPostModel::where('status', 'published')
            ->orderBy('created_at', 'desc')
            ->where('type', '!=', 'relatedContent')
            ->paginate(10);

        $typeMapping = [
            'blog' => 'Thông tin mới',
            'news' => 'Tin tức',
            'incentives' => 'Ưu đãi nổi bật',
            'vexeretip' => 'Vexere Tip',
            'relatedContent' => 'Nội dung liên quan',
        ];

        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 10; // Số lượng mục mỗi trang
        $currentItems = $allPosts->forPage($currentPage, $perPage);
        $paginator = new LengthAwarePaginator($currentItems, $allPosts->total(), $perPage, $currentPage, [
            'path' => LengthAwarePaginator::resolveCurrentPath(),
        ]);

        $banner_current = Banner::first();

        return view('index', [
            "list_areas" => $all_area['bus'],
            "list_areas_train" => $all_area['train']['train_stations_list'] ?? [],
            'allPosts' => $paginator,
            'typeMapping' => $typeMapping,
            'postTypes' => $postTypes,
            'banner_current' => $banner_current,
        ]);
    }

    private function getAllRoute($token, $key = "all", $time = 60 * 60 * 24)
    {
        $areas = [];
        switch ($key) {
            case 'bus':
                $url = $this->main_url . '/v3/area/city_district';
                $areas = collect(Helpers::cacheData('areas_bus', $token, $url, $time));
                break;
            case 'train':
                $url = $this->route_url . '/v2/agent/train/get_config';
                $areas = collect(Helpers::cacheData('areas_train', $token, $url, $time));
                break;
            case "all":
                $urlBus = $this->main_url . '/v3/area/city_district';
                $areasBus = collect(Helpers::cacheData('areas_bus', $token, $urlBus, $time));
                $urlTrain = $this->route_url . '/v2/agent/train/get_config';
                $areasTrain = collect(Helpers::cacheData('areas_train', $token, $urlTrain, $time));
                $areas = [
                    'bus' => $areasBus,
                    'train' => $areasTrain,
                ];
                break;
        }
        return $areas;
    }

    public function busRouteSearch(Request $request)
    {
        $busTo = $request->query('bus_to') ? (int)($request->query('bus_to')) : "";
        $busFrom = $request->query('bus_from') ? (int)$request->query('bus_from') : "";
        $dateTo = $request->query('date_to') ? formatDate($request->query('date_to')) : "";
        $dateFrom = $request->query('date_from') ? formatDate($request->query('date_from')) : "";
        $token = Helpers::getToken($this->main_url, $this->client_id, $this->client_secret);

        if (!$token) {
            return response()->json([
                'error' => 'Failed to retrieve token',
            ], 500);
        }
        // if ($busTo === null || $busFrom === null || $dateTo === null) {
        //     return response()->json(['error' => 'Missing required parameters.'], 400);
        // }
        $all_area = $this->getAllRoute($token);
        $urlRoute = $this->route_url . '/v2/route?filter[from]=' . $busFrom . '&filter[to]=' . $busTo . '&filter[date]=' . $dateTo;

        $queryParams = [
            'page' => $request->query('page', 1), // Phân trang (mặc định là trang 1)
            'pagesize' => $request->query('pagesize', 8), // Số phần tử mỗi trang (mặc định là 20)
        ];

        // Thêm các tham số vào URL
        foreach ($queryParams as $key => $value) {
            if ($value !== null) {
                $urlRoute .= '&' . $key . '=' . $value;
            }
        }

        // Lấy thông tin từ params
        $params = (object)([
            'busFrom' => (object)$all_area['bus']->where('id', (int)$busFrom)->first(),
            'busTo' => (object)$all_area['bus']->where('id', (int)$busTo)->first(),
            'dateTo' => $dateTo,
            'dateFrom' => $dateFrom,
        ]);

        // Thông tim tuyến đường
        $cacheKeyRoute = 'route_' . $busFrom . '_' . $busTo . '_' . $dateTo;
        // $list_routes = Helpers::cacheData($cacheKeyRoute, $token, $urlRoute, 60 * 20);\
        $res_routes = Helpers::cacheData($cacheKeyRoute, $token, $urlRoute, $queryParams, 60 * 20, true);
        $list_routes = $res_routes['data'];

        //dữ liệu trong fillter
        $dp_points = collect($list_routes)
            ->flatMap(function ($route) {
                return isset($route['route']['pickup_points'])
                    ? collect($route['route']['pickup_points'])->map(function ($point) {
                        return [
                            'district' => $point['district'],
                            'name' => $point['name'] ?? null, // Lấy cột name nếu tồn tại
                        ];
                    })
                    : collect([]);
            })
            ->groupBy('district')
            ->map(function ($group) {
                return [
                    'count' => $group->count(),
                    'names' => $group->pluck('name')->filter()->countBy()
                ];
            });
        $dd_points = collect($list_routes)
            ->flatMap(function ($route) {
                return isset($route['route']['dropoff_points'])
                    ? collect($route['route']['dropoff_points'])->map(function ($point) {
                        return [
                            'district' => $point['district'],
                            'name' => $point['name'] ?? null,
                        ];
                    })
                    : collect([]);
            })
            ->groupBy('district')
            ->map(function ($group) {
                return [
                    'count' => $group->count(),
                    'names' => $group->pluck('name')->filter()->countBy()
                ];
            });
        $companyCounts = collect($list_routes)
            ->groupBy('company.id')
            ->map(function ($group) {
                return [
                    'id' => $group->first()['company']['id'],
                    'name' => $group->first()['company']['name'],
                    'count' => $group->count()
                ];
            });
        $company_name = $companyCounts->sortBy('name');
        $vehicle_type = collect($list_routes)
            ->flatMap(function ($route) {
                return isset($route['route']['schedules'])
                    ? collect($route['route']['schedules'])->pluck('vehicle_type')
                    : collect([]);
            })->countBy();
        $seatTypes = collect($list_routes)
            ->pluck('available_seat_info') // Lấy mảng available_seat_info
            ->map(function ($seatInfo) {
                return [
                    // Kiểm tra nếu 'seat_type' có tồn tại
                    'seat_type' => isset($seatInfo['seat_type']) ? collect($seatInfo['seat_type'])->keys()->first() : null,
                    // Kiểm tra nếu 'seat_group' có tồn tại
                    'seat_group' => isset($seatInfo['seat_group']) ? collect($seatInfo['seat_group'])->keys()->first() : null,
                ];
            })
            // Loại bỏ các phần tử có seat_group hoặc seat_type là null
            ->filter(function ($seatInfo) {
                return !is_null($seatInfo['seat_group']) && !is_null($seatInfo['seat_type']);
            })
            ->groupBy('seat_group') // Nhóm dữ liệu theo seat_group
            ->map(function ($group) {
                return [
                    'count' => $group->count(),
                    'seat_types' => $group->pluck('seat_type')->unique()->values() // Lấy các seat_type
                ];
            });


        // Thông tin ảnh nhà xe
        // $list_routes = $this->addBusImagesToRoutes($token, $list_routes);
        return view("bus.bus_search", [
            "fromtoPlace" => $request->query('q', null),
            "list_routes" => $list_routes,
            "list_areas" => $all_area['bus'],
            "list_areas_train" => $all_area['train']['train_stations_list'] ?? [],
            "params" => $params,
            'currentPage' => $res_routes['page'],
            'pageSize' => $res_routes['page_size'],
            'total' => $res_routes['total'],
            'totalPages' => $res_routes['total_pages'],
            "list_areass" => $all_area['bus'],
            'list_pp_districts' => $dp_points,
            'list_dp_districts' => $dd_points,
            'list_company_count' => $company_name,
            'list_vehicle_type' => $vehicle_type,
            'list_seat_type' => $seatTypes,
        ]);
    }

    private function addBusImagesToRoutes($token, $list_routes)
    {
        foreach ($list_routes as &$route) {
            $cacheKeyImages = 'company_images_' . $route['company']['id'];
            $route['company']['images'] = Cache::remember($cacheKeyImages, 60 * 60, function () use ($token, $route) {
                $res = Http::withToken($token)->get($this->main_url . '/v3/company/' . $route['company']['id'] . '/image');
                return isset($res['data']) && is_array($res['data']) ? $res['data'] : [];
            });
        }

        return $list_routes;
    }

    public function busInfo($companyId, $type, Request $request)
    {
        $token = Helpers::getToken($this->main_url, $this->client_id, $this->client_secret);
        // $itemKey = $request->query('itemKey') ? $request->query('itemKey') : null;
        if ($companyId === null || $type === null) {
            return response()->json(['error' => 'Missing required parameters.'], 400);
        }

        if (!$token) {
            return response()->json([
                'error' => 'Failed to retrieve token',
            ], 500);
        }

        if ($type === "reviews") {
            $url = $this->use_profile_url . "/company/" . $companyId . '/reviews?';
            $urlRPoint = $this->use_profile_url . "/company/" . $companyId;
            $queryParams = [
                'per_page' => $request->query('per_page') ?? null,
                'page' => $request->query('page') ?? 1,
                'rating[min]' => $request->query('rating_min') ?? null,
                'rating[max]' => $request->query('rating_max') ?? null,
            ];

            // Thêm các tham số vào URL nếu chúng tồn tại
            foreach ($queryParams as $key => $value) {
                if ($value !== null) {
                    $url .= '&' . $key . '=' . $value;
                }
            }
            $reviewPoint = Helpers::cacheData("company-bus-'.$companyId.'-ratingpoint", $token, $urlRPoint, 60 * 20);
            $reviews = Helpers::cacheData("company-bus-'.$companyId.'-reviews", $token, $url, $queryParams, 60 * 20);

            if (isset($reviews)) {
                $reviewByType = [
                    "1" => [],
                    "2" => [],
                    "3" => [],
                    "4" => [],
                    "5" => [],
                    "detail_review" => [],
                    "image_review_count" => []
                ];

                foreach ($reviews['items'] as $item) {
                    if (isset($item['rating']) && in_array($item['rating'], [1, 2, 3, 4, 5])) {
                        $reviewByType[(string)$item['rating']][] = $item;
                    }
                    if (isset($item['detail_review']) && $item['detail_review']) {
                        $reviewByType['detail_review'][] = $item;
                    }
                    if (isset($item['image_review_count']) && $item['image_review_count'] > 0) {
                        $reviewByType['image_review'][] = $item;
                    }
                }
            }

            return response()->json([
                "message" => "success",
                'type' => $type,
                'dataHTML' => view('bus._bus_reviewTab', compact('companyId', 'queryParams', 'reviews', 'reviewPoint', 'reviewByType'))->render(),
            ]);
        }

        return response()->json([
            "message" => "No type",
            'data' => "",
        ]);
    }

    function busCancellationPolicy($tripCode, $seatTemplateMap, Request $request)
    {
        $token = Helpers::getToken($this->main_url, $this->client_id, $this->client_secret);
        if ($tripCode === null) {
            return response()->json(['error' => 'Missing required parameters.'], 400);
        }

        if (!$token) {
            return response()->json([
                'error' => 'Failed to retrieve token',
            ], 500);
        }

        $urlCancel = $this->main_url . "/v3/cancellation/policy?trip_code=" . $tripCode;
        $urlPolicy = $this->main_url . "/v3/company_policy/config_detail?seat_template_id=" . $seatTemplateMap . "&trip_code=" . $tripCode;
        $cancelPolicy = Helpers::cacheData("cancellation-policy-bus-" . $tripCode, $token, $urlCancel, 60 * 20);
        $operatorPolicy = Helpers::cacheData("bus_operator_policy-bus-" . $tripCode . "-" . $seatTemplateMap, $token, $urlPolicy, 60 * 20);
        // dd($operatorPolicy);
        return response()->json([
            "message" => "success",
            'tripCode' => $tripCode,
            'dataHTML' => view('bus._bus_policyTab', compact('tripCode', 'cancelPolicy', 'operatorPolicy'))->render(),
        ]);
    }

    function busSeatMap($tripCode, $keyId, Request $request)
    {
        $token = Helpers::getToken($this->main_url, $this->client_id, $this->client_secret);
        $config = request('config', 'none');
        $companyId = request('companyId', "none");
        $unchoosable = (int) request('unchoosable', 0);
        // dd($config);
        if ($tripCode === null) {
            return response()->json(['error' => 'Missing required parameters.'], 400);
        }

        if (!$token) {
            return response()->json([
                'error' => 'Failed to retrieve token',
            ], 500);
        }

        if ($config == "CALLING" && $companyId != 'none') {
            $urlCpn =  $this->main_url . "/v3/company/" . $companyId . "/info_for_agent";
            $companyData = Helpers::cacheData("seat-map-bus-" . $tripCode, $token, $urlCpn, 60 * 20);
            $hotline = explode(",", $companyData['hotline_info']);
            // dd($companyData['name']);
            return response()->json([
                "message" => "success",
                'tripCode' => $tripCode,
                'dataHTML' => view('bus._bus_stepChooseSeat', [
                    'config' => $config,
                    'companyData' => $companyData,
                    'hotline' => $hotline,
                    'unchoosable' => (int)$unchoosable,
                    "pickupPoints" => $seatMap['pickup_points'] ?? [],
                    "transferPoints" => $seatMap['transfer_points_at_arrive'] ?? [],
                    "dropOffPoints" => $seatMap['drop_off_points_at_arrive'] ?? [],
                    "keyId" => $keyId,
                ])->render(),
            ]);
        }

        $urlSeatMap = $this->main_url . "/v3/trip/seat_map?trip_code=" . $tripCode;
        $seatMap = Helpers::cacheData("seat-map-bus-" . $tripCode, $token, $urlSeatMap, 60 * 20);
        $allSeatData = [];
        if ($unchoosable == 1 && isset($seatMap['coach_seat_template']) > 0) {
            foreach ($seatMap['coach_seat_template'] as $template) {
                foreach ($template['seats'] as $seat) {
                    $allSeatData[] = [
                        'seatCode' => $seat['seat_code'],
                        'fareSeat' => $seatMap['fare'],
                        'fullCode' => $seat['full_code'],
                    ];
                }
            }
        }
        // dd($seatMap);
        return response()->json([
            "message" => "success",
            'tripCode' => $tripCode,
            'dataHTML' => view('bus._bus_stepChooseSeat', [
                'config' => $config,
                'unchoosable' => (int)$unchoosable,
                'tripCode' => $tripCode,
                'allSeatData' => json_encode($allSeatData),
                'seatTemplateMap' => $seatMap['coach_seat_template'] ?? [],
                "pickupPoints" => $seatMap['pickup_points'] ?? [],
                "transferPoints" => $seatMap['transfer_points_at_arrive'] ?? [],
                "dropOffPoints" => $seatMap['drop_off_points_at_arrive'] ?? [],
                "seatMap" => $seatMap,
                "keyId" => $keyId,
            ])->render(),
        ]);
    }

    function busListRouteSearch(Request $request)
    {
        $busTo = $request->query('bus_to') ? (int)($request->query('bus_to')) : "";
        $busFrom = $request->query('bus_from') ? (int)$request->query('bus_from') : "";
        $dateTo = $request->query('date_to') ? formatDate($request->query('date_to')) : "";
        $dateFrom = $request->query('date_from') ? formatDate($request->query('date_from')) : "";
        $pickupPointsDistrict = $request->query('pp_district') ? explode(',', $request->query('pp_district')) : [];
        $dropOffPointsDistrict = $request->query('dp_district') ? explode(',', $request->query('dp_district')) : [];
        $dp_district_name = $request->query('dp_district_name') ? explode(',', $request->query('dp_district_name')) : [];
        $pp_district_name = $request->query('pp_district_name') ? explode(',', $request->query('pp_district_name')) : [];
        $companyId = $request->query('company_id') ? explode(',', $request->query('company_id')) : [];
        $seatType = $request->query('seat_type') ? explode(',', $request->query('seat_type')) : [];
        $token = Helpers::getToken($this->main_url, $this->client_id, $this->client_secret);

        if ($busTo === null || $busFrom === null || $dateTo === null) {
            return response()->json(['error' => 'Missing required parameters.'], 400);
        }

        $urlRoute = $this->route_url . '/v2/route?filter[from]=' . $busFrom . '&filter[to]=' . $busTo . '&filter[date]=' . $dateTo;
        $queryParams = [];
        //---Lọc--
        $queryParams = [
            'filter[time][min]' => $request->query('time_min') ?? null, // Lọc theo thời gian bắt đầu HH:mm
            'filter[time][max]' => $request->query('time_max') ?? null, // Lọc theo thời gian kết thúc HH:mm
            'filter[fare][min]' => $request->query('fare_min') ?? null, // Lọc theo giá vé tối thiểu
            'filter[fare][max]' => $request->query('fare_max') ?? null, // Lọc theo giá vé tối đa
            'filter[rating][min]' => $request->query('rating_min') ?? null, // Lọc theo rating tối thiểu
            'filter[available_seat][min]' =>  $request->query('available_seat_min') ?? null, // Lọc theo số lượng ghế trống tối thiểu
            'filter[rating][max]' => 5, // Lọc theo rating tối đa
            'sort' => $request->query('sort') ?? "time:asc", // Sort theo giờ (time:asc/time:desc), rating (rating:asc), giá (fare:asc),
        ];
        //Lọc tên địa điểm đón
        foreach ($pickupPointsDistrict as $key => $district) {
            $queryParams["filter[pickup_points][$key][district]"] = $district;
            // Kiểm tra xem tên điểm đến có tồn tại tại chỉ số $key không
            $name = isset($pp_district_name[$key]) ? $pp_district_name[$key] : null;
            $queryParams["filter[pickup_points][$key][name]"] = $name;
        }
        //Lọc tên địa điểm trả
        foreach ($dropOffPointsDistrict as $key => $district) {
            $queryParams["filter[dropoff_points][$key][district]"] = $district;

            // Kiểm tra xem tên điểm đến có tồn tại tại chỉ số $key không
            $name = isset($dp_district_name[$key]) ? $dp_district_name[$key] : null;
            $queryParams["filter[dropoff_points][$key][name]"] = $name;
        }
        //Lọc nhà xe
        foreach ($companyId as $key => $companyName) {
            $queryParams["filter[companies][$key]"] = $companyName;
        }
        //Lọc Loại ghế / giường
        foreach ($seatType as $key => $seat_name) {
            $queryParams["filter[seat_type][$key]"] = $seat_name;
        }
        // Thêm các tham số vào URL
        foreach ($queryParams as $key => $value) {
            if ($value !== null) {
                $urlRoute .= '&' . $key . '=' . $value;
            }
        }

        if (!$token) {
            return response()->json([
                'error' => 'Failed to retrieve token',
            ], 500);
        }

        // Lấy dữ liệu chuyến đi
        $main_url = $this->main_url . '/v3/area/city_district';
        $list_areas = collect(Helpers::cacheData('city_district', $token, $main_url, 60 * 60 * 24));
        // Lấy thông tin từ params
        $params = (object)([
            'busFrom' => (object)$list_areas->where('id', (int)$busFrom)->first(),
            'busTo' => (object)$list_areas->where('id', (int)$busTo)->first(),
            'dateTo' => $dateTo,
            'dateFrom' => $dateFrom,
        ]);
        // Thông tim tuyến đường
        $cacheKeyRoute = 'route_' . $busFrom . '_' . $busTo . '_' . $dateTo;
        $res_routes = Helpers::cacheData($cacheKeyRoute, $token, $urlRoute, $queryParams, 60 * 20, true);
        $list_routes = $res_routes['data'];
        // Thông tin ảnh nhà xe
        $list_routes = $this->addBusImagesToRoutes($token, $list_routes);

        // Tính tổng số chuyến đi cho tất cả trang
        $totalAll = $res_routes['total']; // Lấy tổng từ phản hồi
        // dd($list_routes);
        return response()->json([
            "message" => "success",
            'total' => $totalAll, // Tổng số chuyến đi
            'dataHTML' => view('bus._bus_listResult', [
                "list_routes" => $list_routes,
                "params" => (object)[
                    'busFrom' => (object)$busFrom,
                    'busTo' => (object)$busTo,
                    'dateTo' => $dateTo,
                    'dateFrom' => $dateFrom,
                ],
                'currentPage' => $res_routes['page'],
                'pageSize' => $res_routes['page_size'],
                'total' => $totalAll, // Cập nhật tổng số chuyến
                'totalPages' => $res_routes['total_pages']
            ])->render(),
        ], 200);
    }


    // TRAIN
    public function trainRouteSearch(Request $request)
    {
        $trainTo = $request->query('train_to', '');
        $trainFrom = $request->query('train_from', '');
        $dateTo = $request->query('date_to') ? formatDate($request->query('date_to')) : '';
        $dateFrom = $request->query('date_from') ? formatDate($request->query('date_from')) : '';
        $quantity = 2;
        $token = Helpers::getToken($this->main_url, $this->client_id, $this->client_secret);

        if (!$token) {
            return response()->json(['error' => 'Failed to retrieve token.'], 500);
        }
        $all_area = $this->getAllRoute($token);
        $urlRoute = $this->route_url . '/v2/agent/train/route?from=' . $trainFrom . '&to=' . $trainTo . '&time=' . $dateTo . '&quantity=' . $quantity;
        // Apply filters
        $queryParams = [
            'page' => $request->query('page', 1),
            'pagesize' => $request->query('pagesize', 10),
        ];

        foreach ($queryParams as $key => $value) {
            if ($value !== null) {
                $urlRoute .= '&' . $key . '=' . $value;
            }
        }

        $train_stations_list = collect($all_area['train']->get('train_stations_list'));
        // Lấy thông tin điểm đón và điểm xả
        $params = (object)([
            'trainFrom' => (object)$train_stations_list->where('station_code', $trainFrom)->first(),
            'trainTo' => (object)$train_stations_list->where('station_code', $trainTo)->first(),
            'dateToTrain' => $dateTo,
            'dateFromTrain' => $dateFrom,
        ]);

        $list_routes = Helpers::cacheData('train_route_' . $trainFrom . '_' . $trainTo . '_' . $dateTo, $token, $urlRoute, $queryParams, 60 * 30);
        // dd($list_routes);
        return view("train.train_search", [
            "list_areas" => $all_area['bus'],
            'list_routes_train' => $list_routes,
            'list_areas_train' => $train_stations_list,
            'params' => $params,
        ]);
    }

    public function getSeatMap(Request $request)
    {
        $seatInfo = $request->all();
        $token = Helpers::getToken($this->main_url, $this->client_id, $this->client_secret);
        if (empty($seatInfo)) {
            return response()->json(['error' => 'Missing required parameters.'], 400);
        }

        if (!$token) {
            return response()->json([
                'error' => 'Failed to retrieve token',
            ], 500);
        }
        $urlSeatMap = $this->route_url . "/v2/agent/train/seat_map";
        $res = Http::withToken($token)->post($urlSeatMap, [
            'type' => "depart",
            'train_id' => $seatInfo['trainId'],
            'physical_carriage_id' => $seatInfo['carriageId'],
        ]);
        $seatMap = [];
        if ($res->successful()) {
            $seatMap = $res->json();
        }

        return response()->json([
            "message" => "success",
            "seatMap" => $seatMap,
            'dataHTML' => view('train._train_templateSeat', [
                "seatMap" => $seatMap,
                "seatInfo" => $seatInfo,
            ])->render(),
        ]);
    }

    // Hiển thị tiện ích của Bus
    public function busUtilitiesSearch(Request $request)
    {
        $token = Helpers::getToken($this->main_url, $this->client_id, $this->client_secret);
        $urlRoute = $this->main_url . '/v3/company/' . $request->id . '/utility?seat_template_id=' . $request->seat_template_id;
        $list_routes = Helpers::cacheData('utility', $token, $urlRoute);

        return response()->json([
            "message" => "success",
            'data'    => $list_routes
        ]);
    }

    // Hàm sắp xếp các chuyến tàu
    public function trainRouteSort(Request $request)
    {
        $list_routes_train = $request->list_train;
        $html_result = '';
        if ($list_routes_train != null) {
            // Kiểm tra và xử lý dữ liệu nếu cần thiết
            foreach ($list_routes_train as $key => $route) {
                $data = $this->returnViewItemTrain($route, $key, $list_routes_train);
                $html_result .= $data;
            }
        } else {
            $html_result .= '<p class="text-center">Không có sẵn dữ liệu!</p>';
        }

        return response()->json([
            "message" => "info",
            'data'    => $html_result
        ]);
    }

    public function returnViewItemTrain($route, $key, $list_routes_train)
    {
        return view('train._train_item', [
            'route' => $route,
            'key' => (string) $key,
            'list_routes_train' => $list_routes_train,
        ]);
    }
}
