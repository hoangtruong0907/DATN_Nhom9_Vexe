<div id="item-bus-{{ $key }}">
    <div class="container-l">
        <div class="ticket-container-l">
            <div class="ticket-body-l">
                <div class="ticket-image-l">
                    <img class="operator-l" src="{{ $route['company']['images'][0]['files']['1000x600'] ?? ""}}"
                        alt="Đình Nhân">
                    <div class="ticket-confirm-l">
                        <i class="fa-solid fa-ticket"></i>Xác nhận tức thì
                    </div>
                </div>
                <div class="ticket-info-l">
                    <div class="ticket-bus-info-l">
                        <div class="bus-name-l">{{ $route['company']['name'] }}
                            <button type="button" class="ant-btn ant-btn-bus bus-rating-button-l" data-id="{{ $key }}">
                                <div class="bus-rating-l">
                                    <i class="fa-solid fa-star"></i>
                                    <span>{{ $route['company']['ratings']['overall'] }}
                                        ({{ $route['company']['ratings']['comments'] }})</span>
                                </div>
                            </button>
                        </div>
                    </div>
                    <div class="seat-type-l">{{ $dataRoute['schedules'][0]['vehicle_type'] }}</div>
                    <div class="from-to-l">
                        <svg class="location-route-svg-l" xmlns="http://www.w3.org/2000/svg" width="14"
                            height="74" viewBox="0 0 14 74">
                            <path fill="none" stroke="#787878" stroke-linecap="round" stroke-width="2"
                                stroke-dasharray="0 7" d="M7 13.5v46"></path>
                            <g fill="none" stroke="#484848" stroke-width="3">
                                <circle cx="7" cy="7" r="7" stroke="none"></circle>
                                <circle cx="7" cy="7" r="5.5"></circle>
                            </g>
                            <path
                                d="M7 58a5.953 5.953 0 0 0-6 5.891 5.657 5.657 0 0 0 .525 2.4 37.124 37.124 0 0 0 5.222 7.591.338.338 0 0 0 .506 0 37.142 37.142 0 0 0 5.222-7.582A5.655 5.655 0 0 0 13 63.9 5.953 5.953 0 0 0 7 58zm0 8.95a3.092 3.092 0 0 1-3.117-3.06 3.117 3.117 0 0 1 6.234 0A3.092 3.092 0 0 1 7 66.95z"
                                fill="#787878"></path>
                        </svg>
                        <div class="from-to-content-l">
                            <div class="content-l from-l">
                                {{-- formatDateTime($dataRoute['schedules'][0]['pickup_date'], 'H:i') --}}
                                <div class="hour-l">
                                    {{ formatDateTime($dataRoute['schedules'][0]['pickup_date'], 'H:i') }}</div>
                                <div class="place-l">• {{ $dataRoute['from']['name'] }}</div>
                            </div>
                            <div class="duration-l">{{ getDuration($dataRoute['duration']) }}</div>
                            <div class="content-l to-l">
                                <div class="content-to-info-l">
                                    <div class="hour-l">
                                        {{ formatDateTime($dataRoute['schedules'][0]['arrival_time'], 'H:i') }}</div>
                                    <div class="place-l">• {{ $dataRoute['to']['name'] }}</div>
                                </div>
                            </div>
                            <div class="text-date-arrival-time-l-r">
                                <span
                                    class="text-date-arrival-time-l">({{ formatDateTime($dataRoute['schedules'][0]['arrival_time'], 'd-m') }})</span>
                            </div>
                        </div>
                    </div>
                    <!--  -->
                    <!-- ///// địa điểm//// -->
                    <div class="custom-from-to-content">
                    <div class="custom-content-from">
                        <div class="custom-hour">
                            18:45 <span class="custom-status-dot custom-green-dot"></span>
                        </div>
                        <div class="custom-place">VP Đà Nẵng</div>
                    </div>
                    <div class="custom-timeline">
                        <div class="line"></div>
                       <div class="custom-duration">12 giờ</div>
                   </div>
                   <div class="custom-content-to">
                        <div class="custom-arrival-date">(18/08)</div>
                        <div class="custom-hour">
                            <span class="custom-status-dot custom-red-dot"></span> 06:45
                        </div>
                        <div class="custom-place">VP Tân Bình</div>
                    </div>
                </div>
                    <!--  -->


                    {{-- <div class="social-proof-l">7 người đặt trong 6 tiếng gần đây</div> --}}
                    <div class="action-p">
                        <div class="seat-available">
                            {{ $dataRoute['schedules'] ? 'Còn ' . $dataRoute['schedules'][0]['total_available_seats'] . ' chỗ trống' : [] }}
                        </div>
                        <div class="action-l">
                            <button type="button" class="ant-btn btn-detail-l ant-btn-link-l" data-bs-toggle="collapse"
                                data-bs-target="#ticket-detail-collapse-{{ $key }}" role="button" id="ticket-button-collapse-{{ $key }}"
                                aria-expanded="false" aria-controls="ticket-detail-collapse-{{ $key }}">
                                <span>Thông tin chi tiết</span>
                                <i aria-label="icon: caret-down" class="anticon anticon-caret-down">
                                    <svg viewBox="0 0 1024 1024" focusable="false" class="" data-icon="caret-down"
                                        width="1em" height="1em" fill="currentColor" aria-hidden="true">
                                        <path
                                            d="M840.4 300H183.6c-19.7 0-30.7 20.8-18.5 35l328.4 380.8c9.4 10.9 27.5 10.9 37 0L858.9 335c12.2-14.2 1.2-35-18.5-35z">
                                        </path>
                                    </svg>
                                </i>
                                <i aria-label="icon: caret-up" class="anticon anticon-caret-up"><svg
                                        viewBox="0 0 1024 1024" class="" data-icon="caret-up" width="1em"
                                        height="1em" fill="currentColor" aria-hidden="true" focusable="false">
                                        <path
                                            d="M858.9 689L530.5 308.2c-9.4-10.9-27.5-10.9-37 0L165.1 689c-12.2 14.2-1.2 35 18.5 35h656.8c19.7 0 30.7-20.8 18.5-35z">
                                        </path>
                                    </svg></i>
                            </button>
                            <button data-tracking-event="selected_route" type="button"
                                class="ant-btn btn-booking-l ticket-step"
                                data-bs-target="#ticket-step-collapse-{{ $key }}" role="button"
                                aria-expanded="false" aria-controls="ticket-step-collapse-{{ $key }}"
                                data-trip-code="{{ $dataRoute['schedules'][0]['trip_code'] }}"
                                data-config="{{ $dataRoute['schedules'][0]['config'] }}"
                                data-unchoosable="{{ $dataRoute['schedules'][0]['unchoosable'] }}"
                                data-company-id="{{ $route['company']['id'] }}"
                                data-key="{{ $key }}">
                                <span>{{ $dataRoute['schedules'][0]['config'] != "CALLING" ? "Chọn chuyến" : "Gọi điện" }}</span>
                            </button>
                        </div>
                    </div>
                    <div class="fare-info-l">
                        <div class="fare-l">Từ {{ formatCurrency($dataRoute['schedules'][0]['fare']['original']) }}
                        </div>
                        <div class="fareSmall">
                            <div class="small">
                                {{ $dataRoute['schedules'][0]['fare']['original'] !== $dataRoute['schedules'][0]['fare']['max'] ? formatCurrency($dataRoute['schedules'][0]['fare']['max']) : '' }}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="notify-trip-l">
            <div class="full-trip-l">
                <span>*</span> Vé chặng thuộc chuyến {{ $dataRoute['departure_time'] }}
                {{ formatDateTime($dataRoute['departure_date'], 'd-m-Y') }}
                {{ $dataRoute['name'] }}
            </div>
            <div class="content-has-cop">
                <div>
                    @if ($route['allow_payment'] != 1)
                        Không cần thanh toán trước
                    @endif
                </div>
            </div>
        </div>
        <div class="collapse ticket-step-collapse" id="ticket-step-collapse-{{ $key }}"
            data-bs-parent="#item-bus-{{ $key }}">
            {{-- Load tab step  --}}
            <div class="loading-wrap">
                @include('components._loading');
            </div>
        </div>
        <div class="collapse ticket-detail-collapse" id="ticket-detail-collapse-{{ $key }}"
            data-bs-parent="#item-bus-{{ $key }}">
            <hr>
            <div class="container ticket-detail-container ps-3 pe-3">
                <ul class="nav nav-pills mb-1 pills-ticket-tab custom-nav" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="coupon-tab-{{ $key }}" data-bs-toggle="pill"
                            data-bs-target="#coupon-{{ $key }}" type="button" role="tab"
                            aria-controls="coupon-{{ $key }}" aria-selected="true">Giảm
                            giá</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pickup-tab-{{ $key }}" data-bs-toggle="pill"
                            data-bs-target="#pickup-{{ $key }}" type="button" role="tab"
                            aria-controls="pickup-{{ $key }}" aria-selected="false">Điểm đón,
                            trả</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link rating-tab" id="rating-tab-{{ $key }}"
                            data-bs-toggle="pill" data-bs-target="#rating-{{ $key }}" type="button"
                            role="tab" aria-controls="rating-{{ $key }}" aria-selected="false"
                            data-company-id="{{ $route['company']['id'] }}" data-key="{{ $key }}">Đánh
                            giá</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="thumb-tab-{{ $key }}" data-bs-toggle="pill"
                            data-bs-target="#image-{{ $key }}" type="button" role="tab"
                            aria-controls="image-{{ $key }}" aria-selected="false">Hình
                            ảnh</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link policy-tab" id="policy-tab-{{ $key }}"
                            data-bs-toggle="pill" data-bs-target="#policy-{{ $key }}" type="button"
                            role="tab" aria-controls="policy-{{ $key }}" aria-selected="false"
                            data-trip-code="{{ $dataRoute['schedules'][0]['trip_code'] }}"
                            data-seat-template-id="{{ $dataRoute['schedules'][0]['seat_template_id'] }}">
                            Chính sách</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="utilities-tab-{{ $key }}" data-bs-toggle="pill"
                            data-bs-target="#utilities-{{ $key }}" type="button" role="tab"
                            aria-controls="tilities-{{ $key }}" aria-selected="false"
                            onclick="handleUtilitiesTab({{ $route['company']['id'] }}, {{ $dataRoute['schedules'][0]['seat_template_id'] }})"
                        >Tiện ích
                        </button>
                    </li>
                </ul>
                <div class="tab-content ticket-detail-contentTab">
                    <div class="tab-pane fade coupon-tab" id="coupon-{{ $key }}" role="tabpanel"
                        aria-labelledby="coupon-tab" tabindex="0">
                        <div class="coupon-container">
                            <div class="wrap-coupon">
                                <input class="Coupon__HiddenInput-sc-1mhp588-4 cFDugh" value="FS060824VXR10">
                                <div class="kNCupL">
                                    <div class="border-coupon">
                                        <div class="flex-coupon">
                                            <div class="img-coupon">
                                                <div class="icon-tau-coupon">
                                                    <i class="fa fa-train" aria-hidden="true"></i>
                                                </div>
                                                <img src="{{ asset('images/img-coupon.jpg') }}" alt="logo">
                                                <div class="coupon-image-title">
                                                    <p class="coupon-image-title-t">Giảm</p>
                                                    <p class="coupon-image-title-b">10%</p>
                                                </div>
                                            </div>
                                            <div class="text-coupon">
                                                <div class="coupon-exp">
                                                    Giờ vàng <i class="fas fa-exclamation-circle"></i>
                                                </div>
                                                <p class="text-coupon-reduce">Giảm 10%</p>
                                                <p class="text-coupon-reduce-b">Đơn hàng tối đa 1 vé </p>
                                                <div class="wrap-expiry">
                                                    <div class="text-expiry">HSD:</div>
                                                    <p class="date-expiry">T3, 06/08 14:00</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="wrap-coupon">
                                <input class="Coupon__HiddenInput-sc-1mhp588-4 cFDugh" value="FS060824VXR10">
                                <div class="kNCupL">
                                    <div class="border-coupon">
                                        <div class="flex-coupon">
                                            <div class="img-coupon">
                                                <div class="icon-tau-coupon">
                                                    <i class="fa fa-train" aria-hidden="true"></i>
                                                </div>
                                                <img src="{{ asset('images/img-coupon.jpg') }}" alt="logo">
                                                <div class="coupon-image-title">
                                                    <p class="coupon-image-title-t">Giảm</p>
                                                    <p class="coupon-image-title-b">10%</p>
                                                </div>
                                            </div>
                                            <div class="text-coupon">
                                                <div class="coupon-exp">
                                                    Giờ vàng <i class="fas fa-exclamation-circle"></i>
                                                </div>
                                                <p class="text-coupon-reduce">Giảm 10%</p>
                                                <p class="text-coupon-reduce-b">Đơn hàng tối đa 1 vé </p>
                                                <div class="wrap-expiry">
                                                    <div class="text-expiry">HSD:</div>
                                                    <p class="date-expiry">T3, 06/08 14:00</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="wrap-coupon">
                                <input class="Coupon__HiddenInput-sc-1mhp588-4 cFDugh" value="FS060824VXR10">
                                <div class="kNCupL">
                                    <div class="border-coupon">
                                        <div class="flex-coupon">
                                            <div class="img-coupon">
                                                <div class="icon-tau-coupon">
                                                    <i class="fa fa-train" aria-hidden="true"></i>
                                                </div>
                                                <img src="{{ asset('images/img-coupon.jpg') }}" alt="logo">
                                                <div class="coupon-image-title">
                                                    <p class="coupon-image-title-t">Giảm</p>
                                                    <p class="coupon-image-title-b">10%</p>
                                                </div>
                                            </div>
                                            <div class="text-coupon">
                                                <div class="coupon-exp">
                                                    Giờ vàng <i class="fas fa-exclamation-circle"></i>
                                                </div>
                                                <p class="text-coupon-reduce">Giảm 10%</p>
                                                <p class="text-coupon-reduce-b">Đơn hàng tối đa 1 vé </p>
                                                <div class="wrap-expiry">
                                                    <div class="text-expiry">HSD:</div>
                                                    <p class="date-expiry">T3, 06/08 14:00</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="wrap-coupon">
                                <input class="Coupon__HiddenInput-sc-1mhp588-4 cFDugh" value="FS060824VXR10">
                                <div class="kNCupL">
                                    <div class="border-coupon">
                                        <div class="flex-coupon">
                                            <div class="img-coupon">
                                                <div class="icon-tau-coupon">
                                                    <i class="fa fa-train" aria-hidden="true"></i>
                                                </div>
                                                <img src="{{ asset('images/img-coupon.jpg') }}" alt="logo">
                                                <div class="coupon-image-title">
                                                    <p class="coupon-image-title-t">Giảm</p>
                                                    <p class="coupon-image-title-b">10%</p>
                                                </div>
                                            </div>
                                            <div class="text-coupon">
                                                <div class="coupon-exp">
                                                    Giờ vàng <i class="fas fa-exclamation-circle"></i>
                                                </div>
                                                <p class="text-coupon-reduce">Giảm 10%</p>
                                                <p class="text-coupon-reduce-b">Đơn hàng tối đa 1 vé </p>
                                                <div class="wrap-expiry">
                                                    <div class="text-expiry">HSD:</div>
                                                    <p class="date-expiry">T3, 06/08 14:00</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="wrap-coupon">
                                <input class="Coupon__HiddenInput-sc-1mhp588-4 cFDugh" value="FS060824VXR10">
                                <div class="kNCupL">
                                    <div class="border-coupon">
                                        <div class="flex-coupon">
                                            <div class="img-coupon">
                                                <div class="icon-tau-coupon">
                                                    <i class="fa fa-train" aria-hidden="true"></i>
                                                </div>
                                                <img src="{{ asset('images/img-coupon.jpg') }}" alt="logo">
                                                <div class="coupon-image-title">
                                                    <p class="coupon-image-title-t">Giảm</p>
                                                    <p class="coupon-image-title-b">10%</p>
                                                </div>
                                            </div>
                                            <div class="text-coupon">
                                                <div class="coupon-exp">
                                                    Giờ vàng <i class="fas fa-exclamation-circle"></i>
                                                </div>
                                                <p class="text-coupon-reduce">Giảm 10%</p>
                                                <p class="text-coupon-reduce-b">Đơn hàng tối đa 1 vé </p>
                                                <div class="wrap-expiry">
                                                    <div class="text-expiry">HSD:</div>
                                                    <p class="date-expiry">T3, 06/08 14:00</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show active pickup-tab" id="pickup-{{ $key }}"
                        role="tabpanel" aria-labelledby="pickup-tab" tabindex="1">
                        <div class="d-flex flex-column">
                            <div class="fw-bold">Lưu ý</div>
                            <div class="content-note-ticket">Các mốc thời gian đón, trả bên dưới là thời gian dự kiến.
                                Lịch này có thể thay đổi tùy tình hình thưc tế.
                            </div>
                        </div>
                        <div class="d-flex row mt-2">
                            <div class="col-6 d-flex flex-column wrap-point">
                                <div class="fw-bold">Điểm đón</div>
                                <div class="list-group">
                                    @foreach ($pickupData as $i => $pickup)
                                        <div class="list-group-item list-group-item-action list-distance-item"
                                            data-map-lat="{{ $pickup['location']['lat']  ?? ""}}"
                                            data-map-lon="{{ $pickup['location']['lon']  ?? ""}}"
                                            data-key="{{ $i }}">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h6 class="mb-1">
                                                    @if ($pickup['duration'] != 0)
                                                        {{ getTimeDistance($dataRoute['departure_time'], $pickup['duration']) }}
                                                    @else
                                                        {{ $dataRoute['departure_time'] }}
                                                    @endif
                                                    {{-- <span class="badge text-bg-success">Có trung chuyển</span> --}}
                                                </h6>
                                                <small class="text-muted">
                                                    @if ($pickup['duration'] != 0)
                                                        {{ abs($pickup['duration']) }}'
                                                    @endif
                                                </small>
                                            </div>
                                            <p class="mb-1 custom-width">{{ $pickup['name'] }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-6 d-flex flex-column wrap-point">
                                <div class="fw-bold">Điểm trả</div>
                                <div class="list-group">
                                    @foreach ($dropoffData as $i => $dropoff)
                                        <div class="list-group-item list-group-item-action list-distance-item"
                                            data-map-lat="{{ $dropoff['location']['lat'] ?? ""}}"
                                            data-map-lon="{{ $dropoff['location']['lon'] ?? ""}}"
                                            data-key="{{ $i }}">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h6 class="mb-1">
                                                    @if ($dropoff['duration'] != 0)
                                                        {{ getTimeDistance($dataRoute['departure_time'], $dropoff['duration']) }}
                                                    @else
                                                        {{ $dataRoute['departure_time'] }}
                                                    @endif
                                                </h6>
                                                <small class="text-muted">
                                                </small>
                                            </div>
                                            <p class="mb-1 custom-width">{{ $dropoff['name'] }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade rating-tab" id="rating-{{ $key }}" role="tabpanel"
                        aria-labelledby="rating-tab" tabindex="2">
                        {{-- Loading rating tab --}}
                        <div class="d-flex justify-content-center mt-4">
                            <div class="loading-wrap">
                                @include('components._loading');
                            </div>
                        </div>
                    </div>


                    <div class="tab-pane fade image-tab" id="image-{{ $key }}" role="tabpanel"
                        aria-labelledby="image-tab" tabindex="3">
                        <div class="d-flex flex-column w-100 h-100 m-2">
                            <div id="carousel-img-{{ $key }}" class="carousel slide" data-bs-ride="true">
                                <div class="carousel-inner">
                                    @foreach ($route['company']['images'] as $i => $image)
                                        <div class="carousel-item {{ $i === 0 ? 'active' : '' }}">
                                            <img src="{{ $image['files']['1000x600'] }}" class="img-child"
                                                alt="{{ $image['alt']['vi'] }}">
                                            <div class="carousel-caption d-none d-md-block p-0 m-0">
                                                {{ $image['caption']['vi'] }}
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carousel-img-{{ $key }}" data-bs-slide="prev">
                                    <div class="carousel-icon">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Tiếp theo</span>
                                    </div>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carousel-img-{{ $key }}" data-bs-slide="next">
                                    <div class="carousel-icon">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Lùi lại</span>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>

                    
                    <div class="tab-pane fade policy-tab" id="policy-{{ $key }}" role="tabpanel"
                        aria-labelledby="policy" tabindex="4">
                        {{-- Loading tab policy --}}
                        <div class="d-flex justify-content-center mt-4">
                            <div class="loading-wrap">
                                @include('components._loading');
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade utilities-tab" id="utilities-{{ $key }}" role="tabpanel"
                        aria-labelledby="utilities-tab" tabindex="3">
                        <div class="d-flex flex-column w-100 h-100" id="utilities_{{ $route['company']['id'] }}">

                        </div>
                        <div class="utilities-default d-flex">
                            <div class="icon-text">
                                <i class="fa-regular fa-snowflake"></i>
                                <span>Điều hòa</span>
                            </div>
                            <div class="icon-text">
                                <i class="fa-solid fa-wifi"></i>
                                <span>Free wifi</span>
                            </div>
                            <div class="icon-text">
                                <i class="fa fa-couch" aria-hidden="true"></i>
                                <span>Điều chỉnh ghế ngồi</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
