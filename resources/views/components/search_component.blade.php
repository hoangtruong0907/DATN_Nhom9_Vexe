<ul class="nav nav-pills nav-airline" id="pills-tab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link {{ $key == 1 ? 'active' : '' }}" id="pills-bus-tab" data-bs-toggle="pill"
            data-bs-target="#pills-bus" type="button" role="tab" aria-controls="pills-bus" aria-selected="true"><i
                class="fa-solid fa-bus-simple"></i> <span>Xe
                khách</span></button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link {{ $key == 2 ? 'active' : '' }}" id="pills-plane-tab" data-bs-toggle="pill" data-bs-target="#pills-plane" type="button"
            role="tab" aria-controls="pills-plane" aria-selected="false"><i class="fa fa-plane"
                aria-hidden="true"></i> <span>Máy bay</span></button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link {{ $key == 3 ? 'active' : '' }}" id="pills-train-tab" data-bs-toggle="pill"
            data-bs-target="#pills-train" type="button" role="tab" aria-controls="pills-train" aria-selected="false"><i
                class="fa fa-train" aria-hidden="true"></i> <span>Tàu hỏa</span></button>
    </li>
</ul>
<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade {{ $key == 1 ? 'show active' : '' }}" id="pills-bus" role="tabpanel"
        aria-labelledby="pills-bus-tab" tabindex="0">
        <div class="ant-row-flex search-widget-inner-content">
            <div class="left-ant-row-flex">
                <div class="wrap-left-ant-row-flex" style="position: relative;">
                    <div class="departure-bus-flex flex-sum-left">
                        <div class="custom-input-col custom-bus-from-input-col w-100">
                            <div class="custom-select-wrapper custom-bus-from-select-wrapper">
                                <div class="custom-select-container custom-bus-from-select w-100">
                                    <div class="custom-input-container select-slim select-from-input">
                                        <div class="custom-icon-container">
                                            <img class="custom-pickup-icon"
                                                src="https://229a2c9fe669f7b.cmccloud.com.vn/svgIcon/pickup_vex_blue_24dp.svg"
                                                alt="pickup-icon" width="24" height="24">
                                        </div>
                                        <div class="custom-input-section">
                                            <input type="text" id="bus_from" hidden value="{!! $params->busFrom->id ?? '' !!}" />
                                            <select class="bus_from_input" id="bus_from_input">
                                                <option data-placeholder="true"></option>
                                                @foreach ($list_areas as $city)
                                                    <option value="{{ $city['id'] }}" data-name="{{ $city['name'] }}">{{ $city['name'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <ul class="custom-dropdown-menu bus-dropdown-menu">
                                        <li class="custom-dropdown-item-group custom-dropdown-item-group-xe-tau">
                                            <ul class="custom-dropdown-item-list" id="dropdown_list_bus_from">
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="custom-swap-container" id="bus_swap_button">
                            <div class="custom-switch-icon-container">
                                <i class="fa fa-exchange" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                    <div class="destination-bus-flex flex-sum-left">
                        <div class="custom-input-col custom-bus-to-input-col w-100">
                            <div class="custom-select-wrapper custom-bus-to-select-wrapper">
                                <div class="custom-select-container custom-bus-to-select w-100">
                                    <div class="custom-input-container select-slim select-to-input w-100">
                                        <div class="custom-icon-container">
                                            <i class="fa-solid fa-location-dot"></i>
                                        </div>
                                        <div class="custom-input-section">
                                            <input type="text" id="bus_to" hidden value="{!! $params->busTo->id ?? '' !!}" />
                                            <select class="bus_to_input" id="bus_to_input">
                                                <option data-placeholder="true"></option>
                                                @foreach ($list_areas as $city)
                                                    <option value="{{ $city['id'] }}" data-name="{{ $city['name'] }}">{{ $city['name'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <ul class="custom-dropdown-menu bus-dropdown-menu">
                                        <li class="custom-dropdown-item-group custom-dropdown-item-group-xe-tau">
                                            <ul class="custom-dropdown-item-list" id="dropdown_list_bus_to">
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="departure-bus-date flex-sum-left">
                        <i class="fa fa-calendar" aria-hidden="true"></i> <input type="text"
                            class="date-input date-default-input" id="bus_date_to" placeholder="Chọn ngày bắt đầu"
                            autocomplete="off">
                    </div>
                    <div class="departure-bus-date-right flex-sum-left">
                        <i class="fa fa-plus" aria-hidden="true"></i> <input type="text"
                            class="date-input data-add-input" id="bus_date_from" placeholder="Thêm ngày về"
                            autocomplete="off">
                    </div>
                </div>
            </div>
            <div class="right-search-widget-inner-content">
                <button id="bus_search">Tìm kiếm</button>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="pills-plane" role="tabpanel" aria-labelledby="pills-plane-tab" tabindex="0">
    <div class="ant-row-flex search-widget-inner-content">
            <div class="left-ant-row-flex">
                <div class="wrap-left-ant-row-flex" style="position: relative;">
                    <div class="departure-plane-flex flex-sum-left">
                        <div class="custom-input-col custom-plane-from-input-col">
                            <div class="custom-select-wrapper custom-plane-from-select-wrapper">
                                <div class="custom-select-container custom-plane-from-select">
                                    <div class="custom-input-container">
                                        <div class="custom-icon-container">
                                            <img class="custom-pickup-icon"
                                                src="https://229a2c9fe669f7b.cmccloud.com.vn/svgIcon/pickup_vex_blue_24dp.svg"
                                                alt="pickup-icon" width="24" height="24">
                                        </div>
                                        <div class="custom-input-section">
                                            <input type="text" id="plane_from_input" placeholder="Nơi Xuất Phát"
                                                data-testid="SearchWidget.plane_from"
                                                data-id="SearchWidget.plane_from">
                                        </div>
                                    </div>
                                    <ul class="custom-dropdown-menu plane-dropdown-menu">
                                        <li class="custom-dropdown-item-group ">
                                            <div class="custom-dropdown-item-group-title">Thành phố sân bay phổ
                                                biến</div>
                                            <ul class="custom-dropdown-item-list" id="dropdown_list_plane_from"></ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="custom-swap-container" id="plane_swap_button">
                            <div class="custom-switch-icon-container">
                                <i class="fa fa-exchange" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                    <div class="destination-plane-flex flex-sum-left">
                        <div class="custom-input-col custom-plane-to-input-col">
                            <div class="custom-select-wrapper custom-plane-to-select-wrapper">
                                <div class="custom-select-container custom-plane-to-select">
                                    <div class="custom-input-container">
                                        <div class="custom-icon-container">
                                            <i class="fa-solid fa-location-dot"></i>
                                        </div>
                                        <div class="custom-input-section">
                                            <input type="text" id="plane_to_input" placeholder="Nơi Đến"
                                                data-testid="SearchWidget.plane_to" data-id="SearchWidget.plane_to">
                                        </div>
                                    </div>
                                    <ul class="custom-dropdown-menu plane-dropdown-menu">
                                        <li class="custom-dropdown-item-group">
                                            <div class="custom-dropdown-item-group-title">Thành phố sân bay phổ
                                                biến</div>
                                            <ul class="custom-dropdown-item-list" id="dropdown_list_plane_to">
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="departure-plane-date flex-sum-left">
                        <i class="fa fa-calendar" aria-hidden="true"></i> <input type="date" name=""
                            value="{{ $params->dateTo ?? '' }}" class="date-input" placeholder="">
                    </div>
                    <div class="departure-plane-date-right flex-sum-left">
                        <i class="fa fa-plus" aria-hidden="true"></i> <input type="text" name=""
                            class="date-input" placeholder="Thêm ngày về">
                    </div>
                </div>
            </div>
            <div class="right-search-widget-inner-content">
                <button>Tìm kiếm</button>
            </div>
        </div>
    </div>
    <div class="tab-pane fade {{ $key == 3 ? 'show active' : '' }}" id="pills-train" role="tabpanel"
        aria-labelledby="pills-train-tab" tabindex="0">
        <div class="ant-row-flex search-widget-inner-content">
            <div class="left-ant-row-flex">
                <div class="wrap-left-ant-row-flex" style="position: relative;">
                    <div class="departure-train-flex flex-sum-left">
                        <div class="custom-input-col custom-train-from-input-col w-100">
                            <div class="custom-select-wrapper custom-train-from-select-wrapper">
                                <div class="custom-select-container custom-train-from-select">
                                    <div class="custom-input-container select-slim select-from-input">
                                        <div class="custom-icon-container">
                                            <img class="custom-pickup-icon"
                                                src="https://229a2c9fe669f7b.cmccloud.com.vn/svgIcon/pickup_vex_blue_24dp.svg"
                                                alt="pickup-icon" width="24" height="24">
                                        </div>
                                        <div class="custom-input-section">
                                            <input type="text" id="train_from" hidden
                                                value="{!! $params->trainFrom->station_code ?? '' !!}" />
                                            <select class="train_from_input" id="train_from_input">
                                                <option data-placeholder="true"></option>
                                                @foreach ($list_areas_train as $station)
                                                    <option value="{{ $station['station_code'] }}" data-name="{{ $station['station_name'] }}">{{ $station['station_code'] }} - {{ $station['station_name'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <ul class="custom-dropdown-menu train-dropdown-menu">
                                        <li class="custom-dropdown-item-group custom-dropdown-item-group-xe-tau">
                                            <ul class="custom-dropdown-item-list" id="dropdown_list_train_from"></ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="custom-swap-container" id="train_swap_button">
                            <div class="custom-switch-icon-container">
                                <i class="fa fa-exchange" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                    <div class="destination-train-flex flex-sum-left">
                        <div class="custom-input-col custom-train-to-input-col w-100">
                            <div class="custom-select-wrapper custom-train-to-select-wrapper">
                                <div class="custom-select-container custom-train-to-select">
                                    <div class="custom-input-container select-slim select-to-input w-100">
                                        <div class="custom-icon-container">
                                            <i class="fa-solid fa-location-dot"></i>
                                        </div>
                                        <div class="custom-input-section">
                                            <input type="text" id="train_to" hidden value="{!! $params->trainTo->station_code ?? '' !!}" />
                                            <select class="train_to_input" id="train_to_input">
                                                <option data-placeholder="true"></option>
                                                @foreach ($list_areas_train as $station)
                                                    <option value="{{ $station['station_code'] }}" data-name="{{ $station['station_name'] }}">{{ $station['station_code'] }} - {{ $station['station_name'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <ul class="custom-dropdown-menu train-dropdown-menu">
                                        <li class="custom-dropdown-item-group custom-dropdown-item-group-xe-tau">
                                            <ul class="custom-dropdown-item-list" id="dropdown_list_train_to">
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="departure-train-date flex-sum-left">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                        <input type="text" id="train_date_to"
                        {{-- value="{!! $params->dateToTrain ?? '' !!}" --}}
                            class="date-input date-default-train" placeholder="Chọn ngày bắt đầu">
                    </div>
                    <div class="departure-train-date-right flex-sum-left">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        <input type="text" id="train_date_from" class="date-input date-add-train"
                            placeholder="Thêm ngày về">
                    </div>
                </div>
            </div>
            <div class="right-search-widget-inner-content">
                <button id="train_search">Tìm kiếm</button>
            </div>
        </div>
        {{-- Block select User --}}
        <div class="block-search-user">
            <div class="user-component">
                <div class="select-user">
                    <div class="icon-user-train">
                        <img class="passenger-icon lazyloaded" data-src="https://storage.googleapis.com/goyolo-uat/images/SeoVexImprove/people.svg" src="https://storage.googleapis.com/goyolo-uat/images/SeoVexImprove/people.svg" alt="passenger-icon" width="24" height="24">
                    </div>
                    <div class="block-user me-1 ms-2">
                        <div id="total-user" class="me-1">1</div> Hành khách
                    </div>
                    <div class="icon-arrow">
                        <img src="{{ asset('/template/admin/assets/images/icons/ic_down_arrow.svg') }} " alt="Icon">
                    </div>
                </div>
                <div class="user-block-items">
                    <div class="item-info" id="audult">
                        <div class="item-title-decs">
                            <div class="item-title">Người lớn</div>
                            <div class="item-decs">Từ trên 10-59 tuổi vào ngày khời hành</div>
                        </div>
                        <div class="item-action">
                            <button type="button" class="btn action minus-btn false" data-value="adult">
                                <img src="{{ asset('/template/admin/assets/images/icons/ic_minus.svg') }} " alt="Icon">
                            </button>
                            <div class="item-number">1</div>
                            <button type="button" class="btn action add-btn active" data-value="adult">
                                <img src="{{ asset('/template/admin/assets/images/icons/ic_plus.svg') }} " alt="Icon">
                            </button>
                        </div>
                    </div>
                    {{-- children --}}
                    <div class="item-info mb-4" id="children">
                        <div class="item-title-decs">
                            <div class="item-title">Trẻ em</div>
                            <div class="item-decs">Từ trên 0-10 tuổi vào ngày khời hành, ưu đãi áp dụng cho công dân Việt Nam</div>
                        </div>
                        <div class="item-action">
                            <button type="button" class="btn action minus-btn false" disabled data-value="child">
                                <img src="{{ asset('/template/admin/assets/images/icons/ic_minus.svg') }} " alt="Icon">
                            </button>
                            <div class="item-number">0</div>
                            <button type="button" class="btn action add-btn active" data-value="child">
                                <img src="{{ asset('/template/admin/assets/images/icons/ic_plus.svg') }} " alt="Icon">
                            </button>
                        </div>
                    </div>
                    {{-- elderly --}}
                    {{-- <div class="item-info" id="elderly">
                        <div class="item-title-decs">
                            <div class="item-title">Người cao tuổi</div>
                            <div class="item-decs">Từ trên 60 tuổi trở lên vào ngày khời hành, ưu đãi áp dụng cho công dân Việt Nam</div>
                        </div>
                        <div class="item-action">
                            <button type="button" class="btn action minus-btn false" disabled>
                                <img src="{{ asset('/template/admin/assets/images/icons/ic_minus.svg') }} " alt="Icon">
                            </button>
                            <div class="item-number">0</div>
                            <button type="button" class="btn action add-btn active">
                                <img src="{{ asset('/template/admin/assets/images/icons/ic_plus.svg') }} " alt="Icon">
                            </button>
                        </div>
                    </div> --}}
                    {{-- student --}}
                    {{-- <div class="item-info" id="student">
                        <div class="item-title-decs">
                            <div class="item-title">Sinh viên</div>
                            <div class="item-decs">Ưu đãi chỉ áp dụng cho công dân Việt Nam đem theo thẻ sinh viên khi đi tàu</div>
                        </div>
                        <div class="item-action">
                            <button type="button" class="btn action minus-btn false" disabled>
                                <img src="{{ asset('/template/admin/assets/images/icons/ic_minus.svg') }} " alt="Icon">
                            </button>
                            <div class="item-number">0</div>
                            <button type="button" class="btn action add-btn active">
                                <img src="{{ asset('/template/admin/assets/images/icons/ic_plus.svg') }} " alt="Icon">
                            </button>
                        </div>
                    </div> --}}
                    {{-- union --}}
                    {{-- <div class="item-info mb-4" id="union">
                        <div class="item-title-decs">
                            <div class="item-title">Đoàn viên công đoàn</div>
                            <div class="item-decs">Ưu đãi chỉ áp dụng cho công dân Việt Nam đem theo thẻ đoàn viên hợp lệ khi đi tàu</div>
                        </div>
                        <div class="item-action">
                            <button type="button" class="btn action minus-btn false" disabled>
                                <img src="{{ asset('/template/admin/assets/images/icons/ic_minus.svg') }} " alt="Icon">
                            </button>
                            <div class="item-number">0</div>
                            <button type="button" class="btn action add-btn active">
                                <img src="{{ asset('/template/admin/assets/images/icons/ic_plus.svg') }} " alt="Icon">
                            </button>
                        </div>
                    </div> --}}
                    {{-- close button --}}
                    <div class="icon-close">
                        <i class="fa-solid fa-circle-xmark"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('page-scripts')
<script src="{{ asset('js/search_train_user.js') }}"></script>
@endpush
