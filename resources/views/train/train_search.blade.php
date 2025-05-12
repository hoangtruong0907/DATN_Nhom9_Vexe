@extends('layouts.app')
@section('title', 'Tìm kiếm chuyến tàu')
@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/air-datepicker@3.5.3/air-datepicker.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/air-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('css/search-styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/train_styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/train_mobile.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.2.0/magnific-popup.min.css"
        integrity="sha512-lvaVbvmbHhG8cmfivxLRhemYlTT60Ly9Cc35USrpi8/m+Lf/f/T8x9kEIQq47cRj1VQIFuxTxxCcvqiQeQSHjQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- lightgallery plugins -->
    <link href="https://cdn.jsdelivr.net/npm/lightgallery@2.7/css/lightgallery.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@2.7.2/css/lightgallery-bundle.min.css"
        integrity="sha256-Eg8Gfr1vMiM54szM1+h+M018fqWyvVU/Ml8q48Oub+g=" crossorigin="anonymous">
@endsection

@section('content')
    <div id="airlinetickets">
        <div class="container-airlinetickets">
            @include('components.search_component', [
                'params' => $params,
                'key' => 3,
            ])
        </div>
        <div class="wrap-filter">
            <div class="left-filter">
                <div class="wrap-arrange-top">
                    <div class="text-arrange">
                        <h3>Sắp xếp</h3>
                    </div>
                    <div class="radio-group sort-options">
                        <label class="radio-wrapper checked">
                            <span class="radio checked">
                                <input type="radio" name="radio-date-time" class="radio-input" value="">
                                <span class="radio-inner"></span>
                            </span>
                            <span>
                                <p class="option-label">Mặc định</p>
                            </span>
                        </label>
                        <label class="radio-wrapper">
                            <span class="radio">
                                <input type="radio" name="radio-date-time" class="radio-input" value="fare:asc">
                                <span class="radio-inner"></span>
                            </span>
                            <span>
                                <p class="option-label">Giá tăng dần</p>
                            </span>
                        </label>
                        <label class="radio-wrapper">
                            <span class="radio">
                                <input type="radio" name="radio-date-time" class="radio-input" value="fare:desc">
                                <span class="radio-inner"></span>
                            </span>
                            <span>
                                <p class="option-label">Giá giảm dần</p>
                            </span>
                        </label>
                        <label class="radio-wrapper">
                            <span class="radio">
                                <input type="radio" name="radio-date-time" class="radio-input" value="hourGo:asc">
                                <span class="radio-inner"></span>
                            </span>
                            <span>
                                <p class="option-label">Giờ đi sớm nhất</p>
                            </span>
                        </label>
                        <label class="radio-wrapper">
                            <span class="radio">
                                <input type="radio" name="radio-date-time" class="radio-input" value="hourGo:desc">
                                <span class="radio-inner"></span>
                            </span>
                            <span>
                                <p class="option-label">Giờ đi muộn nhất</p>
                            </span>
                        </label>
                        <label class="radio-wrapper">
                            <span class="radio">
                                <input type="radio" name="radio-date-time" class="radio-input" value="hourCome:asc">
                                <span class="radio-inner"></span>
                            </span>
                            <span>
                                <p class="option-label">Giờ đến sớm nhất</p>
                            </span>
                        </label>
                        <label class="radio-wrapper">
                            <span class="radio">
                                <input type="radio" name="radio-date-time" class="radio-input" value="hourCome:desc">
                                <span class="radio-inner"></span>
                            </span>
                            <span>
                                <p class="option-label">Giờ đến muộn nhất</p>
                            </span>
                        </label>
                    </div>
                </div>
                <div class="wrap-arrange-bottom">
                    <div class="filters-wrapper">
                        <div class="filter-title">
                            <div class="filter-header">Lọc</div>
                            <p class="btn-clear">Xóa lọc</p>
                        </div>
                        {{-- Giờ đi --}}
                        <div class="filter-item">
                            <div class="filter-group filter-times">
                                <div class="filter-header-container">
                                    <p class="filter-label">Giờ đi</p>
                                    <div class="expand-icon"><i class="fa fa-angle-down" aria-hidden="true"></i></div>
                                </div>
                                <div class="filter-content">
                                    <div class="d-flex filter-time">
                                        <div class="group-time" data-value="timeGo:6h">
                                            <b>Sáng sớm</b>
                                            <div>00:00 - 06:00</div>
                                        </div>
                                        <div class="group-time" data-value="timeGo:12h">
                                            <b>Buổi sáng</b>
                                            <div>06:01 - 12:00</div>
                                        </div>
                                        <div class="group-time" data-value="timeGo:18h">
                                            <b>Buổi chiều</b>
                                            <div>12:01 - 18:00</div>
                                        </div>
                                        <div class="group-time" data-value="timeGo:23h">
                                            <strong>Buổi tối</strong>
                                            <div>18:01 - 23:59</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Giờ đến --}}
                        <div class="filter-item">
                            <div class="filter-group filter-times">
                                <div class="filter-header-container">
                                    <p class="filter-label">Giờ đến</p>
                                    <div class="expand-icon"><i class="fa fa-angle-down" aria-hidden="true"></i></div>
                                </div>
                                <div class="filter-content">
                                    <div class="d-flex filter-time">
                                        <div class="group-time" data-value="timeCome:6h">
                                            <b>Sáng sớm</b>
                                            <div>00:00 - 06:00</div>
                                        </div>
                                        <div class="group-time" data-value="timeCome:12h">
                                            <b>Buổi sáng</b>
                                            <div>06:01 - 12:00</div>
                                        </div>
                                        <div class="group-time" data-value="timeCome:18h">
                                            <b>Buổi chiều</b>
                                            <div>12:01 - 18:00</div>
                                        </div>
                                        <div class="group-time" data-value="timeCome:23h">
                                            <strong>Buổi tối</strong>
                                            <div>18:01 - 23:59</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Giá vé --}}
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
                                            <div class="custom-slider-track custom-slider-track-1" style="left: 0%; width: 100%;"></div>
                                            <div tabindex="0" class="custom-slider-handle custom-slider-handle-1"
                                                role="slider" aria-valuemin="0" aria-valuemax="2000000"
                                                aria-valuenow="0" style="left: 0%;">
                                            </div>
                                            <div tabindex="0" class="custom-slider-handle custom-slider-handle-2"
                                                role="slider" aria-valuemin="0" aria-valuemax="2000000"
                                                aria-valuenow="2000000" style="left: 100%;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="custom-value-info custom-value-left">0 đ</div>
                                    <div class="custom-value-info custom-value-right">2,000,000 đ</div>
                                </div>
                            </div>
                        </div>

                        {{-- Loại ghế/giường --}}
                        <div class="filter-group filter-seat-type">
                            <div class="filter-header-container">
                                <p class="filter-label">Loại ghế / giường</p>
                                <div class="expand-icon"><i class="fa fa-angle-down" aria-hidden="true"></i></div>
                            </div>
                            <div class="filter-content">
                                <div class="group-items-b">
                                    <label class="Filter_ACSeater ant-checkbox-wrapper-b" style="margin: 10px; display:flex">
                                        <span class="ant-checkbox-b">
                                            <input type="checkbox" class="ant-checkbox-input-b" value="" id="allSeats">
                                            <span class="ant-checkbox-inner-b"></span>
                                        </span>
                                        <span>Tất cả</span>
                                    </label>
                                    <label class="checkBoxGroup-b Filter_ACSleeper ant-checkbox-wrapper-b">
                                        <span class="ant-checkbox-b">
                                            <input type="checkbox" class="ant-checkbox-input-b" value="NGC">
                                            <span class="ant-checkbox-inner-b"></span>
                                        </span>
                                        <span>Ngồi cứng</span>
                                    </label>
                                    <label class="checkBoxGroup-b Filter_ACSleeper ant-checkbox-wrapper-b">
                                        <span class="ant-checkbox-b">
                                            <input type="checkbox" class="ant-checkbox-input-b" value="NGM">
                                            <span class="ant-checkbox-inner-b"></span>
                                        </span>
                                        <span>Ngồi mềm</span>
                                    </label>
                                    <label class="checkBoxGroup-b Filter_ACSleeper ant-checkbox-wrapper-b">
                                        <span class="ant-checkbox-b">
                                            <input type="checkbox" class="ant-checkbox-input-b" value="NAC">
                                            <span class="ant-checkbox-inner-b"></span>
                                        </span>
                                        <span>Nằm khoang 4</span>
                                    </label>
                                    <label class="checkBoxGroup-b Filter_ACSleeper ant-checkbox-wrapper-b">
                                        <span class="ant-checkbox-b">
                                            <input type="checkbox" class="ant-checkbox-input-b" value="NAM">
                                            <span class="ant-checkbox-inner-b"></span>
                                        </span>
                                        <span>Nằm khoang 6</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="right-filter">
                {{-- Load item is here --}}
                @foreach ($list_routes_train as $key => $route)
                    @include('train._train_item', [
                        'route' => $route,
                        'key' => (string) $key,
                    ])
                @endforeach
            </div>
        </div>
    </div>
    
    <!-- /////// lọc mobile///////// -->
    <div id="floating" class="floating-container">
        <button onclick="openFilterModal()">
            <span>&#9881;</span> Lọc
        </button>
        <button onclick="openSortModal()">
            <span>&#9650;</span> Sắp xếp
        </button>
    </div>

    {{--  --}}
    <div id="filterModal" class="modal">
        <div class="modal-content">
            <span class="close mb-4" onclick="closeFilterModal()">&times;</span>
            <div class="filter-title">
                <div class="filter-header">Lọc</div>
                <p class="btn-clear">Xóa lọc</p>
            </div>

            {{-- Giờ đi --}}
            <div class="filter-item">
                <div class="filter-group filter-times">
                    <div class="filter-header-container">
                        <p class="filter-label">Giờ đi</p>
                        <div class="expand-icon"><i class="fa fa-angle-down" aria-hidden="true"></i></div>
                    </div>
                    <div class="filter-content">
                        <div class="d-flex filter-time">
                            <div class="group-time" data-value="timeGo:6h">
                                <b>Sáng sớm</b>
                                <div>00:00 - 06:00</div>
                            </div>
                            <div class="group-time" data-value="timeGo:12h">
                                <b>Buổi sáng</b>
                                <div>06:01 - 12:00</div>
                            </div>
                            <div class="group-time" data-value="timeGo:18h">
                                <b>Buổi chiều</b>
                                <div>12:01 - 18:00</div>
                            </div>
                            <div class="group-time" data-value="timeGo:23h">
                                <strong>Buổi tối</strong>
                                <div>18:01 - 23:59</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Giờ đến --}}
            <div class="filter-item">
                <div class="filter-group filter-times">
                    <div class="filter-header-container">
                        <p class="filter-label">Giờ đến</p>
                        <div class="expand-icon"><i class="fa fa-angle-down" aria-hidden="true"></i></div>
                    </div>
                    <div class="filter-content">
                        <div class="d-flex filter-time">
                            <div class="group-time" data-value="timeCome:6h">
                                <b>Sáng sớm</b>
                                <div>00:00 - 06:00</div>
                            </div>
                            <div class="group-time" data-value="timeCome:12h">
                                <b>Buổi sáng</b>
                                <div>06:01 - 12:00</div>
                            </div>
                            <div class="group-time" data-value="timeCome:18h">
                                <b>Buổi chiều</b>
                                <div>12:01 - 18:00</div>
                            </div>
                            <div class="group-time" data-value="timeCome:23h">
                                <strong>Buổi tối</strong>
                                <div>18:01 - 23:59</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Giá vé --}}
            <div class="filter-group filter-price">
                <div class="filter-header-container">
                    <p class="filter-label">Giá vé</p>
                    <div class="expand-icon"><i class="fa fa-angle-down" aria-hidden="true"></i></div>
                </div>
                <div class="" style="display: none">
                    <div class="custom-group-info">
                        <div class="custom-slider-container">
                            <div class="custom-slider">
                                <div class="custom-slider-rail"></div>
                                <div class="custom-slider-track custom-slider-track-1" style="left: 0%; width: 100%;"></div>
                                <div tabindex="0" class="custom-slider-handle custom-slider-handle-1"
                                    role="slider" aria-valuemin="0" aria-valuemax="2000000"
                                    aria-valuenow="0" style="left: 0%;">
                                </div>
                                <div tabindex="0" class="custom-slider-handle custom-slider-handle-2"
                                    role="slider" aria-valuemin="0" aria-valuemax="2000000"
                                    aria-valuenow="2000000" style="left: 100%;">
                                </div>
                            </div>
                        </div>
                        <div class="custom-value-info custom-value-left">0 đ</div>
                        <div class="custom-value-info custom-value-right">2,000,000 đ</div>
                    </div>
                </div>
            </div>

            {{-- Loại ghế/giường --}}
            <div class="filter-group filter-seat-type">
                <div class="filter-header-container">
                    <p class="filter-label">Loại ghế / giường</p>
                    <div class="expand-icon"><i class="fa fa-angle-down" aria-hidden="true"></i></div>
                </div>
                <div class="filter-content">
                    <div class="group-items-b">
                        <label class="Filter_ACSeater ant-checkbox-wrapper-b" style="margin: 10px; display:flex">
                            <span class="ant-checkbox-b">
                                <input type="checkbox" class="ant-checkbox-input-b" value="" id="allSeats">
                                <span class="ant-checkbox-inner-b"></span>
                            </span>
                            <span>Tất cả</span>
                        </label>
                        <label class="checkBoxGroup-b Filter_ACSleeper ant-checkbox-wrapper-b">
                            <span class="ant-checkbox-b">
                                <input type="checkbox" class="ant-checkbox-input-b" value="NGC">
                                <span class="ant-checkbox-inner-b"></span>
                            </span>
                            <span>Ngồi cứng</span>
                        </label>
                        <label class="checkBoxGroup-b Filter_ACSleeper ant-checkbox-wrapper-b">
                            <span class="ant-checkbox-b">
                                <input type="checkbox" class="ant-checkbox-input-b" value="NGM">
                                <span class="ant-checkbox-inner-b"></span>
                            </span>
                            <span>Ngồi mềm</span>
                        </label>
                        <label class="checkBoxGroup-b Filter_ACSleeper ant-checkbox-wrapper-b">
                            <span class="ant-checkbox-b">
                                <input type="checkbox" class="ant-checkbox-input-b" value="NAC">
                                <span class="ant-checkbox-inner-b"></span>
                            </span>
                            <span>Nằm khoang 4</span>
                        </label>
                        <label class="checkBoxGroup-b Filter_ACSleeper ant-checkbox-wrapper-b">
                            <span class="ant-checkbox-b">
                                <input type="checkbox" class="ant-checkbox-input-b" value="NAM">
                                <span class="ant-checkbox-inner-b"></span>
                            </span>
                            <span>Nằm khoang 6</span>
                        </label>
                    </div>
                </div>
            </div>

            <div>
                <button class="close-button" onclick="closeFilterModal()">Xem 36 chuyến</button>
                <button class="close-button" onclick="closeFilterModal()">Xóa Lọc</button>
            </div>
        </div>

    </div>
    <!-- ///////// sắp xếp/////////// -->
    <div id="sortModal" class="modal">
        <div class="modal-content-1">
            <span class="close" onclick="closeSortModal()">&times;</span>
            <h2>Sắp xếp</h2>
            <div class="radio-group sort-options">
                <label class="radio-wrapper checked">
                    <span class="radio checked">
                        <input type="radio" name="radio-date-time" class="radio-input" value="">
                        <span class="radio-inner"></span>
                    </span>
                    <span>
                        <p class="option-label">Mặc định</p>
                    </span>
                </label>
                <label class="radio-wrapper">
                    <span class="radio">
                        <input type="radio" name="radio-date-time" class="radio-input" value="fare:asc">
                        <span class="radio-inner"></span>
                    </span>
                    <span>
                        <p class="option-label">Giá tăng dần</p>
                    </span>
                </label>
                <label class="radio-wrapper">
                    <span class="radio">
                        <input type="radio" name="radio-date-time" class="radio-input" value="fare:desc">
                        <span class="radio-inner"></span>
                    </span>
                    <span>
                        <p class="option-label">Giá giảm dần</p>
                    </span>
                </label>
                <label class="radio-wrapper">
                    <span class="radio">
                        <input type="radio" name="radio-date-time" class="radio-input" value="hourGo:asc">
                        <span class="radio-inner"></span>
                    </span>
                    <span>
                        <p class="option-label">Giờ đi sớm nhất</p>
                    </span>
                </label>
                <label class="radio-wrapper">
                    <span class="radio">
                        <input type="radio" name="radio-date-time" class="radio-input" value="hourGo:desc">
                        <span class="radio-inner"></span>
                    </span>
                    <span>
                        <p class="option-label">Giờ đi muộn nhất</p>
                    </span>
                </label>
                <label class="radio-wrapper">
                    <span class="radio">
                        <input type="radio" name="radio-date-time" class="radio-input" value="hourCome:asc">
                        <span class="radio-inner"></span>
                    </span>
                    <span>
                        <p class="option-label">Giờ đến sớm nhất</p>
                    </span>
                </label>
                <label class="radio-wrapper">
                    <span class="radio">
                        <input type="radio" name="radio-date-time" class="radio-input" value="hourCome:desc">
                        <span class="radio-inner"></span>
                    </span>
                    <span>
                        <p class="option-label">Giờ đến muộn nhất</p>
                    </span>
                </label>
            </div>
            <button class="close-button" onclick="closeSortModal()">Đóng</button>
        </div>
    </div>
@endsection

@push('page-scripts')
    <script src="https://cdn.jsdelivr.net/npm/air-datepicker@3.5.3/air-datepicker.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/moon-time@2.4.0/calculate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.2.0/jquery.magnific-popup.min.js"
        integrity="sha512-fCRpXk4VumjVNtE0j+OyOqzPxF1eZwacU3kN3SsznRPWHgMTSSo7INc8aY03KQDBWztuMo5KjKzCFXI/a5rVYQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- lightgallery plugins -->
    <script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.2/lightgallery.min.js"
        integrity="sha256-feKFTnlUEF8rkf9Zg3ScTjx69R4FquJ5+KXWaZSoV3c=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.2/plugins/zoom/lg-zoom.min.js"
        integrity="sha256-ghoq24AFURwK2e9vOVwbdL6swtoZTNE6SsQ9NBJG4IU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.2/plugins/thumbnail/lg-thumbnail.min.js"
        integrity="sha256-T7w+wYeOkDSLcbNZTY7yfE8QoaTG1edJSNDuWQGP2Hw=" crossorigin="anonymous"></script>

    <script>
        // data load search component
        // #bus
        const busCities = @json($list_areas ?? []);
        const dateTo = @json($params->dateTo ?? '');
        const dateFrom = @json($params->dateFrom ?? '');
        // #train
        const trainStations = @json($list_areas_train ?? []);
        const dateToTrain = @json($params->dateToTrain ?? '');
        const dateFromTrain = @json($params->dateFromTrain ?? '');
    </script>
    <script src="{{ asset('js/search_component.js') }}"></script>

    <script>
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

        // Lọc Giờ slide
        document.addEventListener('DOMContentLoaded', function() {
            const slider = document.querySelector('.slider');
            const handle1 = slider.querySelector('.slider-handle-1');
            const handle2 = slider.querySelector('.slider-handle-2');
            const track = slider.querySelector('.slider-track');
            const inputFrom = document.querySelector('.from-time');
            const inputTo = document.querySelector('.to-time');
            const max = 24; // Max value for the slider in hours

            // Function to convert time to hours
            function timeToHours(time) {
                return parseInt(time.split(':')[0]);
            }

            // Function to convert hours to time
            function hoursToTime(hours) {
                return `${String(hours).padStart(2, '0')}:00`;
            }

            // Function to update track and input values
            function updateTrack() {
                const value1 = parseFloat(handle1.style.left);
                const value2 = parseFloat(handle2.style.left);
                track.style.left = Math.min(value1, value2) + '%';
                track.style.width = Math.abs(value1 - value2) + '%';
                inputFrom.value = hoursToTime(Math.round(Math.min(value1, value2) * max / 100));
                inputTo.value = hoursToTime(Math.round(Math.max(value1, value2) * max / 100));
            }

            // Function to handle dragging
            function onDrag(event, handle) {
                const sliderRect = slider.getBoundingClientRect();
                const newLeft = Math.min(Math.max(0, event.clientX - sliderRect.left), sliderRect.width);
                const valueInHours = Math.round((newLeft / sliderRect.width) * max); // Round to nearest hour
                handle.style.left = (valueInHours / max) * 100 + '%';
                updateTrack();
            }

            function onDragEnd() {
                document.removeEventListener('mousemove', onMouseMove);
                document.removeEventListener('mouseup', onMouseUp);
            }

            function onMouseMove(event) {
                onDrag(event, draggingHandle);
            }

            function onMouseUp(event) {
                onDrag(event, draggingHandle);
                onDragEnd();
            }

            let draggingHandle;

            handle1.addEventListener('mousedown', function(event) {
                draggingHandle = handle1;
                document.addEventListener('mousemove', onMouseMove);
                document.addEventListener('mouseup', onMouseUp);
            });

            handle2.addEventListener('mousedown', function(event) {
                draggingHandle = handle2;
                document.addEventListener('mousemove', onMouseMove);
                document.addEventListener('mouseup', onMouseUp);
            });

            // Set initial positions and update track
            handle1.style.left = '0%';
            handle2.style.left = '100%';
            updateTrack();

            // Update the slider based on input change
            inputFrom.addEventListener('change', function() {
                const hours = Math.min(Math.max(timeToHours(inputFrom.value), 0), max);
                handle1.style.left = (hours / max) * 100 + '%';
                updateTrack();
            });

            inputTo.addEventListener('change', function() {
                const hours = Math.min(Math.max(timeToHours(inputTo.value), 0), max);
                handle2.style.left = (hours / max) * 100 + '%';
                updateTrack();
            });
        });
        // Lọc slide tiền
        document.addEventListener('DOMContentLoaded', function() {
            const slider = document.querySelector('.custom-slider');
            const handle1 = slider.querySelector('.custom-slider-handle-1');
            const handle2 = slider.querySelector('.custom-slider-handle-2');
            const track = slider.querySelector('.custom-slider-track-1');
            const valueLeft = document.querySelector('.custom-value-left');
            const valueRight = document.querySelector('.custom-value-right');
            const max = 2000000; // Max value for the slider

            // Function to format currency
            function formatCurrency(value) {
                return value.toLocaleString('vi-VN', {
                    style: 'currency',
                    currency: 'VND'
                });
            }

            // Function to update track and value display
            function updateTrack() {
                const value1 = parseFloat(handle1.style.left);
                const value2 = parseFloat(handle2.style.left);
                track.style.left = Math.min(value1, value2) + '%';
                track.style.width = Math.abs(value1 - value2) + '%';
                valueLeft.textContent = formatCurrency(Math.min(value1, value2) * max / 100);
                valueRight.textContent = formatCurrency(Math.max(value1, value2) * max / 100);
            }

            // Function to handle dragging
            function onDrag(event, handle) {
                const sliderRect = slider.getBoundingClientRect();
                const newLeft = Math.min(Math.max(0, event.clientX - sliderRect.left), sliderRect.width);
                handle.style.left = (newLeft / sliderRect.width) * 100 + '%';
                updateTrack();
            }

            function onDragEnd() {
                document.removeEventListener('mousemove', onMouseMove);
                document.removeEventListener('mouseup', onMouseUp);
                filterByPrice(valueLeft.textContent, valueRight.textContent)
            }

            function onMouseMove(event) {
                onDrag(event, draggingHandle);
            }

            function onMouseUp(event) {
                onDrag(event, draggingHandle);
                onDragEnd();
            }

            let draggingHandle;

            handle1.addEventListener('mousedown', function(event) {
                draggingHandle = handle1;
                document.addEventListener('mousemove', onMouseMove);
                document.addEventListener('mouseup', onMouseUp);
            });

            handle2.addEventListener('mousedown', function(event) {
                draggingHandle = handle2;
                document.addEventListener('mousemove', onMouseMove);
                document.addEventListener('mouseup', onMouseUp);
            });

            // Set initial positions and update track
            handle1.style.left = '0%';
            handle2.style.left = '100%';
            updateTrack();
        });
        //
        $(document).ready(function() {
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

        document.addEventListener('DOMContentLoaded', function() {
            // Lấy tất cả các phần tử carousel
            document.querySelectorAll('.carousel').forEach(function(carouselEl) {
                // Khởi tạo Bootstrap Carousel cho mỗi phần tử
                const carousel = new bootstrap.Carousel(carouselEl, {
                    // interval: 2000,
                    wrap: true,
                });

                $('#myCarousel').carousel({
                    interval: 3500
                });

                // This event fires immediately when the slide instance method is invoked.
                $('#myCarousel').on('slide.bs.carousel', function(e) {
                    var id = $('.item.active').data('slide-number');

                    // Added a statement to make sure the carousel loops correct
                    if (e.direction == 'right') {
                        id = parseInt(id) - 1;
                        if (id == -1) id = 7;
                    } else {
                        id = parseInt(id) + 1;
                        if (id == $('[id^=carousel-thumb-]').length) id = 0;
                    }

                    $('[id^=carousel-thumb-]').removeClass('selected');
                    $('[id=carousel-thumb-' + id + ']').addClass('selected');
                });

                // Thumb control
                $('[id^=carousel-thumb-]').click(function() {
                    var id_selector = $(this).attr("id");
                    var id = id_selector.substr(id_selector.length - 1);
                    id = parseInt(id);
                    $('#myCarousel').carousel(id);
                    $('[id^=carousel-thumb-]').removeClass('selected');
                    $(this).addClass('selected');
                });
            });
        });

        function nextStep(step) {
            document.querySelector('.wizard-step.active').classList.remove('active');
            document.getElementById('step' + step).classList.add('active');
        }

        function prevStep(step) {
            document.querySelector('.wizard-step.active').classList.remove('active');
            document.getElementById('step' + step).classList.add('active');
        }

        $('.coupon-container-train').on('click', '.wrap-coupon-train', function() {
            let carriage = $(this);
            $(".wrap-coupon-train").removeClass('active');
            carriage.addClass('active');
            let trainId = carriage.data('physical-train-id');
            let carriageId = carriage.data('physical-carriage-id');
            console.log(trainId, carriageId);
            $(`.card-body-train #template-seat-${trainId}`).html(`
                    <div class="d-flex w-100 h-100 justify-content-center align-items-center">
                        <div class="spinner-grow" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>`);
            // /api/info/tau-hoa/seat-map
            $.ajax({
                url: "/api/info/tau-hoa/seat-map",
                type: 'POST',
                data: {
                    trainId,
                    carriageId,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    $(`.card-body-train #template-seat-${trainId}`).html(response.dataHTML);

                    // if (response.status === 'success') {

                    // } else {
                    //     alert('Đã xảy ra lỗi: ' + response.message);
                    // }
                },
                error: function(xhr, status, error) {
                    alert('Đã xảy ra lỗi: ' + error);
                }
            });

        });

        // config variable 
        var listRoutesTrain = @json($list_routes_train),
        route_update_train = '{{ route('route.sort.train') }}';
       
    </script>

    <script src="{{ asset('js/sort_train.js') }}"></script>
@endpush
