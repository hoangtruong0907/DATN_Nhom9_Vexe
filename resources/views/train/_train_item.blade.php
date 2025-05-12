    <div id="item-train-{{ $key }}">
        <div class="container-l">
            <div class="ticket-container-l">
                <div class="ticket-body-l">
                    <div class="ticket-image-l">
                        <div class="d-flex align-items-center justify-content-center border border-light rounded-circle">
                            <img src="https://229a2c9fe669f7b.cmccloud.com.vn/svgIcon/logo_dsvn.svg" alt="logo_dsvn.svg">
                        </div>
                        <div class="ticket-confirm-l">
                            <i class="fa-solid fa-ticket"></i>Xác nhận tức thì
                        </div>
                    </div>
                    <div class="ticket-info-l">
                        <div class="ticket-bus-info-l">
                            <div class="train-name-l">{{ $route['company']['name'] }}
                                <div class="container-action">
                                    <div class="action-train">
                                        <div class="action-l">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="collapse"
                                                data-bs-target="#ticket-detail-collapse-{{ $key }}"
                                                aria-expanded="false"
                                                aria-controls="ticket-detail-collapse-{{ $key }}">
                                                <div class="bus-rating-l">
                                                    <i class="fa-solid fa-star"></i>

                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="action-l">
                                    <button type="button" class="ant-btn btn-detail-l ant-btn-link-l"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#ticket-detail-collapse-{{ $key }}" role="button"
                                        aria-expanded="false"
                                        aria-controls="ticket-detail-collapse-{{ $key }}">

                                    </button>

                                </div>
                            </div>
                            <div class="fare-info-l-train">
                                <div class="fare-l">{{ $route['min_price'] }} - {{ $route['max_price'] }}</div>

                            </div>
                        </div>
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
                                    <div class="hour-l">{{ $route['time'] }}</div>
                                    <div class="place-l">Ga {{ $route['departure_place'] }}</div>
                                </div>
                                <div>
                                    <div class="svg-location">
                                        <svg class="location-route-svg-l2" xmlns="http://www.w3.org/2000/svg"
                                            width="100" height="50" viewBox="0 0 90 54">

                                            <path fill="none" stroke="#787878" stroke-linecap="round"
                                                stroke-width="3" stroke-dasharray="0 6" d="M8 37h80"></path>

                                            <g fill="none" stroke="#484848" stroke-width="3">
                                                <circle cx="3" cy="37" r="7" stroke="none"></circle>
                                                <circle cx="3" cy="37" r="5.5"></circle>
                                            </g>
                                            <path
                                                d="M90 30a5.953 5.953 0 0 0-6 5.891 5.657 5.657 0 0 0 .525 2.4 37.124 37.124 0 0 0 5.222 7.591.338.338 0 0 0 .506 0 37.142 37.142 0 0 0 5.222-7.582A5.655 5.655 0 0 0 96 35.9a5.953 5.953 0 0 0-6-5.891zm0 8.95a3.092 3.092 0 0 1-3.117-3.06 3.117 3.117 0 0 1 6.234 0A3.092 3.092 0 0 1 90 39.95z"
                                                fill="#787878"></path>
                                        </svg>
                                        </svg>
                                    </div>
                                    <div class="duration-l">

                                        <?php
                                        $hours = floor($route['duration'] / 60); // Tính số giờ
                                        $minutes = $route['duration'] % 60; // Tính số phút
                                        ?>
                                        {{ $hours }}h{{ $minutes }}m
                                    </div>
                                </div>
                                <div class="content-l to-l">
                                    <div class="content-to-info-l">
                                        <div class="hour-l">{{ $route['arrival_time'] }} </div>
                                        <div class="place-l">Ga {{ $route['arrival_place'] }}</div>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="container-action">
                            <div class="action-train">
                                <div class="action-l" class="button-infor-train">
                                    <button type="button"
                                        style=" color: rgb(20, 138, 27);margin-top:10px;border: none; background-color: white;"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#ticket-detail-collapse-{{ $key }}"
                                        aria-expanded="false"
                                        aria-controls="ticket-detail-collapse-{{ $key }}"
                                        onclick="showTab('coupon-tab-{{ $key }}')">
                                        <span>Thông tin chi tiết </span>
                                        <i aria-label="icon: caret-down" class="anticon anticon-caret-down">
                                            <svg viewBox="0 0 1024 1024" focusable="false" data-icon="caret-down"
                                                width="1em" height="1em" fill="currentColor" aria-hidden="true">
                                                <path
                                                    d="M840.4 300H183.6c-19.7 0-30.7 20.8-18.5 35l328.4 380.8c9.4 10.9 27.5 10.9 37 0L858.9 335c12.2-14.2 1.2-35-18.5-35z">
                                                </path>
                                            </svg>
                                        </i>
                                    </button>
                                    <button data-tracking-event="selected_route" type="button"
                                        class="ant-btn btn-booking-l" data-bs-toggle="collapse"
                                        data-bs-target="#ticket-step-collapse-{{ $key }}" role="button"
                                        aria-expanded="false"
                                        aria-controls="ticket-step-collapse-{{ $key }}">
                                        <span class="text-chooseeTrip">Chọn chuyến</span>
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="trip-train-reponesive pt-2">

                <p>Vé chặng thuộc chuyến {{ $route['time'] }} - {{ $route['arrival_time'] }} ngày
                    {{ $route['date'] }}
                    Ga {{ $route['departure_place'] }} - Ga {{ $route['arrival_place'] }}
                </p>
            </div>
            <div class="notify-trip-l">
                <div class="full-trip-l pt-2">

                    <p>Vé chặng thuộc chuyến {{ $route['time'] }} - {{ $route['arrival_time'] }} ngày
                        {{ $route['date'] }}
                        Ga {{ $route['departure_place'] }} - Ga {{ $route['arrival_place'] }}</p>
                </div>
                <div class="content-has-cop">
                    <div class="nonePay">Không cần thanh toán trước</div>
                </div>
            </div>
            <div class="container-textSeat">
                <div class="TrainGroupClass__Container-sc-1go2gxb-0 cavity">
                    <div class="top-group" id="carriageContainer">
                        <!-- Lặp qua danh sách khoang tàu -->
                        @foreach ($route['carriage_list'] as $carriage)
                            <div class="item-container carriage-item">
                                <div class="TrainGroupClassItem__Container-sc-1ucei7x-0 compartments">
                                    <div class="inner-container">
                                        <div>
                                            <div
                                                class="base__Caption02Highlight-sc-1tvbuqk-12 Numberofcompartments color--darkness">
                                                Số khoang: {{ $carriage['carriage_number'] }}
                                            </div>
                                            <div class="carriage-description">
                                                {{ $carriage['carriage_description'] }}
                                            </div>
                                        </div>
                                        <div class="bottom-container">
                                            <div class="Hstack">
                                                <div
                                                    class="base__Caption02-sc-1tvbuqk-33 priceToTrain color--vex-blue">
                                                    {{ $carriage['min_price'] }}K
                                                </div>
                                            </div>
                                            <div class="chip-text bg--lighter-border">
                                                <div class="base__Caption02-sc-1tvbuqk-33 priceToTrain color--dark">
                                                    Còn {{ $carriage['available_carriage_seats'] }} chỗ
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="bottom-group"></div>
                </div>
            </div>



            <div class="collapse ticket-step-collapse" id="ticket-step-collapse-{{ $key }}"
                data-bs-parent="#item-bus-{{ $key }}">
                @include('train._train_stepChooseSeat', [
                    $key,
                    'carriage_list' => $route['carriage_list'] ?? [],
                ])
            </div>

            <div class="collapse ticket-detail-collapse" id="ticket-detail-collapse-{{ $key }}"
                data-bs-parent="#item-bus-{{ $key }}">
                <hr>
                <div class="container ticket-detail-container ps-3 pe-3">
                    <div class="bigger-main">
                        <div class="tail-contai">
                            <img class="contain-description lazyloaded"
                                data-src="https://storage.googleapis.com/fe-production/images/image_dsvn.png"
                                src="https://storage.googleapis.com/fe-production/images/image_dsvn.png"
                                alt="default-alt" width="32" height="18">
                            <p class=" gjECjS color--dark">{{ $route['segments'][0]['train_number'] }}</p>
                        </div>
                    </div>
                    <ul class="nav-items nav nav-pills mb-1 pills-ticket-tab" role="tablist">
                        <li class="nav-item" role="presentation">

                            <button class="nav-link" id="coupon-tab-{{ $key }}" data-bs-toggle="pill"
                                data-bs-target="#coupon-{{ $key }}" type="button" role="tab"
                                aria-controls="coupon-{{ $key }}" aria-selected="true">
                                Các loại ghế ({{ $list_routes_train[$key]['total_carriage'] }})
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pickup-tab-{{ $key }}" data-bs-toggle="pill"
                                data-bs-target="#pickup-{{ $key }}" type="button" role="tab"
                                aria-controls="pickup-{{ $key }}" aria-selected="false">Tiện ích (6)
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="rating-tab-{{ $key }}"
                                data-bs-toggle="pill" data-bs-target="#rating-{{ $key }}" type="button"
                                role="tab" aria-controls="rating-{{ $key }}" aria-selected="false">Đánh
                                giá</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="thumb-tab-{{ $key }}" data-bs-toggle="pill"
                                data-bs-target="#image-{{ $key }}" type="button" role="tab"
                                aria-controls="image-{{ $key }}" aria-selected="false">Hình
                                ảnh</button>
                        </li>

                    </ul>
                    <div class="tab-content ticket-detail-contentTab">
                        <div class="tab-pane fade show active-train coupon-tab" id="coupon-{{ $key }}"
                            role="tabpanel" aria-labelledby="coupon-tab" tabindex="0">
                            <div class=" d-flex gap-2 ">
                                <div class="container-select-train">
                                    @foreach ($list_routes_train[$key]['carriage_list'] as $carriage)
                                        <div class="wrap-couponTrain">
                                            <button class="wrap-coupon btn border py-2 "
                                                data-btn-id="{{ $carriage['carriage_number'] }}"
                                                onclick="highlightNumbers([{{ $carriage['carriage_name_app'] }}], '{{ $carriage['carriage_number'] }}')">
                                                <p class="mb-0">{{ $carriage['carriage_description'] }}
                                                    ({{ $carriage['available_carriage_seats'] }})
                                                </p>
                                            </button>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- ---------- -->
                            <div class="content-train pt-4" id="pills-tabContent-{{ $key }}">
                                <h4 class="location_trainCar fw-bold">Vị trí toa
                                    ({{ $carriage['carriage_number'] }}/{{ $list_routes_train[$key]['total_carriage'] }})
                                </h4>
                                <div class="d-flex align-items-center gap-2 pt-4">

                                    <div class="locomotive2">
                                        <div class="box"> </div>
                                        <div class="text">{{ $route['segments'][0]['train_number'] }}</div>
                                    </div>




                                    <div class="train-items">
                                        @foreach ($route['carriage_list'] as $carriage)
                                            <div class="carriage-item">
                                                <p class="mb-0 number">{{ $carriage['carriage_number'] }}</p>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade pickup-tab" id="pickup-{{ $key }}" role="tabpanel"
                            aria-labelledby="pickup-tab" tabindex="1">
                            <div class="pt-2">
                                <div class="row-utility">
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
                                    <div class="icon-text">
                                        <i class="fa-solid fa-plug"></i>
                                        <span>Ổ cắm điện</span>
                                    </div>
                                    <div class="icon-text">
                                        <i class="fa-solid fa-restroom"></i>
                                        <span>Nhà vệ sinh</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="tab-pane fade rating-tab show active" id="rating-{{ $key }}" role="tabpanel"
                            aria-labelledby="rating-tab" tabindex="2">
                            <div class="d-flex align-items-center">
                                <div class="container-star d-flex align-items-center rating-info">
                                    <button class="btn btn-primary p-1"><i class="fa-solid fa-star"></i>
                                        4.5</button>
                                    <div class="star-rating " style="color: rgb(255, 199, 0);">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star-half-stroke"></i>
                                        <i class="fa-regular fa-star"></i>
                                    </div>
                                    <div class="text-wrap">73 Đánh giá</div>
                                </div>
                            </div>
                            <div class="d-flex flex-column mt-2 mb-2">
                                <div class="row d-flex w-100 ps-2 pe-2">
                                    <div class="col-sm-12 col-md-4 ps-2 pe-2">
                                        <div class="card item-card-rating">
                                            <div class=" p-0">
                                                <div class="d-flex justify-content-between">
                                                    <div class="fw-bold">An toàn</div>
                                                    <div class="fw-bold">3.6</div>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar"
                                                        aria-label="Basic example" style="width: 50%"
                                                        aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 ps-2 pe-2">
                                        <div class="card item-card-rating">
                                            <div class=" p-0">
                                                <div class="d-flex justify-content-between">
                                                    <div class="fw-bold">An toàn</div>
                                                    <div class="fw-bold">3.6</div>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar"
                                                        aria-label="Basic example" aria-valuenow="0"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 ps-2 pe-2">
                                        <div class="card item-card-rating">
                                            <div class=" p-0">
                                                <div class="d-flex justify-content-between">
                                                    <div class="fw-bold">An toàn</div>
                                                    <div class="fw-bold">3.6</div>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar"
                                                        aria-label="Basic example" aria-valuenow="0"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row d-flex w-100 ps-2 pe-2">
                                    <div class="col-sm-12 col-md-4 ps-2 pe-2">
                                        <div class="card item-card-rating">
                                            <div class=" p-0">
                                                <div class="d-flex justify-content-between">
                                                    <div class="fw-bold">An toàn</div>
                                                    <div class="fw-bold">3.6</div>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar"
                                                        aria-label="Basic example" aria-valuenow="0"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 ps-2 pe-2">
                                        <div class="card item-card-rating">
                                            <div cl p-0">
                                                <div class="d-flex justify-content-between">
                                                    <div class="fw-bold">An toàn</div>
                                                    <div class="fw-bold">3.6</div>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar"
                                                        aria-label="Basic example" aria-valuenow="0"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 ps-2 pe-2">
                                        <div class="card item-card-rating">
                                            <div cl p-0">
                                                <div class="d-flex justify-content-between">
                                                    <div class="fw-bold">An toàn</div>
                                                    <div class="fw-bold">3.6</div>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar"
                                                        aria-label="Basic example" aria-valuenow="0"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ul class="nav nav-pills mb-1 pill-rating-filter" role="tablist">
                                <li class="nav-item filter-rating" role="presentation">
                                    <button class="nav-link active-train" data-bs-toggle="pill">Tất cả
                                        (100)</button>
                                </li>
                                <li class="nav-item filter-rating" role="presentation">
                                    <button class="nav-link" data-bs-toggle="pill">Có nhận xét
                                        (100)</button>
                                </li>
                                <li class="nav-item filter-rating" role="presentation">
                                    <button class="nav-link" data-bs-toggle="pill">Có hình ảnh
                                        (100)</button>
                                </li>
                                <li class="nav-item filter-rating" role="presentation">
                                    <button class="nav-link" data-bs-toggle="pill">5<i
                                            class="fa-solid fa-star"></i>(12)</button>
                                </li>
                                <li class="nav-item filter-rating" role="presentation">
                                    <button class="nav-link" data-bs-toggle="pill">4<i
                                            class="fa-solid fa-star"></i>(12)</button>
                                </li>
                                <li class="nav-item filter-rating" role="presentation">
                                    <button class="nav-link" data-bs-toggle="pill">3<i
                                            class="fa-solid fa-star"></i>(12)</button>
                                </li>
                                <li class="nav-item filter-rating" role="presentation">
                                    <button class="nav-link" data-bs-toggle="pill">2<i
                                            class="fa-solid fa-star"></i>(12)</button>
                                </li>
                                <li class="nav-item filter-rating" role="presentation">
                                    <button class="nav-link" data-bs-toggle="pill">1<i
                                            class="fa-solid fa-star"></i>(12)</button>
                                </li>
                            </ul>
                            <div class="list-group w-100 list-gr-review">
                                <div class="list-group-item list-group-item-action p-3" aria-current="true">
                                    <div class="d-flex w-100 justify-content-between">
                                        <div class="d-flex user-review">
                                            <img class="avatar-review"
                                                src="https://bizweb.dktcdn.net/100/303/962/files/87126502-2509242206005371-2073523065622364160...04121650"
                                                alt="anh-dai-dien" srcset="">
                                            <div class="d-flex flex-column mt-1 ms-1">
                                                <h6 class="mb-1">List group item heading</h6>
                                                <div class="d-flex align-items-center star-rating"
                                                    style="color: rgb(255, 199, 0);">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star-half-stroke"></i>
                                                    <i class="fa-regular fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <small>3 days ago</small>
                                    </div>
                                    <p class="mb-1">The single cabin was nice. The bed was a little short,
                                        but it was wide and pleasant. Each cabin was provided with bottled
                                        water, wet wipes and blankets. The bed was clean and the staff was very
                                        friendly, so I had a great experience.</p>
                                    <div class="d-flex list-img-review flex-row">
                                        <img class="thumb-img-review"
                                            src="https://www.vietnamfineart.com.vn/wp-content/uploads/2023/03/6539305fb14952972dabefd10d4402b3.jpg"
                                            alt="thumb-1">
                                        <img class="thumb-img-review"
                                            src="https://www.vietnamfineart.com.vn/wp-content/uploads/2023/03/anh-gai-xinh-1-17.jpg"
                                            alt="thumb-1">
                                    </div>

                                    <div class="d-flex align-items-center">
                                        <small class="">Đã đi ngày 29/07/2024</small>
                                        <div class="item-check-review ms-1">
                                            <i class="fa-solid fa-ticket"></i>
                                            <small>Đã mua vé</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item list-group-item-action p-3" aria-current="true">
                                    <div class="d-flex w-100 justify-content-between">
                                        <div class="d-flex user-review">
                                            <img class="avatar-review"
                                                src="https://bizweb.dktcdn.net/100/303/962/files/87126502-2509242206005371-2073523065622364160...04121650"
                                                alt="anh-dai-dien" srcset="">
                                            <div class="d-flex flex-column mt-1 ms-1">
                                                <h6 class="mb-1">List group item heading</h6>
                                                <div class="d-flex align-items-center star-rating"
                                                    style="color: rgb(255, 199, 0);">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star-half-stroke"></i>
                                                    <i class="fa-regular fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <small>3 days ago</small>
                                    </div>
                                    <p class="mb-1">The single cabin was nice. The bed was a little short,
                                        but it was wide and pleasant. Each cabin was provided with bottled
                                        water, wet wipes and blankets. The bed was clean and the staff was very
                                        friendly, so I had a great experience.</p>
                                    <div class="d-flex list-img-review flex-row">
                                        <img class="thumb-img-review"
                                            src="https://www.vietnamfineart.com.vn/wp-content/uploads/2023/03/6539305fb14952972dabefd10d4402b3.jpg"
                                            alt="thumb-1">
                                        <img class="thumb-img-review"
                                            src="https://www.vietnamfineart.com.vn/wp-content/uploads/2023/03/anh-gai-xinh-1-17.jpg"
                                            alt="thumb-1">
                                    </div>

                                    <div class="d-flex align-items-center">
                                        <small class="">Đã đi ngày 29/07/2024</small>
                                        <div class="item-check-review ms-1">
                                            <i class="fa-solid fa-ticket"></i>
                                            <small>Đã mua vé</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item list-group-item-action p-3" aria-current="true">
                                    <div class="d-flex w-100 justify-content-between">
                                        <div class="d-flex user-review">
                                            <img class="avatar-review"
                                                src="https://bizweb.dktcdn.net/100/303/962/files/87126502-2509242206005371-2073523065622364160...04121650"
                                                alt="anh-dai-dien" srcset="">
                                            <div class="d-flex flex-column mt-1 ms-1">
                                                <h6 class="mb-1">List group item heading</h6>
                                                <div class="d-flex align-items-center star-rating"
                                                    style="color: rgb(255, 199, 0);">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star-half-stroke"></i>
                                                    <i class="fa-regular fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <small>3 days ago</small>
                                    </div>
                                    <p class="mb-1">The single cabin was nice. The bed was a little short,
                                        but it was wide and pleasant. Each cabin was provided with bottled
                                        water, wet wipes and blankets. The bed was clean and the staff was very
                                        friendly, so I had a great experience.</p>
                                    <div class="d-flex list-img-review flex-row">
                                        <img class="thumb-img-review"
                                            src="https://www.vietnamfineart.com.vn/wp-content/uploads/2023/03/6539305fb14952972dabefd10d4402b3.jpg"
                                            alt="thumb-1">
                                        <img class="thumb-img-review"
                                            src="https://www.vietnamfineart.com.vn/wp-content/uploads/2023/03/anh-gai-xinh-1-17.jpg"
                                            alt="thumb-1">
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <small class="">Đã đi ngày 29/07/2024</small>
                                        <div class="item-check-review ms-1">
                                            <i class="fa-solid fa-ticket"></i>
                                            <small>Đã mua vé</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade image-tab" id="image-{{ $key }}" role="tabpanel"
                            aria-labelledby="image-tab" tabindex="3">
                            <div class="d-flex flex-column w-100 h-100 m-2">
                                <div class="row" id="slider">
                                    <div class="col-md-12">
                                        <div id="myCarousel" class="carousel slide">
                                            <div class="carousel-inner">

                                            </div>

                                            <!-- Controls-->
                                            <a class="left carousel-control" href="#myCarousel" role="button"
                                                data-slide="prev">
                                                <span class="glyphicon glyphicon-chevron-left"
                                                    aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="right carousel-control" href="#myCarousel" role="button"
                                                data-slide="next">
                                                <span class="glyphicon glyphicon-chevron-right"
                                                    aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>

                                        </div>
                                    </div>
                                </div>

                                <div class="row slide-trains">
                                    <div class="col-md-12" id="slider-thumbs">
                                        <ul class="list-inline listImg-train">
                                            <li>
                                                <a id="carousel-thumb-0" class="selected img-train">
                                                    <img
                                                        src="https://i.ytimg.com/vi/59QlUqt2c_Y/maxresdefault.jpg;text=1">
                                                </a>
                                            </li>
                                            <li>
                                                <a id="carousel-thumb-1" class="img-train">
                                                    <img
                                                        src="https://i.ytimg.com/vi/ZuTXtYiNmBE/maxresdefault.jpg;text=2">
                                                </a>
                                            </li>
                                            <li>
                                                <a id="carousel-thumb-2" class="selected img-train">
                                                    <img
                                                        src="https://i.ytimg.com/vi/rCtX_s1odhw/maxresdefault.jpg;text=3">
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselTrainAutoplaying-{{ $key }}"
                                    data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselTrainAutoplaying-{{ $key }}"
                                    data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>

                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function setupTicketHandlers(key) {
                // Lấy các phần tử với key cụ thể
                const detailButton = document.querySelector(`[data-bs-target="#ticket-detail-collapse-${key}"]`);
                const chooseTripButton = document.querySelector(`[data-bs-target="#ticket-step-collapse-${key}"]`);
                const detailCollapse = document.getElementById(`ticket-detail-collapse-${key}`);
                const stepCollapse = document.getElementById(`ticket-step-collapse-${key}`);

            if (!detailButton || !chooseTripButton || !detailCollapse || !stepCollapse) {
                console.warn(`Some elements not found for key ${key}`);
                return;
            }

            let isChooseTrip = true;

            function updateButtonText() {
                const textElement = chooseTripButton.querySelector('.text-chooseeTrip');
                if (textElement) {
                    textElement.textContent = isChooseTrip ? 'Chọn chuyến' : 'Đóng';
                }
            }

            function closeCollapse(element) {
                const bsCollapse = bootstrap.Collapse.getInstance(element);
                if (bsCollapse) {
                    bsCollapse.hide();
                }
            }

            // Xử lý sự kiện cho nút "Chọn chuyến"
            chooseTripButton.addEventListener('click', function (event) {
                event.preventDefault();                

                if (detailCollapse.classList.contains('show')) {
                    closeCollapse(detailCollapse);
                }

                let isChooseTrip = true;

                function updateButtonText() {
                    const textElement = chooseTripButton.querySelector('.text-chooseeTrip');
                    if (textElement) {
                        textElement.textContent = isChooseTrip ? 'Chọn chuyến' : 'Đóng';
                    }
                }

                function closeCollapse(element) {
                    const bsCollapse = bootstrap.Collapse.getInstance(element);
                    if (bsCollapse) {
                        bsCollapse.hide();
                    }
                }

                // Xử lý sự kiện cho nút "Chọn chuyến"
                chooseTripButton.addEventListener('click', function(event) {
                    event.preventDefault();

                    if (detailCollapse.classList.contains('show')) {
                        closeCollapse(detailCollapse);
                    }

                    const bsCollapse = bootstrap.Collapse.getInstance(stepCollapse);
                    if (stepCollapse.classList.contains('show')) {
                        bsCollapse.hide();
                        isChooseTrip = true;
                    } else {
                        bsCollapse.show();
                        isChooseTrip = false;
                    }

                    updateButtonText();
                });

                // Xử lý sự kiện cho nút "Thông tin chi tiết"
                detailButton.addEventListener('click', function(event) {
                    event.preventDefault();

                    if (stepCollapse.classList.contains('show')) {
                        closeCollapse(stepCollapse);
                        isChooseTrip = true;
                        updateButtonText();
                    }

                    const bsCollapse = bootstrap.Collapse.getInstance(detailCollapse);
                    if (detailCollapse.classList.contains('show')) {
                        bsCollapse.hide();
                    } else {
                        bsCollapse.show();
                    }
                });

                // Lắng nghe sự kiện collapse của Bootstrap
                stepCollapse.addEventListener('hidden.bs.collapse', function() {
                    isChooseTrip = true;
                    updateButtonText();
                });

                stepCollapse.addEventListener('shown.bs.collapse', function() {
                    isChooseTrip = false;
                    updateButtonText();
                    if (detailCollapse.classList.contains('show')) {
                        closeCollapse(detailCollapse);
                    }
                });

                detailCollapse.addEventListener('shown.bs.collapse', function() {
                    if (stepCollapse.classList.contains('show')) {
                        closeCollapse(stepCollapse);
                        isChooseTrip = true;
                        updateButtonText();
                    }
                });
            }

            // Tìm tất cả các nút detail và thiết lập handlers cho mỗi key
            const allDetailButtons = document.querySelectorAll('[data-bs-target^="#ticket-detail-collapse-"]');
            allDetailButtons.forEach(button => {
                const targetId = button.getAttribute('data-bs-target');
                const key = targetId.replace('#ticket-detail-collapse-', '');
                setupTicketHandlers(key);
            });
        });

        // Các loại ghế
        document.addEventListener('DOMContentLoaded', function() {
            const detailButton = document.querySelector(
                '[data-bs-target="#ticket-detail-collapse-{{ $key }}"]');
            const firstTab = document.querySelector('#coupon-tab-{{ $key }}');
            const targetCollapse = document.querySelector(detailButton.getAttribute('data-bs-target'));

            detailButton.addEventListener('click', function() {
                if (!targetCollapse.classList.contains('show')) {
                    // Kích hoạt tab "Các loại ghế" ngay lập tức
                    if (firstTab) {
                        const tab = new bootstrap.Tab(firstTab);
                        tab.show();
                    }
                    // Hiển thị collapse
                    const collapse = new bootstrap.Collapse(targetCollapse, {
                        toggle: true
                    });
                }
            });
        });
    </script>
    <script>
        function highlightNumbers(indices, selectedButtonId) {
            var numbers = document.querySelectorAll('.number');
            numbers.forEach(function(num) {
                num.classList.remove('activetrain');
            });

            indices.forEach(function(index) {
                if (index > 0 && index <= numbers.length) {
                    numbers[index - 1].classList.add('activetrain');
                }
            });

            var buttons = document.querySelectorAll('.btn');
            buttons.forEach(function(btn) {
                if (btn.getAttribute('data-btn-id') === selectedButtonId) {
                    btn.classList.add('button-active');
                    btn.classList.remove('button-default');
                } else {
                    btn.classList.add('button-default');
                    btn.classList.remove('button-active');
                }
            });
        }
    </script>

    <script>
        let currentStep = 1;
        let currentKey = ''; // Biến để lưu trữ giá trị key hiện tại

        function navigateStep(direction, key) {
            if (currentKey !== key) {
                // Nếu key thay đổi, đặt lại bước hiện tại về 1
                currentStep = 1;
                currentKey = key;
            }

            // Ẩn nội dung bước hiện tại
            let currentContent = document.getElementById(`content-step-${currentStep}-${currentKey}`);
            if (currentContent) {
                currentContent.style.display = 'none';
            }

            let currentStepElement = document.getElementById(`step-${currentStep}-${currentKey}`);
            if (currentStepElement) {
                currentStepElement.classList.remove('navigation-step-active');
                currentStepElement.classList.add('navigation-step-inactive');
            }

            // Cập nhật bước hiện tại
            if (direction === 'next' && currentStep < 3) {
                currentStep++;
            } else if (direction === 'previous' && currentStep > 1) {
                currentStep--;
            }

            // Hiển thị nội dung của bước mới
            let newContent = document.getElementById(`content-step-${currentStep}-${currentKey}`);
            if (newContent) {
                newContent.style.display = 'block';
            }

            let newStepElement = document.getElementById(`step-${currentStep}-${currentKey}`);
            if (newStepElement) {
                newStepElement.classList.add('navigation-step-active');
                newStepElement.classList.remove('navigation-step-inactive');
            }

            // Ẩn class wizard-step-train cho bước 2 và 3
            const wizardStepTrain = document.querySelector('.card-body-train');
            const stepContent = document.querySelector('.step-content');
            if (wizardStepTrain) {
                if (currentStep === 2 || currentStep === 3) {
                    wizardStepTrain.style.display = 'none';
                    stepContent.style.display = 'none';
                } else {
                    wizardStepTrain.style.display = 'block';
                    stepContent.style.display = 'block';
                }
            }

            // Đặt lại trạng thái bước 1 nếu đang ở bước 2 hoặc 3
            if (currentStep === 2) {
                let step1Element = document.getElementById(`step-${currentKey}`);
                if (step1Element) {
                    step1Element.classList.remove('navigation-step-active');
                    step1Element.classList.add('navigation-step-inactive');
                }
            }

            // Đổi màu bước hiện tại
            if (currentStep === 1) {
                let step1Element = document.getElementById(`step-${currentKey}`);
                if (step1Element) {
                    step1Element.classList.remove('navigation-step-inactive');
                    step1Element.classList.add('navigation-step-active');
                }
                // Nếu đang ở bước 1, đặt lại bước 2 và 3 về trạng thái ban đầu
                let step2Element = document.getElementById(`step-2-${currentKey}`);
                if (step2Element) {
                    step2Element.classList.remove('navigation-step-active');
                    step2Element.classList.add('navigation-step-inactive');
                }
                let step3Element = document.getElementById(`step-3-${currentKey}`);
                if (step3Element) {
                    step3Element.classList.remove('navigation-step-active');
                    step3Element.classList.add('navigation-step-inactive');
                }
            }
        }

        function toggleCustomContent(key, step) {
            const button = document.getElementById(`button-step-custom-${step}-${key}`);
            const content = document.getElementById(`content-step-custom-${step}-${key}`);

            // Lấy tất cả các nội dung bước và nút cho bài mới
            const allContents = document.querySelectorAll(`.step-content-custom[data-key="${key}"]`);
            const allButtons = document.querySelectorAll(`.navigation-button-custom[data-key="${key}"]`);

            // Ẩn tất cả các nội dung
            allContents.forEach(c => c.classList.remove('step-content-custom-show'));
            // Làm tất cả các nút không hoạt động
            allButtons.forEach(b => b.classList.remove('navigation-button-custom-active'));

            if (!content.classList.contains('step-content-custom-show')) {
                content.classList.add('step-content-custom-show');
                button.classList.add('navigation-button-custom-active');
            } else {
                content.classList.remove('step-content-custom-show');
                button.classList.remove('navigation-button-custom-active');
            }
        }

        // Thêm sự kiện click cho tất cả các nút
        document.querySelectorAll('.navigation-button-custom').forEach(button => {
            button.addEventListener('click', () => {
                const key = button.getAttribute('data-key');
                const step = button.getAttribute('data-step');
                toggleCustomContent(key, step);
            });
        });

        function clearInput(inputId) {
            document.getElementById(inputId).value = '';
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get the collapse element
            var collapseElement = document.getElementById('ticket-detail-collapse-{{ $key }}');
            var collapse = new bootstrap.Collapse(collapseElement, {
                toggle: false
            });

            // Function to show specific tab
            function showTab(tabId) {
                var tab = new bootstrap.Tab(document.getElementById(tabId));
                tab.show();
            }

            // Event listener for the đánh giá button
            document.querySelectorAll('[data-bs-target="#ticket-detail-collapse-{{ $key }}"]').forEach(
                function(button) {
                    button.addEventListener('click', function() {
                        collapse.toggle(); // Toggle the collapse visibility
                        showTab('rating-tab-{{ $key }}'); // Show the rating tab
                    });
                });
        });
    </script>
    <script>
        function showTab(tabId) {
            // Mở phần collapse
            var collapseElement = document.getElementById('ticket-detail-collapse-{{ $key }}');
            var bsCollapse = new bootstrap.Collapse(collapseElement, {
                toggle: true
            });

            // Chờ phần collapse mở xong
            setTimeout(function() {
                // Chọn tab
                var tabElement = document.getElementById(tabId);
                var bsTab = new bootstrap.Tab(tabElement);
                bsTab.show();
            }, 300);
        }
    </script>
