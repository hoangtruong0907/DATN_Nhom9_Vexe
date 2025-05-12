@extends('layouts.app')
@section('title', 'Tìm kiếm chuyến xe')
@section('styles')

    <link href="https://cdn.jsdelivr.net/npm/air-datepicker@3.5.3/air-datepicker.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/air-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('css/search-styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bus-styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bus-mobile.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.2.0/magnific-popup.min.css"
        integrity="sha512-lvaVbvmbHhG8cmfivxLRhemYlTT60Ly9Cc35USrpi8/m+Lf/f/T8x9kEIQq47cRj1VQIFuxTxxCcvqiQeQSHjQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/loading.css') }}">
@endsection

@section('content')

    <div id="airlinetickets">
        <div class="container-airlinetickets">
            @include('components.search_component', [
                'params' => $params,
                'key' => 1,
            ])
        </div>
        <div class="wrap-filter">
            <div class="sidebar-filter" id="sidebar-filter">
                <button class="close-button-filter" onclick="toggleMenuFilter()">✖</button>
                <div class="left-filter left-filter-mmenu">
                    <div class="wrap-arrange-top">
                        <div class="text-arrange">
                            <h3>Sắp xếp</h3>
                        </div>
                        <div class="radio-group sort-options">
                            <div class="form-check d-flex align-items-center">
                                <input type="radio" id="defaul" class="form-check-input array_filter-radio"
                                    name="opt_array" value="rating:desc" checked>
                                <label class="form-check-label ms-2" for="defaul">Mặc định</label>
                            </div>
                            <div class="form-check d-flex align-items-center">
                                <input type="radio" id="timeAsc" class="form-check-input array_filter-radio"
                                    name="opt_array" value="time:asc">
                                <label class="form-check-label ms-2" for="timeAsc">Giờ đi sớm nhất</label>
                            </div>
                            <div class="form-check d-flex align-items-center">
                                <input type="radio" id="timeDesc" class="form-check-input array_filter-radio"
                                    name="opt_array" value="time:desc">
                                <label class="form-check-label ms-2" for="timeDesc">Giờ đi muộn nhất</label>
                            </div>
                            <div class="form-check d-flex align-items-center">
                                <input type="radio" id="ratingDesc" class="form-check-input array_filter-radio"
                                    name="opt_array" value="rating:desc">
                                <label class="form-check-label ms-2" for="ratingDesc">Đánh giá cao nhất</label>
                            </div>
                            <div class="form-check d-flex align-items-center">
                                <input type="radio" id="fareAsc" class="form-check-input array_filter-radio"
                                    name="opt_array" value="fare:asc">
                                <label class="form-check-label ms-2" for="fareAsc">Giá tăng dần</label>
                            </div>
                            <div class="form-check d-flex align-items-center">
                                <input type="radio" id="fareDesc" class="form-check-input array_filter-radio"
                                    name="opt_array" value="fare:desc">
                                <label class="form-check-label ms-2" for="fareDesc">Giá giảm dần</label>
                            </div>
                        </div>
                    </div>
                    <div class="wrap-arrange-bottom">
                        <div class="filters-wrapper">
                            <div class="filter-title">
                                <div class="filter-header">Lọc</div>
                                <p class="btn-clear">Xóa lọc</p>
                            </div>
                            <div class="filter-item">
                                <div class="filter-group filter-times">
                                    <div class="filter-header-container">
                                        <p class="filter-label">Giờ đi</p>
                                        <div class="expand-icon"><i class="fa fa-angle-down" aria-hidden="true"></i></div>
                                    </div>
                                    <div class="filter-content">
                                        <div class="slider-container">
                                            <div class="slider">
                                                <div class="slider-rail"></div>
                                                <div class="slider-track" style="left: 0%; width: 100%;"></div>
                                                <div class="slider-step"></div>
                                                <div tabindex="0" class="slider-handle slider-handle-1" style="left: 0%;"
                                                    role="slider" aria-valuemin="0" aria-valuemax="24" aria-valuenow="0">
                                                </div>
                                                <div tabindex="0" class="slider-handle slider-handle-2" style="left: 100%;"
                                                    role="slider" aria-valuemin="0" aria-valuemax="24" aria-valuenow="24">
                                                </div>
                                                <div class="slider-mark"></div>
                                            </div>
                                        </div>
                                        <div class="input-group">
                                            <div class="input-item">
                                                <p class="input-label">Từ</p>
                                                <input type="text" value="00:00" class="input-time from-time"
                                                    id="fromTime">
                                            </div>
                                            <div class="divider"></div>
                                            <div class="input-item">
                                                <p class="input-label">Đến</p>
                                                <input type="text" value="24:00" class="input-time to-time"
                                                    id="toTime">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="filter-group filter-operator">
                                <div class="filter-header-container">
                                    <p class="filter-label">Nhà xe</p>
                                    <div class="expand-icon"><i class="fa fa-angle-down" aria-hidden="true"></i></div>
                                </div>
                                <div class="filter-content filter-content-nhaxe">
                                    <input class="ant-input inputText" id="companySearchInput"
                                        placeholder="Tìm trong danh sách công ty" type="text" value="">
                                    <div class="checkbox-group" id="companyList">
                                        @foreach ($list_company_count as $companyId => $companyData)
                                            <label class="checkbox-item list-search_filter">
                                                <span class="checkbox-wrapper">
                                                    <input type="checkbox" class="checkbox-input select_company"
                                                        value="{{ $companyData['id'] }}">
                                                    <span class="checkbox-inner"></span>
                                                </span>
                                                <span>{{ $companyData['name'] }} ({{ $companyData['count'] }})</span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="filter-group filter-price">
                                <div class="filter-header-container">
                                    <p class="filter-label">Giá vé</p>
                                    <div class="expand-icon"><i class="fa fa-angle-down" aria-hidden="true"></i></div>
                                </div>
                                <div class="filter-content">
                                    <div class="custom-group-info">
                                        <div class="custom-slider-container">
                                            <div class="custom-slider">
                                                <div class="custom-slider-rail"></div>
                                                <div class="custom-slider-track custom-slider-track-1"
                                                    style="left: 0%; width: 100%;"></div>
                                                <div tabindex="0" class="custom-slider-handle custom-slider-handle-1"
                                                    role="slider" aria-valuemin="0" aria-valuemax="2000000"
                                                    aria-valuenow="0" style="left: 0%;">
                                                </div>
                                                <div tabindex="0" class="custom-slider-handle custom-slider-handle-2"
                                                    role="slider" aria-valuemin="0" aria-valuemax="2000000"
                                                    aria-valuenow="2000000" style="left: 100%;"></div>
                                            </div>
                                        </div>
                                        <div class="custom-value-info custom-value-left">0&nbsp;₫</div>
                                        <div class="custom-value-info custom-value-right">2.000.000&nbsp;₫</div>
                                    </div>
                                </div>
                            </div>
                            <div class="filter-group filter-operator">
                                <div class="filter-header-container">
                                    <p class="filter-label">Điểm đón</p>
                                    <div class="expand-icon"><i class="fa fa-angle-down" aria-hidden="true"></i></div>
                                </div>
                                <div class="filter-content filter-content-nhaxe">
                                    <input class="ant-input inputText" id="ppSearchInput" placeholder="Tìm trong danh sách"
                                        type="text" value="">
                                    <div class="groupKind" id="ppDistrictList">
                                        <ul class="cus-tree">
                                            @foreach ($list_pp_districts as $districtName => $info)
                                                <li class="tree-treenode-switcher list-search_filter">
                                                    <div class="d-flex align-items-center">
                                                        <span class="tree-switcher show-pp_district_name">
                                                            <i class="cusicon tree-switcher-icon">
                                                                <svg viewBox="0 0 1024 1024" width="1em" height="1em"
                                                                    fill="currentColor" aria-hidden="true">
                                                                    <path
                                                                        d="M840.4 300H183.6c-19.7 0-30.7 20.8-18.5 35l328.4 380.8c9.4 10.9 27.5 10.9 37 0L858.9 335c12.2-14.2 1.2-35-18.5-35z">
                                                                    </path>
                                                                </svg>
                                                            </i>
                                                        </span>
                                                        <span class="tree-checkbox">
                                                            <input type="checkbox"
                                                                class="form-check-input tree-checkbox-inner select_pp_district"
                                                                value="{{ $districtName }}">
                                                        </span>
                                                        <span class="tree-content district-name" for="pp_district">
                                                            {{ $districtName }} ({{ $info['count'] }})
                                                        </span>
                                                    </div>
                                                    <!-- tên địa điểm -->
                                                    <ul class="tree-child-tree d-none">
                                                        @foreach ($info['names']->unique() as $name => $count)
                                                            <li class="tree-treenode-switcher d-flex">
                                                                <span class="tree-checkbox">
                                                                    <input type="checkbox"
                                                                        class="form-check-input tree-checkbox-inner select_pp_district_name"
                                                                        value="{{ $name }}">
                                                                </span>
                                                                <span class="tree-content district-name">
                                                                    {{ $name }}({{ $count }})
                                                                </span>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="filter-group filter-dropoff">
                                <div class="filter-header-container">
                                    <p class="filter-label">Điểm trả</p>
                                    <div class="expand-icon"><i class="fa fa-angle-down" aria-hidden="true"></i></div>
                                </div>
                                <div class="filter-content filter-content-diemtra">
                                    <input class="ant-input inputText" id="dpSearchInput" placeholder="Tìm trong danh sách"
                                        type="text" value="">
                                    <div class="groupKind" id="dpDistrictList">
                                        <ul class="cus-tree">
                                            @foreach ($list_dp_districts as $districtName => $info)
                                                <li class="tree-treenode-switcher list-search_filter">
                                                    <div class="d-flex align-items-center">
                                                        <span class="tree-switcher show-dp_district_name">
                                                            <i class="cusicon tree-switcher-icon">
                                                                <svg viewBox="0 0 1024 1024" width="1em" height="1em"
                                                                    fill="currentColor" aria-hidden="true">
                                                                    <path
                                                                        d="M840.4 300H183.6c-19.7 0-30.7 20.8-18.5 35l328.4 380.8c9.4 10.9 27.5 10.9 37 0L858.9 335c12.2-14.2 1.2-35-18.5-35z">
                                                                    </path>
                                                                </svg>
                                                            </i>
                                                        </span>
                                                        <span class="tree-checkbox">
                                                            <input type="checkbox"
                                                                class="form-check-input tree-checkbox-inner select_dp_district"
                                                                value="{{ $districtName }}">
                                                        </span>
                                                        <span class="tree-content district-name" for="pp_district">
                                                            {{ $districtName }} ({{ $info['count'] }})
                                                        </span>
                                                    </div>
                                                    <!-- tên địa điểm -->
                                                    <ul class="tree-child-tree d-none">
                                                        @foreach ($info['names']->unique() as $name => $count)
                                                            <li class="tree-treenode-switcher d-flex">
                                                                <span class="tree-checkbox">
                                                                    <input type="checkbox"
                                                                        class="form-check-input tree-checkbox-inner select_dp_district_name"
                                                                        value="{{ $name }}">
                                                                </span>
                                                                <span class="tree-content district-name">
                                                                    {{ $name }} ({{ $count }})
                                                                </span>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="filter-group filter-seats">
                                <div class="filter-header-container">
                                    <p class="filter-label">Vị trí ghế</p>
                                    <div class="expand-icon"><i class="fa fa-angle-down" aria-hidden="true"></i></div>
                                </div>
                                <div class="filter-content">
                                    <div class="filter-item-n">
                                        <div class="filter-item-content-n">
                                            <p class="base__Body02-sc-1tvbuqk-23 gymsWw color--darkness">Số ghế trống</p>
                                            <div class="quantity-input-n">
                                                <button disabled="" type="button"
                                                    class="ant-btn-n QuantityInput__RoundButton-sc-5ap7dx-1 bVEmRj"
                                                    id="seat_decrease">
                                                    <i class="fa fa-minus-square" aria-hidden="true"></i>
                                                </button>
                                                <div class="quantity-value-n">
                                                    <p class="color--darkness" id="quantity-value">1</p>
                                                </div>
                                                <button type="button"
                                                    class="ant-btn-n QuantityInput__RoundButton-sc-5ap7dx-1 bVEmRj"
                                                    id="seat_increase">
                                                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="filter-group filter-bus-type">
                                <div class="filter-header-container">
                                    <p class="filter-label">Loại xe</p>
                                    <div class="expand-icon"><i class="fa fa-angle-down" aria-hidden="true"></i></div>
                                </div>
                                <div class="filter-content filter-content-diemtra">
                                    <input class="ant-input inputText" placeholder="Tìm trong danh sách"
                                        id="vehicle_typeSearchInput" type="text" value="">
                                    <div class="checkbox-group" id="list_vehicle_typeList">
                                        @foreach ($list_vehicle_type as $vehicleType => $count)
                                            <label class="checkbox-item list-search_filter">
                                                <span class="ant-checkbox-n">
                                                    <input type="checkbox" class="ant-checkbox-input-n"
                                                        value="{{ $vehicleType }}">
                                                    <span class="ant-checkbox-inner-n"></span>
                                                </span>
                                                <span>{{ $vehicleType }} ({{ $count }})</span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
    
                            <div class="filter-group filter-seat-type">
                                <div class="filter-header-container">
                                    <p class="filter-label">Loại ghế / giường</p>
                                    <div class="expand-icon"><i class="fa fa-angle-down" aria-hidden="true"></i></div>
                                </div>
                                <div class="filter-content">
                                    <div class="group-items-b">
                                        @foreach ($list_seat_type as $seat_group => $data)
                                            @foreach ($data['seat_types'] as $seat_type)
                                                <label class="checkBoxGroup-b Filter_ACSleeper ant-checkbox-wrapper-b">
                                                    <span class="ant-checkbox-b">
                                                        <input type="checkbox" class="ant-checkbox-input-b selectSeat_type"
                                                            value="{{ $seat_type }}">
                                                        <span class="ant-checkbox-inner-b"></span>
                                                    </span>
                                                    <span>{{ $seat_group }} ({{ $data['count'] }})</span>
                                                </label>
                                            @endforeach
                                        @endforeach
                                    </div>
                                </div>
                            </div>
    
                            <div class="filter-group filter-rating">
                                <div class="filter-header-container">
                                    <p class="filter-label">Đánh giá</p>
                                    <div class="expand-icon"><i class="fa fa-angle-down" aria-hidden="true"></i></div>
                                </div>
                                <div class="filter-content">
                                    <div class="groupItems">
                                        <div class="Rates__GroupRate-sc-1ioptsc-1 dfQbde" style="cursor: pointer;">
                                            <span class="fa fa-star checked_rating"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span style="color: rgb(20, 20, 20);">trở lên (<span
                                                    id="rating-count">1</span>)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div>
                            <button class="close-button" onclick="closeFilterModal()">Xem 36 chuyến</button>
                            <button class="close-button" onclick="closeFilterModal()">Xóa Lọc</button>
                        </div> --}}
                    </div>
                </div>
            </div>

            <!-- //////////////// -->
            <div class="right-filter">
                {{-- Load list item is here --}}
                @include('components._brand_slide')
                <div class="container loading-wrap-page">
                    @include('components._loading')
                </div>
            </div>
        </div>
        {{-- Modal thông báo tối đa --}}
        <div class="modal fade" id="modals-warning" tabindex="-1" aria-labelledby="modals-warningLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="d-flex flex-column position-relative">
                        <button type="button" class="btn-close position-absolute top-0 end-0" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                        <div class="conent-warning fw-bold">Thông báo</div>
                        <div class="conent-warning mt-2 mb-2 p-2">Bạn chỉ được đặt tối đa 3 ghế cho mỗi lần đặt</div>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đã hiểu</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- Modal thông báo tối thiểu --}}
        <div class="modal fade" id="modals-warning-no" tabindex="-1" aria-labelledby="modals-warningLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="d-flex flex-column position-relative">
                        <button type="button" class="btn-close position-absolute top-0 end-0" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                        <div class="conent-warning fw-bold">Thông báo</div>
                        <div class="conent-warning mt-2 mb-2 p-2">Bạn phải chọn ít nhất một ghế để tiếp tục</div>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đã hiểu</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal HTML -->
        <div class="modal fade" id="addressModal" tabindex="-1" aria-labelledby="addressModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addressModalLabel">Nhập địa chỉ</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Input for searching address -->
                        <input id="addressInput" type="text" class="form-control" placeholder="Nhập địa chỉ"
                            oninput="searchAddress()" />
                        <!-- List of suggested addresses -->
                        <ul id="addressList" class="list-group mt-3"></ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="dropoffModal" tabindex="-1" aria-labelledby="dropoffModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="dropoffModalLabel">Chọn Điểm Trả</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="text" id="dropoffInput" class="form-control" placeholder="Nhập địa chỉ"
                            oninput="searchDropoffAddress()" />
                        <ul id="dropoffList" class="list-group mt-2"></ul> <!-- Danh sách kết quả -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @push('page-scripts')
        <script src="https://cdn.jsdelivr.net/npm/air-datepicker@3.5.3/air-datepicker.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/moon-time@2.4.0/calculate.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.2.0/jquery.magnific-popup.min.js"
            integrity="sha512-fCRpXk4VumjVNtE0j+OyOqzPxF1eZwacU3kN3SsznRPWHgMTSSo7INc8aY03KQDBWztuMo5KjKzCFXI/a5rVYQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            // data load search component
            // list data areas
            const busCities = @json($list_areas ?? []);
            const dateTo = @json($params->dateTo ?? '');
            const dateFrom = @json($params->dateFrom ?? '');
            // #train
            const trainStations = @json($list_areas_train ?? []);
            const dateToTrain = @json($params->dateToTrain ?? '');
            const dateFromTrain = @json($params->dateFromTrain ?? '');
        </script>
        <script>
            function openFilterModal() {
                alert("Filter modal opened!");
            }

            function openSortModal() {
                alert("Sort modal opened!");
            }

            $("#pills-bus-tab").on("click", function(e) {
                let busTo = localStorage.getItem("bus_select_to");
                let busFrom = localStorage.getItem("bus_select_from");
                let dateTo = localStorage.getItem("bus_date_to");
                let dateFrom = localStorage.getItem("bus_date_from");
                let data = {
                    bus_from: busFrom,
                    bus_to: busTo,
                    date_from: dateFrom,
                    date_to: dateTo,
                };
                let url = "/route-search/xe-khach?q=";
                let queryString = $.param(data);
                url += "&" + queryString;
                window.location.href = url;
            });

            $("#pills-train-tab").on("click", function(e) {
                let trainTo = localStorage.getItem("train_select_to");
                let trainFrom = localStorage.getItem("train_select_from");
                let dateTo = localStorage.getItem("train_date_to");
                let dateFrom = localStorage.getItem("train_date_from");
                let data = {
                    train_from: trainFrom,
                    train_to: trainTo,
                    date_from: dateFrom,
                    date_to: dateTo,
                };
                let url = "/route-search/tau-hoa?q=";
                let queryString = $.param(data);
                url += "&" + queryString;
                window.location.href = url;
            });
            
            let urlCurrent = window.location.href;

            function loadDataSearchBus(pageNumber = 1, pageSize = 8) {
                $('.wrap-filter .right-filter').html(
                    `<div class='container loading-wrap-page'>@include('components._loading')</div>`);
                let data = {
                    "bus_to": localStorage.getItem('bus_select_to'),
                    "bus_from": localStorage.getItem('bus_select_from'),
                    "date_to": localStorage.getItem('bus_date_to'),
                    "date_from": localStorage.getItem('bus_date_from'),
                    "page": localStorage.getItem('pageNumber') ?? pageNumber,
                }
                $.ajax({
                    url: '/api/search/xe-khach',
                    data: data,
                }).done((data) => {
                    $('.wrap-filter .right-filter').html(data.dataHTML);
                })
            }
            loadDataSearchBus();

            $("#bus_search").click(() => {
                loadDataSearchBus()
            })

            $("#bus_date_from").change(function() {
                alert("The text has been changed.");
            });


            $(document).ready(function() {
                // Chọn hành khách
                const searchContainer = $('.search-container');
                const passengerSelection = $('.passenger-selection');
                const passengerContent = $('.passenger-content');

                searchContainer.on('click', function(event) {
                    event.stopPropagation();
                    passengerSelection.toggle();
                });

                passengerContent.on('click', function(event) {
                    event.stopPropagation();
                });

                const increaseButtons = $('.increase');
                const decreaseButtons = $('.decrease');
                const applyBtn = $('.apply-btn');
                const passengerInfo = $('.passenger-info');

                increaseButtons.on('click', function(event) {
                    event.stopPropagation();
                    const numberElement = $(this).prev('.number');
                    let number = parseInt(numberElement.text());
                    numberElement.text(++number);
                    updatePassengerInfo();
                });

                decreaseButtons.on('click', function(event) {
                    event.stopPropagation();
                    const numberElement = $(this).next('.number');
                    let number = parseInt(numberElement.text());
                    if (number > 0) {
                        numberElement.text(--number);
                        updatePassengerInfo();
                    }
                });

                applyBtn.on('click', function() {
                    passengerSelection.hide();
                });

                $(document).on('click', function(event) {
                    if (!searchContainer.is(event.target) && searchContainer.has(event.target).length === 0) {
                        passengerSelection.hide();
                    }
                });

                function updatePassengerInfo() {
                    const numbers = $('.number');
                    let totalPassengers = 0;
                    numbers.each(function() {
                        totalPassengers += parseInt($(this).text());
                    });
                    passengerInfo.text(`${totalPassengers} Hành khách`);
                }
                // Lấy hạng ghế
                const searchSeatContainer = $('.seat-search-container');
                const seatSelectionDropdown = $('.seat-selection-dropdown');
                const seatOptionItems = $('.seat-option-item');
                const seatInfoText = $('.seat-info-text');
                const seatCheckIcons = $('.seat-check-icon');

                searchSeatContainer.on('click', function(event) {
                    event.stopPropagation();
                    seatSelectionDropdown.toggle();
                });

                seatOptionItems.on('click', function() {
                    seatInfoText.text($(this).find('.seat-option-title').text());
                    seatCheckIcons.hide();
                    $(this).find('.seat-check-icon').show();
                    seatSelectionDropdown.hide();
                });

                $(document).on('click', function(event) {
                    if (!searchSeatContainer.is(event.target) && searchSeatContainer.has(event.target)
                        .length === 0) {
                        seatSelectionDropdown.hide();
                    }
                });
                // Sắp xếp
                const radioWrappers = $('.radio-wrapper');
                radioWrappers.on('click', function() {
                    radioWrappers.removeClass('checked');
                    $(this).addClass('checked');
                    $(this).find('.radio-input').prop('checked', true);
                });

                // ------------- Filter -------------//
                // Lọc btn
                const filterHeaders = $('.filter-header-container');

                filterHeaders.on('click', function() {
                    const filterContent = $(this).next();
                    const expandIcon = $(this).find('.expand-icon i');

                    if (filterContent.is(':visible')) {
                        filterContent.hide();
                        expandIcon.attr('class', 'fa fa-angle-down');
                    } else {
                        filterContent.show();
                        expandIcon.attr('class', 'fa fa-angle-up');
                    }
                });
                // Điểm đón
                const switchers = $('.custom-tree-switcher');
                const checkboxes = $('.custom-tree-checkbox');

                switchers.on('click', function() {
                    const node = $(this).closest('.custom-tree-node');
                    node.toggleClass('custom-tree-node_open');
                });

                checkboxes.on('click', function() {
                    $(this).toggleClass('checked');
                });
                // Điểm trả
                $('.custom-tree-switcher').on('click', function() {
                    $(this).toggleClass('custom-tree-switcher_close custom-tree-switcher_open');
                });

                $('.custom-tree-checkbox').on('click', function() {
                    $(this).toggleClass('checked');
                });

                $('.custom-tree-title').on('click', function() {
                    $(this).parent().find('.custom-tree-switcher').toggleClass(
                        'custom-tree-switcher_close custom-tree-switcher_open');
                });
                // Tieu chi
                $('.checkbox-group-n .ant-checkbox-n').on('click', function() {
                    const checkboxInput = $(this).find('.ant-checkbox-input-n');
                    checkboxInput.prop('checked', !checkboxInput.prop('checked'));
                    $(this).find('.ant-checkbox-inner-n').toggleClass('checked');
                });
                // Vi tri ghe
                $('.increase-n').on('click', function() {
                    let $valueElement = $(this).siblings('.quantity-value-n').find('.quantity-value-text-n');
                    let currentValue = parseInt($valueElement.text());
                    $valueElement.text(currentValue + 1);
                    $(this).siblings('.decrease-n').removeAttr('disabled');
                });

                $('.decrease-n').on('click', function() {
                    let $valueElement = $(this).siblings('.quantity-value-n').find('.quantity-value-text-n');
                    let currentValue = parseInt($valueElement.text());
                    if (currentValue > 1) {
                        $valueElement.text(currentValue - 1);
                    }
                    if (parseInt($valueElement.text()) === 1) {
                        $(this).attr('disabled', 'disabled');
                    }
                });

                // Handle checkbox state
                $('.ant-checkbox-input-n').on('change', function() {
                    $(this).siblings('.ant-checkbox-inner-n').toggleClass('checked-n', this.checked);
                });
                // Loại xe
                $('.ant-checkbox-input-n').on('change', function() {
                    $(this).siblings('.ant-checkbox-inner-n').toggleClass('checked-n', this.checked);
                });
                // Loại ghế
                $('.ant-checkbox-input-b').on('change', function() {
                    $(this).siblings('.ant-checkbox-inner-b').toggleClass('checked-b', this.checked);
                });
                // Quay lại - tiep tuc btn
                $('.modal-choose-chair').click(function() {
                    $('#exampleModal').modal('show');
                });

                function toggleTextarea12() {
                    if ($('#flexRadioDefault1').is(':checked')) {
                        $('#transferAddress').show();
                    } else {
                        $('#transferAddress').hide();
                    }
                }

                $('#flexRadioDefault1, #flexRadioDefault2').on('change', toggleTextarea12);
                toggleTextarea12();

                function toggleTextarea34() {
                    if ($('#flexRadioDefault4').is(':checked')) {
                        $('#transferAddress1').show();
                    } else {
                        $('#transferAddress1').hide();
                    }
                }

                $('#flexRadioDefault3, #flexRadioDefault4').on('change', toggleTextarea34);
                toggleTextarea34();
            });

            $(document).ready(function() {
                // Click popup gg map by lat & lon
                $('.list-distance-item').on('click', function() {
                    const lat = $(this).data('map-lat');
                    const lon = $(this).data('map-lon');
                    const googleMapsUrl =
                        `https://www.google.com/maps/search/${lat}+${lon}/@${lat},${lon},17z?entry=ttu`;
                    window.open(googleMapsUrl, '_blank');
                });
                // Rating tab
                $('.wrap-filter').on('click', '.nav-link.rating-tab', function() {
                    let companyId = $(this).data('company-id');
                    const url = `/api/info/xe-khach/${companyId}/reviews`;
                    // console.log(url);
                    fetch(url, {
                            method: 'GET',
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok ' + response.statusText);
                            }
                            return response.json();
                        })
                        .then(data => {
                            // console.log(data);
                            $($(this).attr('data-bs-target')).html(data.dataHTML);

                        })
                        .catch(error => {
                            console.error('Eror:', error);
                        });
                });

                $('.wrap-filter').on('click', '.nav-link.policy-tab', function() {
                    let tripCode = $(this).data('trip-code');
                    let seatTemplateId = $(this).data('seat-template-id');
                    const url = `/api/info/xe-khach/cancel-policy/${tripCode}/${seatTemplateId}`;
                    // console.log(url);
                    fetch(url, {
                            method: 'GET',
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok ' + response.statusText);
                            }
                            return response.json();
                        })
                        .then(data => {
                            // console.log(data);
                            $($(this).attr('data-bs-target')).html(data.dataHTML);

                        })
                        .catch(error => {
                            console.error('Eror:', error);
                        });
                });

                let proxies = {};
                let listSeatChoosed = {};
                let totalFare = 0;
                let unchoosable = 0;
                let config = "";

                function createProxyForSeatChoosed(keyId) {
                    return new Proxy({}, {
                        set(target = targetData, property, value) {
                            if (Object.keys(target).length >= 3) {
                                if (unchoosable != 1) {
                                    let seatChoose = $(
                                        `.ticket-step-collapse #step1-${keyId} .seat-choose-item.seat-container[data-full-code="${value.fullCode}"]`
                                    ).find('.seat-thumbnail');
                                    seatChoose.removeClass('seat-selected');
                                }
                                // Hiển thị modal cảnh báo
                                $(`#modals-warning`).modal('show');
                                return true;
                            }

                            target[property] = value;
                            this.updateUI(target, keyId);
                            return true;
                        },
                        deleteProperty(target, property) {
                            delete target[property];
                            this.updateUI(target, keyId);
                            return true;
                        },
                        updateUI(target, keyId) {
                            let seatCodes = Object.keys(target);
                            let seatCodesString = seatCodes.join(', ');

                            totalFare = seatCodes.reduce((total, seatCode) => {
                                return total + (target[seatCode].fareSeat || 0);
                            }, 0);
                            let formattedTotalFare = new Intl.NumberFormat('vi-VN').format(totalFare) + 'đ';
                            if (seatCodes.length > 0) {
                                $(`#ticket-step-collapse-${keyId} .total-amount .ant-btn-close`).hide();
                                if (unchoosable != 1) {
                                    $(`#ticket-step-collapse-${keyId} .total-amount .code-seat-choosed`)
                                        .html(`Ghế: <div class="right-total">${seatCodesString}</div>`);
                                } else {
                                    $(`#ticket-step-collapse-${keyId} .total-amount .code-seat-choosed`)
                                        .html(`Ghế: <div class="right-total">${seatCodes.length} Khách</div>`);
                                }

                                $(`#ticket-step-collapse-${keyId} .total-amount .fare-total`)
                                    .html(`Tổng cộng: <div class="right-total">${formattedTotalFare}</div>`);
                            } else {
                                $(`#ticket-step-collapse-${keyId} .total-amount .ant-btn-close`).show();
                                $(`#ticket-step-collapse-${keyId} .total-amount .code-seat-choosed`)
                                    .html(``);
                                $(`#ticket-step-collapse-${keyId} .total-amount .fare-total`)
                                    .html(``);
                            }
                        }
                    });
                }

                // Sự kiện click cho btn-booking-l.ticket-step
                $('.wrap-filter').on('click', '.btn-booking-l.ticket-step', function() {
                    let parent = $(this);
                    parent.html("<span>Đóng</span>");
                    config = $(this).data('config');
                    unchoosable = $(this).data('unchoosable');
                    let keyId = $(this).data('key');
                    let companyId = $(this).data('company-id') ?? 'none';
                    let target = $(this).data('bs-target'); // ID của collapse cần mở
                    let $currentCollapse = $(target);
                    $('.collapse.ticket-step-collapse.show').not(target).collapse('hide');
                    $currentCollapse.collapse('toggle');

                    if (!proxies[keyId]) {
                        proxies[keyId] = createProxyForSeatChoosed(keyId);
                    }

                    let tripCode = $(this).data('trip-code');
                    $currentCollapse.on('shown.bs.collapse', function() {
                        const url =
                            `/api/info/xe-khach/seat-map/${tripCode}/${keyId}?config=${config}&unchoosable=${unchoosable}&companyId=${companyId}`;
                        // console.log(url);
                        $.ajax({
                            url: url,
                            method: 'GET',
                            dataType: 'json',
                            success: function(data) {
                                $(`.ticket-step-collapse#ticket-step-collapse-${keyId}`)
                                    .html(data.dataHTML);

                                $(`.ticket-step-collapse #step1-${keyId} .seat-choose-item.seat-container[data-disabled="false"]`)
                                    .on('click', function() {
                                        let elThumb = $(this).children(
                                            '.seat-thumbnail');
                                        elThumb.toggleClass("seat-selected");
                                        const seatCode = $(this).data('seat-code');

                                        if (elThumb.hasClass("seat-selected")) {
                                            proxies[keyId][seatCode] = {
                                                fullCode: $(this).data('full-code'),
                                                fareSeat: $(this).data('fare-seat'),
                                                seatCode: seatCode,
                                            };
                                        } else {
                                            delete proxies[keyId][seatCode];
                                        }
                                        console.log(proxies[keyId]);

                                    });

                                $(`#ticket-step-collapse-${keyId} .total-amount .ant-btn-primary.back-step`)
                                    .hide();
                                $(`#ticket-step-collapse-${keyId} .total-amount .ant-btn-success.confirm-step`)
                                    .hide();

                                $(`#item-bus-${keyId} .next-step`).on('click', function() {
                                    if (Object.keys(proxies[keyId]).length > 0) {
                                        $(`.ticket-step-collapse #step1-${keyId}`)
                                            .removeClass('active');
                                        $(`.ticket-step-collapse #step2-${keyId}`)
                                            .addClass('active');
                                        $(`#ticket-step-collapse-${keyId} .total-amount .ant-btn-primary.back-step`)
                                            .show();
                                        $(`#ticket-step-collapse-${keyId} .total-amount .ant-btn-success.confirm-step`)
                                            .show();
                                        $(this).hide();
                                    } else {
                                        $(`#modals-warning-no`).modal('show');
                                    }

                                });


                                $(`#item-bus-${keyId} .confirm-step`).on("click",
                                    function() {
                                        const checkDropElement = $(
                                            `input[name='rdioCheckDrop-${keyId}']:checked`
                                        );
                                        const checkTransferElement = $(
                                            `input[name='rdioCheckTransfer-${keyId}']:checked`
                                        );

                                        const checkDropValue = checkDropElement.val(),
                                            checkDropName = checkDropElement.data(
                                                'name');

                                        const checkTransferValue = checkTransferElement
                                            .val(),
                                            checkTransferName = checkTransferElement
                                            .data('name');
                                        const seats = Object.assign({}, proxies[keyId]);
                                        const fullCodeVal = Object.values(seats).map(
                                            seat => seat.fullCode);
                                        const dataSeat = {
                                            trip_code: tripCode,
                                            unchoosable: unchoosable,
                                            seat: fullCodeVal.join(', '),
                                            seatData: JSON.stringify({
                                                seatList: seats,
                                                totalFare
                                            }),
                                            pickup: checkDropName,
                                            pickup_id: checkDropValue,
                                            drop_off_info: checkTransferName,
                                            drop_off_point_id: checkTransferValue,
                                        }

                                        const form = $('<form>', {
                                            method: 'POST',
                                            action: '/bookingconfirmation/ve-xe-khach'
                                        });

                                        $.each(dataSeat, function(key, value) {
                                            form.append($('<input>', {
                                                type: 'hidden',
                                                name: key,
                                                value: value
                                            }));
                                        });

                                        const csrfToken = $('meta[name="csrf-token"]')
                                            .attr('content');
                                        form.append($('<input>', {
                                            type: 'hidden',
                                            name: '_token',
                                            value: csrfToken
                                        }));
                                        // console.log("tripCode: ", dataSeat);
                                        form.appendTo('body').submit();
                                    })

                                $(`#item-bus-${keyId} .back-step`).on('click', function() {
                                    $(`.ticket-step-collapse #step2-${keyId}`)
                                        .removeClass('active');
                                    $(`.ticket-step-collapse #step1-${keyId}`)
                                        .addClass('active');
                                    $(`#ticket-step-collapse-${keyId} .total-amount .ant-btn-primary.back-step`)
                                        .hide();
                                    $(`#ticket-step-collapse-${keyId} .total-amount .ant-btn-primary.next-step`)
                                        .show();
                                    $(`#ticket-step-collapse-${keyId} .total-amount .ant-btn-success.confirm-step`)
                                        .hide();
                                });

                                $(`.ticket-step-collapse #step1-${keyId} .seat-group-selection`)
                                    .each(function() {
                                        const $quantity = $(this).find(
                                            '#unique-quantity');
                                        const $subIcon = $(this).find(
                                            '.unique-sub-icon');
                                        const $plusIcon = $(this).find(
                                            '.unique-plus-icon');
                                        const wrapQuantity = $(this).find(
                                            '.unique-quantity-input');
                                        let dataSeats = wrapQuantity.data('seats');
                                        let keyId = wrapQuantity.data('key');
                                        unchoosable = wrapQuantity.data('unchoosable');

                                        // Khởi tạo proxy nếu chưa có
                                        if (!proxies[keyId]) {
                                            proxies[keyId] = createProxyForSeatChoosed(
                                                keyId);
                                        }

                                        // Hàm cập nhật số lượng hiển thị dựa trên proxy
                                        function updateQuantityDisplay() {
                                            $quantity.text(Object.keys(proxies[keyId])
                                                .length);
                                        }

                                        // Sự kiện click giảm số lượng
                                        $subIcon.off('click').on('click', function() {
                                            let currentValue = Object.keys(
                                                proxies[keyId]).length;
                                            if (currentValue > 0) {
                                                let seatCodes = Object.keys(
                                                    proxies[keyId]);
                                                delete proxies[keyId][seatCodes
                                                    .pop()
                                                ]; // Xóa phần tử cuối cùng
                                                updateQuantityDisplay();
                                                // console.log(proxies[keyId]);
                                            }
                                        });

                                        // Sự kiện click tăng số lượng
                                        $plusIcon.off('click').on('click', function() {
                                            let currentValue = Object.keys(
                                                proxies[keyId]).length;
                                            if (dataSeats && dataSeats.length >
                                                0) {
                                                const randomSeat = dataSeats[
                                                    Math.floor(Math
                                                    .random() * dataSeats
                                                        .length)];
                                                let seatCode = randomSeat
                                                    .seatCode;
                                                let fullCode = randomSeat
                                                    .fullCode;
                                                let fareSeat = randomSeat
                                                    .fareSeat;

                                                if (currentValue < 3) {
                                                    proxies[keyId][seatCode] = {
                                                        fullCode: fullCode,
                                                        fareSeat: fareSeat,
                                                        seatCode: seatCode,
                                                    };
                                                    updateQuantityDisplay();
                                                } else {
                                                    $(`#modals-warning`).modal(
                                                        'show');
                                                }
                                            }
                                            // console.log(proxies[keyId]);
                                        });
                                    });


                                // Scroll into view
                                document.querySelector(
                                        `.ticket-step-collapse #step1-${keyId}`)
                                    .scrollIntoView({
                                        behavior: 'smooth',
                                        block: 'start'
                                    });
                            },
                            error: function(jqXHR, textStatus, errorThrown) {
                                console.error('Error:', textStatus, errorThrown);
                            }
                        });

                    })

                    $currentCollapse.on('hidden.bs.collapse', function() {
                        parent.html(
                        `<span>${config != "CALLING" ? "Chọn chuyến" : "Gọi điện" }</span>`);
                        $(`.ticket-step-collapse#ticket-step-collapse-${keyId}`).html(`
                        <div class="loading-wrap">
                            <svg class="truck" viewBox="0 0 48 24" width="48px" height="24px">
                                <g fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                    transform="translate(0,2)">
                                    <g class="truck__body">
                                        <g stroke-dasharray="105 105">
                                            <polyline class="truck__outside1" points="2 17,1 17,1 11,5 9,7 1,39 1,39 6" />
                                            <polyline class="truck__outside2" points="39 12,39 17,31.5 17" />
                                            <polyline class="truck__outside3" points="22.5 17,11 17" />
                                            <polyline class="truck__window1" points="6.5 4,8 4,8 9,5 9" />
                                            <polygon class="truck__window2" points="10 4,10 9,14 9,14 4" />
                                        </g>
                                        <polyline class="truck__line" points="43 8,31 8" stroke-dasharray="10 2 10 2 10 2 10 2 10 2 10 26" />
                                        <polyline class="truck__line" points="47 10,31 10" stroke-dasharray="14 2 14 2 14 2 14 2 14 18" />
                                    </g>
                                    <g stroke-dasharray="15.71 15.71">
                                        <g class="truck__wheel">
                                            <circle class="truck__wheel-spin" r="2.5" cx="6.5" cy="17" />
                                        </g>
                                        <g class="truck__wheel">
                                            <circle class="truck__wheel-spin" r="2.5" cx="27" cy="17" />
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>`);
                        $(`#ticket-step-collapse-${keyId} .total-amount .code-seat-choosed`).html(``);
                        $(`#ticket-step-collapse-${keyId} .total-amount .ant-btn-close`).show();
                        $(`.ticket-step-collapse #step1-${keyId} .seat-choose-item.seat-container[data-disabled="false"]`)
                            .off('click');
                        listSeatChoosed = {};
                        delete proxies[keyId];
                        // console.log(`Proxy for keyId ${keyId} has been removed.`);
                    });

                });

            });
            // lọc//
            function openFilterModal() {

                document.getElementById("filterModal").style.display = "block";
            }

            function closeFilterModal() {
                document.getElementById("filterModal").style.display = "none";
            }

            function openSortModal() {
                document.getElementById("sortModal").style.display = "block";
            }

            function closeSortModal() {
                document.getElementById("sortModal").style.display = "none";
            }

            window.onclick = function(event) {
                if (event.target == document.getElementById("filterModal")) {
                    closeFilterModal();
                } else if (event.target == document.getElementById("sortModal")) {
                    closeSortModal();
                }
            }
            // //////Giờ đi//
            $(document).ready(function() {
                const minValue = 0; // Tương ứng với 00:00
                const maxValue = 24; // Tương ứng với 24:00

                function convertValueToTime(value) {
                    let hours = Math.floor(value);
                    let minutes = Math.floor((value - hours) * 60);
                    if (minutes < 10) minutes = "0" + minutes;
                    return hours + ":" + minutes;
                }

                function convertTimeToValue(time) {
                    let parts = time.split(":");
                    return parseInt(parts[0]) + parseInt(parts[1]) / 60;
                }

                function updateSliderHandle(handle, value) {
                    const percentage = (value / maxValue) * 100;
                    $(handle).css('left', percentage + '%');
                    $(handle).attr('aria-valuenow', value);

                    const startValue = parseFloat($('.travel-slider-handle-start').attr('aria-valuenow'));
                    const endValue = parseFloat($('.travel-slider-handle-end').attr('aria-valuenow'));

                    // Phần đã chọn (màu xanh)
                    $('.travel-slider-active').css({
                        'left': (startValue / maxValue) * 100 + '%',
                        'width': ((endValue - startValue) / maxValue) * 100 + '%'
                    });

                    // Đặt lại phần chưa chọn thành màu xám
                    $('.travel-slider').css('background-color', '#d3d3d3'); // Màu xám nhạt cho phần chưa được chọn
                }

                function updateTimeInput(input, value) {
                    $(input).val(convertValueToTime(value));
                }

                function setupSlider(handle, otherHandle, input) {
                    let isDragging = false;

                    function startDragging(e) {
                        isDragging = true;
                        e.preventDefault();
                    }

                    function stopDragging() {
                        isDragging = false;
                    }

                    function handleDragging(e) {
                        if (!isDragging) return;

                        const sliderWidth = $('.travel-slider').width();
                        const offsetLeft = $('.travel-slider').offset().left;
                        let clientX = e.clientX || e.touches[0].clientX;
                        let value = ((clientX - offsetLeft) / sliderWidth) * maxValue;

                        if (value < minValue) value = minValue;
                        if (value > maxValue) value = maxValue;

                        const otherValue = parseFloat($(otherHandle).attr('aria-valuenow'));
                        if ($(handle).hasClass('travel-slider-handle-start') && value >= otherValue) {
                            value = otherValue - 0.5;
                        }
                        if ($(handle).hasClass('travel-slider-handle-end') && value <= otherValue) {
                            value = otherValue + 0.5;
                        }

                        updateSliderHandle(handle, value);
                        updateTimeInput(input, value);
                    }

                    $(handle).on('mousedown touchstart', startDragging);
                    $(document).on('mousemove touchmove', function(e) {
                        handleDragging(e);
                        if (isDragging) {
                            e.preventDefault(); // Chỉ ngăn cuộn khi đang kéo
                        }
                    });
                    $(document).on('mouseup touchend', stopDragging);
                }
                setupSlider('.travel-slider-handle-start', '.travel-slider-handle-end', '.travel-start-time');
                setupSlider('.travel-slider-handle-end', '.travel-slider-handle-start', '.travel-end-time');

                // Khởi tạo giá trị ban đầu và cập nhật màu sắc khi trang tải
                updateSliderHandle('.travel-slider-handle-start', minValue);
                updateSliderHandle('.travel-slider-handle-end', maxValue);

                $('.travel-start-time').on('change', function() {
                    let value = convertTimeToValue($(this).val());
                    if (value < minValue) value = minValue;
                    if (value > maxValue) value = maxValue;
                    updateSliderHandle('.travel-slider-handle-start', value);
                });

                $('.travel-end-time').on('change', function() {
                    let value = convertTimeToValue($(this).val());
                    if (value < minValue) value = minValue;
                    if (value > maxValue) value = maxValue;
                    updateSliderHandle('.travel-slider-handle-end', value);
                });
            });


            //sắp xếp//
            function openSortModal() {
                document.getElementById("sortModal").style.display = "block";
            }

            function closeSortModal() {
                document.getElementById("sortModal").style.display = "none";
            }

            window.onclick = function(event) {
                if (event.target == document.getElementById("sortModal")) {
                    closeSortModal();
                }
            }
            // ////giá vé////
            $(document).ready(function() {
                const minValue = 0; // Giá trị tối thiểu (0 đ)
                const maxValue = 2000000; // Giá trị tối đa (2,000,000 đ)

                function updateSliderHandle(handle, value) {
                    const percentage = (value / maxValue) * 100;
                    $(handle).css('left', percentage + '%');
                    $(handle).attr('aria-valuenow', value);

                    // Cập nhật thanh màu xanh cho phần giá trị đã chọn
                    const startValue = parseFloat($('.ticket-slider-handle-start').attr('aria-valuenow'));
                    const endValue = parseFloat($('.ticket-slider-handle-end').attr('aria-valuenow'));
                    $('.ticket-slider-track').css({
                        'left': (startValue / maxValue) * 100 + '%',
                        'width': ((endValue - startValue) / maxValue) * 100 + '%'
                    });
                }

                function updatePriceInput(input, value) {
                    value = Math.round(value); // Rounding the value to the nearest integer
                    $(input).text(value.toLocaleString() + ' đ');
                }

                function setupSlider(handle, otherHandle, input) {
                    let isDragging = false;

                    function startDragging(e) {
                        isDragging = true;
                        e.preventDefault();
                    }

                    function stopDragging() {
                        isDragging = false;
                    }

                    function handleDragging(e) {
                        if (!isDragging) return;

                        const sliderOffset = $('.ticket-slider').offset();
                        const sliderWidth = $('.ticket-slider').width();
                        const sliderHeight = $('.ticket-slider').height();
                        let clientX = e.clientX || e.touches[0].clientX;
                        let clientY = e.clientY || e.touches[0].clientY;

                        // Tính toán giá trị dựa trên vị trí của chuột/touch
                        let xValue = ((clientX - sliderOffset.left) / sliderWidth) * maxValue;
                        let yValue = ((clientY - sliderOffset.top) / sliderHeight) * maxValue;

                        xValue = Math.min(maxValue, Math.max(minValue, xValue));
                        yValue = Math.min(maxValue, Math.max(minValue, yValue));

                        // Điều chỉnh giá trị dựa trên loại handle (bắt đầu hoặc kết thúc)
                        const otherValue = parseFloat($(otherHandle).attr('aria-valuenow'));
                        if ($(handle).hasClass('ticket-slider-handle-start')) {
                            if (xValue >= otherValue) xValue = otherValue -
                                1000; // Giảm 1000 đ để đảm bảo không chồng lấn
                            updateSliderHandle(handle, xValue);
                            updatePriceInput(input, xValue);
                        } else {
                            if (xValue <= otherValue) xValue = otherValue +
                                1000; // Tăng 1000 đ để đảm bảo không chồng lấn
                            updateSliderHandle(handle, xValue);
                            updatePriceInput(input, xValue);
                        }
                    }

                    $(handle).on('mousedown touchstart', startDragging);
                    $(document).on('mousemove touchmove', handleDragging);
                    $(document).on('mouseup touchend', stopDragging);
                }
                setupSlider('.ticket-slider-handle-start', '.ticket-slider-handle-end', '.ticket-value-left');
                setupSlider('.ticket-slider-handle-end', '.ticket-slider-handle-start', '.ticket-value-right');

                // Cập nhật giá trị khi người dùng thay đổi giá trị nhập vào
                $('.ticket-value-left').on('change', function() {
                    let value = parseFloat($(this).text().replace(/\D/g, '')); // Loại bỏ ký tự không phải số
                    if (value < minValue) value = minValue;
                    if (value > maxValue) value = maxValue;
                    updateSliderHandle('.ticket-slider-handle-start', value);
                    updatePriceInput('.ticket-value-left', value);
                });

                $('.ticket-value-right').on('change', function() {
                    let value = parseFloat($(this).text().replace(/\D/g, '')); // Loại bỏ ký tự không phải số
                    if (value < minValue) value = minValue;
                    if (value > maxValue) value = maxValue;
                    updateSliderHandle('.ticket-slider-handle-end', value);
                    updatePriceInput('.ticket-value-right', value);
                });
            });
        </script>
        <script>
            let addressModal;
            let dropoffModal;
            let API_KEY = "{{ config('services.tomtom.api_key') }}";
            document.addEventListener('DOMContentLoaded', function() {
                setupEventListeners();
                updateSelectedAddress();
                updateSelectedDropoffAddress();
            });

            function setupEventListeners() {
                document.body.addEventListener('click', function(event) {
                    if (event.target.matches('.text-pick-up-point-maps')) {
                        const addressModalElement = document.querySelector('#addressModal');
                        if (addressModalElement) {
                            addressModal = new bootstrap.Modal(addressModalElement);
                            addressModal.show();
                        }
                    }
                    if (event.target.matches('.text-drop-off-point-maps')) {
                        const dropoffModalElement = document.querySelector('#dropoffModal');
                        if (dropoffModalElement) {
                            dropoffModal = new bootstrap.Modal(dropoffModalElement);
                            dropoffModal.show();
                        }
                    }
                });
                document.body.addEventListener('input', function(event) {
                    if (event.target.matches('#addressInput')) {
                        searchAddress();
                    }
                    if (event.target.matches('#dropoffInput')) {
                        searchDropoffAddress();
                    }
                });
            }

            function searchAddress() {
                const input = document.querySelector('#addressInput').value.trim();
                const addressList = document.querySelector('#addressList');
                addressList.innerHTML = '';

                if (input.length > 0 && API_KEY) {
                    const apiUrl = `https://api.tomtom.com/search/2/geocode/${encodeURIComponent(input)}.json?key=${API_KEY}`;
                    fetch(apiUrl)
                        .then(response => {
                            if (!response.ok) throw new Error(`HTTP error! Status: ${response.status}`);
                            return response.json();
                        })
                        .then(data => {
                            const results = data.results;
                            if (results.length > 0) {
                                results.forEach(result => {
                                    const address = result.address.freeformAddress;
                                    const li = document.createElement('li');
                                    li.className = 'list-group-item';
                                    li.textContent = address;
                                    li.onclick = () => {
                                        localStorage.setItem('selectedAddress', address);
                                        alert(`Địa chỉ đã chọn: ${address}`);
                                        addressModal.hide();
                                        updateSelectedAddress();
                                    };
                                    addressList.appendChild(li);
                                });
                            }
                        })
                }
            }

            function searchDropoffAddress() {
                const input = document.querySelector('#dropoffInput').value.trim();
                const dropoffList = document.querySelector('#dropoffList');
                dropoffList.innerHTML = '';
                if (input.length > 0 && API_KEY) {
                    const apiUrl = `https://api.tomtom.com/search/2/geocode/${encodeURIComponent(input)}.json?key=${API_KEY}`;

                    fetch(apiUrl)
                        .then(response => {
                            if (!response.ok) throw new Error(`HTTP error! Status: ${response.status}`);
                            return response.json();
                        })
                        .then(data => {

                            const results = data.results;
                            if (results.length > 0) {
                                results.forEach(result => {
                                    const address = result.address.freeformAddress;
                                    const li = document.createElement('li');
                                    li.className = 'list-group-item';
                                    li.textContent = address;
                                    li.onclick = () => {
                                        localStorage.setItem('selectedDropoffAddress', address);
                                        alert(`Điểm trả đã chọn: ${address}`);
                                        dropoffModal.hide();
                                        updateSelectedDropoffAddress();
                                    };
                                    dropoffList.appendChild(li);
                                });
                            }
                        })
                }
            }

            function createNoResultsFoundMessage(listElement) {
                const li = document.createElement('li');
                li.className = 'list-group-item';
                li.textContent = 'Không tìm thấy địa chỉ nào.';
                listElement.appendChild(li);
            }

            function updateSelectedAddress() {
                const savedAddress = localStorage.getItem('selectedAddress');
                const displayAddressElement = document.querySelector('#displayAddress');
                const changeLinkElement = document.querySelector('#changeLink');

                if (displayAddressElement) {
                    const p = displayAddressElement.querySelector('p');
                    if (p) {
                        p.textContent = savedAddress || 'Nhập địa chỉ tại đây';
                        if (changeLinkElement) changeLinkElement.style.display = savedAddress ? 'inline' : 'none';
                    }
                }
            }

            function updateSelectedDropoffAddress() {
                const savedDropoffAddress = localStorage.getItem('selectedDropoffAddress');
                const displayDropoffAddressElement = document.querySelector('#displayDropoffAddress');
                const changeDropoffLinkElement = document.querySelector('#changeDropoffLink');

                if (displayDropoffAddressElement) {
                    const p = displayDropoffAddressElement.querySelector('p');
                    if (p) {
                        p.textContent = savedDropoffAddress || 'Nhập địa chỉ tại đây';
                        if (changeDropoffLinkElement) changeDropoffLinkElement.style.display = savedDropoffAddress ? 'inline' :
                            'none';
                    }
                }
            }

            function searchDropoffAddress() {
                const input = document.querySelector('#dropoffInput').value.trim();
                const dropoffList = document.querySelector('#dropoffList');
                dropoffList.innerHTML = '';
                if (input.length > 0 && API_KEY) {
                    const apiUrl = `https://api.tomtom.com/search/2/geocode/${encodeURIComponent(input)}.json?key=${API_KEY}`;

                    fetch(apiUrl)
                        .then(response => {
                            if (!response.ok) throw new Error(`HTTP error! Status: ${response.status}`);
                            return response.json();
                        })
                        .then(data => {

                            const results = data.results;
                            if (results.length > 0) {
                                results.forEach(result => {
                                    const address = result.address.freeformAddress;
                                    const li = document.createElement('li');
                                    li.className = 'list-group-item';
                                    li.textContent = address;
                                    li.onclick = () => {
                                        localStorage.setItem('selectedDropoffAddress', address);
                                        alert(`Điểm trả đã chọn: ${address}`);
                                        dropoffModal.hide();
                                        updateSelectedDropoffAddress();
                                    };
                                    dropoffList.appendChild(li);
                                });
                            }
                        })
                }
            }

            function createNoResultsFoundMessage(listElement) {
                const li = document.createElement('li');
                li.className = 'list-group-item';
                li.textContent = 'Không tìm thấy địa chỉ nào.';
                listElement.appendChild(li);
            }

            function updateSelectedAddress() {
                const savedAddress = localStorage.getItem('selectedAddress');
                const displayAddressElement = document.querySelector('#displayAddress');
                const changeLinkElement = document.querySelector('#changeLink');

                if (displayAddressElement) {
                    const p = displayAddressElement.querySelector('p');
                    if (p) {
                        p.textContent = savedAddress || 'Nhập địa chỉ tại đây';
                        if (changeLinkElement) changeLinkElement.style.display = savedAddress ? 'inline' : 'none';
                    }
                }
            }

            function updateSelectedDropoffAddress() {
                const savedDropoffAddress = localStorage.getItem('selectedDropoffAddress');
                const displayDropoffAddressElement = document.querySelector('#displayDropoffAddress');
                const changeDropoffLinkElement = document.querySelector('#changeDropoffLink');

                if (displayDropoffAddressElement) {
                    const p = displayDropoffAddressElement.querySelector('p');
                    if (p) {
                        p.textContent = savedDropoffAddress || 'Nhập địa chỉ tại đây';
                        if (changeDropoffLinkElement) changeDropoffLinkElement.style.display = savedDropoffAddress ? 'inline' :
                            'none';
                    }
                }
            }
        </script>
        <script src="{{ asset('js/search_component.js') }}"></script>
        <script src="{{ asset('js/bus_route_filter.js') }}"></script>
        <script>
        </script>
    @endpush
