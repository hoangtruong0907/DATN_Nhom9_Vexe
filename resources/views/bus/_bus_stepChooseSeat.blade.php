@if ($config != 'CALLING')
    <div class="card card-body card-body-new">
        <div id="step1-{{ $keyId }}" class="wizard-step active step-bus1">
            <div class="wrap-card-body">
                <div class="steps-container">
                    <div class="step step-active">
                        <div class="step-icon">1</div>
                        <div class="step-content step-content1">
                            <div class="step-title">Chỗ mong muốn</div>
                        </div>
                        <div class="step-tail"></div>
                    </div>
                    <div class="step step-inactive">
                        <div class="step-icon step-icon-2 step-content2">2</div>
                        <div class="step-content">
                            <div class="step-title step-title2">Điểm đón trả</div>
                        </div>
                        <div class="step-tail"></div>
                    </div>
                </div>
            </div>
            <div class="trust-message">
                <p class="trust-message-text"><i class="fas fa-shield-alt"></i> Vexere cam kết giữ đúng chỗ của bạn.</p>
            </div>
            {{-- <div class="coupon-container">
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
            </div> --}}
            <div class="container-steps-content">
                <div class="wrap-steps-content">
                    <div class="left-steps-content left-step-bus1">
                        @if (count($seatTemplateMap) > 0 && isset($seatMap['vehicle']['seat_type']) && $unchoosable != 1)
                            <div class="seat-groups">
                                <div class="note">Chú thích</div>
                                <div class="seat-info">
                                    {!! renderSeat($seatMap['vehicle']['seat_type'], 'unselected') !!}
                                    <span class="seat-name">Ghế không bán</span>
                                </div>
                                <div class="seat-info">
                                    {!! renderSeat($seatMap['vehicle']['seat_type'], 'selected') !!}
                                    <span class="seat-name">Đang chọn</span>
                                </div>
                                <div class="seat-info">
                                    {!! renderSeat($seatMap['vehicle']['seat_type']) !!}
                                    <span class="seat-name">
                                        <div class="seat-name-group">Ghế trống</div>
                                        <div class="seat-original">
                                            <strong>{{ formatCurrency($seatTemplateMap[0]['seats'][0]['fare']) }}</strong>
                                            <span
                                                class="seat-fare-original">{{ formatCurrency($seatTemplateMap[0]['seats'][0]['fares']['original']) }}</span>
                                        </div>
                                    </span>
                                </div>
                                {{-- <div class="seat-info">
                            {!! renderSeat($seatMap['vehicle']['seat_type'], '', 'seat-discount') !!}
                            <span class="seat-name">
                                <div class="seat-name-group">Ghế trống</div>
                                <div class="seat-original">
                                    <strong>{{ formatCurrency($seatTemplateMap[0]['seats'][0]['fare']) }}</strong>
                            <span
                                class="seat-fare-original">{{ formatCurrency($seatTemplateMap[0]['seats'][0]['fares']['original'])}}</span>
                        </div>
                        </span>
                    </div> --}}
                                {{-- <div class="seat-info"> --}}
                                {{-- {!! renderSeat($seatMap['vehicle']['seat_type'], '', 'seat-group') !!} --}}
                                {{-- <span class="seat-name">
                                <div class="seat-name-group">CABIN ĐÔI</div>
                                <div class="seat-original">
                                    <strong>495,000đ</strong>
                                    <span class="seat-fare-original">550,000đ</span>
                                </div>
                            </span> --}}
                                {{-- </div> --}}
                            </div>
                        @else
                            <div class="seat-note">
                                <div class="label">Lưu ý</div>
                                <div>Chuyến này không hỗ trợ chọn chỗ trước</div>
                            </div>
                        @endif
                    </div>
                    <div class="right-steps-content right-step-bus1">
                        @if (count($seatTemplateMap) > 0 && $unchoosable != 1)
                            @foreach ($seatTemplateMap as $i => $coach)
                                <div class="wrap-coach">
                                    <div class="mb-2 mt-2">
                                        <span>{{ $coach['coach_name'] }}</span>
                                    </div>
                                    <div class="coach">
                                        <table>
                                            <tbody>
                                                @for ($row = 1; $row <= $coach['num_rows']; $row++)
                                                    <tr class="coach-row">
                                                        @for ($col = 1; $col <= $coach['num_cols']; $col++)
                                                            @php
                                                                // Tìm ghế tại vị trí hàng và cột tương ứng
                                                                $seat = collect($coach['seats'])->firstWhere(function (
                                                                    $s,
                                                                ) use ($row, $col) {
                                                                    return $s['row_num'] == $row &&
                                                                        $s['col_num'] == $col;
                                                                });

                                                            @endphp
                                                            @if (isset($seat['is_available']) && $seat['is_available'] == false)
                                                                <td class="seat">
                                                                    <div class="seat-choose-item seat-container"
                                                                        data-disabled="{{ $seat['is_available'] ? 'false' : 'true' }}">
                                                                        {!! renderSeat($seatMap['vehicle']['seat_type'], 'unselected') !!}
                                                                    </div>
                                                                </td>
                                                            @elseif ($seat)
                                                                <td class="seat">
                                                                    <div class="seat-choose-item seat-container"
                                                                        data-disabled="{{ $seat['is_available'] ? 'false' : 'true' }}"
                                                                        data-full-code="{{ $seat['full_code'] }}"
                                                                        data-seat-code="{{ $seat['seat_code'] }}"
                                                                        data-fare-seat="{{ $seat['fares']['original'] ?? $seat['fare'] }}">
                                                                        {!! renderSeat($seatMap['vehicle']['seat_type'], $seat['seat_code']) !!}
                                                                    </div>
                                                                </td>
                                                            @else
                                                                <td class="seat">
                                                                    <div class="seat-choose-item  seat-none"
                                                                        data-disabled="true"
                                                                        style="background-color: transparent;">
                                                                        <!-- Trường hợp không có ghế -->
                                                                    </div>
                                                                </td>
                                                            @endif
                                                        @endfor
                                                    </tr>
                                                @endfor
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            {{-- @if (isset($seatData)) --}}
                                <div class="online-note-selection">
                                    <div class="title">
                                        <div class="d-flex flex-row justify-content-between">
                                            <p class="p-0 m-0">Số lượng khách</p>
                                            <div class="content">{{$seatMap['vehicle']['seat_type'] !== 1 ? "Giường" : "Ghế"}} còn trống: {{ $seatMap ? $seatMap['total_available_seats'] : "Không" }} </div>
                                        </div>
                                    </div>

                                    <div class="seat-group-selection">
                                        <div class="d-flex flex-row align-items-center">
                                            {!! renderSeat($seatMap['vehicle']['seat_type'],'') !!}
                                            <div style="color: rgb(184, 184, 184);"> · {{ formatCurrency($seatMap['fare']) }}</div>
                                        </div>
                                        <div class="unique-quantity-input" data-seats="{{ $allSeatData }}" data-key="{{ $keyId }}" data-unchoosable="{{ $unchoosable }}" >
                                            <i class="fas fa-minus-circle unique-sub-icon"></i>
                                            <span id="unique-quantity" data-max-value={{ $seatMap['total_bookable_seats'] }}>0</span>
                                            <i class="fas fa-plus-circle unique-plus-icon"></i>
                                        </div>
                                    </div>
                                </div>
                            {{-- @endif --}}
                        @endif
                    </div>
                </div>
            </div>
            <div class="modal fade" id="exampleModal" aria-hidden="true">
                <div class="modal-dialog modal-dialog-new">
                    <div class="modal-content">
                        <div class="wrap-content">
                            <h6 class="modal-title fs-5" id="exampleModalLabel">Mã
                                giường</h6>
                            <button type="button" class="btn-close btn-modal-content" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="text-modal">
                            <p>Đây là giường có thể nằm tối đa 2 khách.<br>
                                Giá vé sẽ tương ứng với số lượng khách.</p>
                        </div>
                        <div class="group-chosen">
                            <div class="left-group-chosen">
                                <p class="text-chosen-t">CABIN ĐÔI (2 Khách) (Tổng dưới 160kg)</p>
                                <p class="text-chosen-b">850.000đ</p>
                            </div>
                            <div class="right-group-chosen">
                                <p class="text-chosen-t">CABIN ĐƠN (1 Khách)</p>
                                <p class="text-chosen-b">650.000đ</p>
                            </div>
                        </div>
                        <button type="button" class="ant-btn button-confirmchoose-chair"><span>Xác
                                nhận</span></button>
                    </div>
                </div>
            </div>
        </div>
        <div id="step2-{{ $keyId }}" class="wizard-step step-bus2">
            <div class="wrap-card-body">
                <div class="steps-container">
                    <div class="step step-active">
                        <div class="step-icon step-icon-step2"><i class="far fa-check-circle"></i></div>
                        <div class="step-content step-content1">
                            <div class="step-title step-title-step2">Chỗ mong muốn</div>
                        </div>
                        <div class="step-tail"></div>
                    </div>
                    <div class="step step-inactive">
                        <div class="step-icon  step-content2">2</div>
                        <div class="step-content">
                            <div class="step-title ">Điểm đón trả</div>
                        </div>
                        <div class="step-tail"></div>
                    </div>
                </div>
            </div>
            <div class="trust-message">
                <p class="trust-message-text"><i class="fas fa-shield-alt"></i> An tâm được đón đúng
                    nơi, trả đúng chỗ đã chọn và dễ dàng thay đổi khi cần.</p>
            </div>
            <div class="container-steps-content">
                <div class="wrap-steps-content">
                    <div class="left-steps-content left-step-bus2">
                        <div class="wrap-pick-up-point pickup-point">
                            <div class="container-wrap-pick-up-point">
                                <p class="text-pick-up-point">Điểm đón</p>
                                <div class="label-container">
                                    <p class="text-pick-up-point-arrange">
                                        Sắp xếp theo
                                    </p>
                                    <p class="text-pick-up-point-arrange">
                                        Xem điểm đón gần bạn nhất?
                                    </p>
                                </div>
                                <div class="value-container">
                                    <select class="form-select filter-drop-pickup" id="select_pickup"
                                        name="select_pickup">
                                        <option value="1" selected>Sớm nhất</option>
                                        <option value="2">Trễ nhất</option>
                                        <option value="3">Gần nhất</option>
                                    </select>
                                    <button class="custom-address-button">
                                        <span id="displayAddress" class="address-container">
                                            <p class="text-pick-up-point-arrange text-pick-up-point-maps"
                                                style="margin-left: 31px;">
                                                Nhập địa chỉ tại đây
                                            </p>
                                        </span>
                                        <span id="changeLink" class="change-link text-pick-up-point-maps"
                                            style="display: none;">Thay đổi</span>
                                    </button>
                                </div>
                            </div>
                            <div class="container-group-items-pick-up-point" id="items-pick-up-point">
                                {{-- <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault"
                                            id="flexRadioDefault1-{{ $keyId }}">
                                <label class="form-check-label-title" for="-{{ $keyId }}">
                                    19:00: Nội thành Tp. Đà Nẵng
                                </label>
                                <p class="text-form-check-label-t">Miễn phí - Vui lòng nhập địa chỉ cụ
                                    thể
                                    muốn được trung chuyển</p>
                                <p class="text-form-check-label-b">Đón tận nơi tại Thành phố Đà Nẵng
                                </p>
                                <b><i class="fa-solid fa-location-dot"></i> Đà Nẵng, Đà Nẵng</b>
                                <textarea id="transferAddress-{{ $keyId }}" placeholder="Nhập địa chỉ trung chuyển" class="ant-input"
                                    style="border: 1px solid rgb(192, 192, 192); display: none;"></textarea>
                            </div> --}}
                                @foreach ($pickupPoints as $index => $point)
                                    <div class="form-check item point_id-1" data-id="{{ $point['id'] }}"
                                        data-point-id="{{ $point['point_id'] }}">
                                        <input class="form-check-input" type="radio"
                                            name="rdioCheckDrop-{{ $keyId }}"
                                            value="{{ $point['point_id'] }}" data-name="{{ $point['name'] }}"
                                            id="rdioCheckDrop-{{ $keyId }}"
                                            {{ $index == 0 ? 'checked' : '' }}>
                                        <div class="fw-bold">{{ formatDateTime($point['real_time'], 'H:m • (d/m)') }}
                                        </div>
                                        <label class="form-check-label-title"
                                            for="rdioCheckDrop-{{ $keyId }}">{{ $point['name'] }},
                                            {{ $point['areaDetail']['city_name'] }}</label>
                                        <!-- Modal Trigger -->
                                        <small>
                                            <i class="fa-solid fa-location-dot me-1"></i>{{ $point['address'] }}
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#mapModal{{ $index }}">Bản đồ</a>
                                        </small>
                                        <!-- Modal Structure -->
                                        <div class="modal fade" id="mapModal{{ $index }}" tabindex="-1"
                                            aria-labelledby="mapModalLabel{{ $index }}" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title-map text-center"
                                                            id="mapModalLabel{{ $index }}">
                                                            {{ $point['name'] }},
                                                            {{ $point['areaDetail']['city_name'] }}
                                                        </h5>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- Google Map -->
                                                        <div class="mapouter">
                                                            <div class="gmap_canvas">
                                                                <iframe class="gmap_iframe" frameborder="0"
                                                                    scrolling="no" marginheight="0" marginwidth="0"
                                                                    src="https://maps.google.com/maps?width=524&height=500&hl=en&q={{ $point['areaDetail']['latitude'] }}+{{ $point['areaDetail']['longitude'] }}&t=&z=13&ie=UTF8&iwloc=B&output=embed"></iframe>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="right-steps-content right-step-bus2">
                        <div class="wrap-pick-up-point">
                            <div class="container-wrap-pick-up-point">
                                <p class="text-pick-up-point">Điểm trả</p>
                                <div class="label-container">
                                    <p class="text-pick-up-point-arrange">
                                        Sắp xếp theo
                                    </p>
                                    <p class="text-pick-up-point-arrange">
                                        Xem điểm đón gần bạn nhất?
                                    </p>
                                </div>
                                <div class="value-container">
                                    <select class="form-select filter-drop-pickup" id="dropoff_point"
                                        name="dropoff_point">
                                        <option value="1" selected>Sớm nhất</option>
                                        <option value="2">Trễ nhất</option>
                                        <option value="3">Gần nhất</option>
                                    </select>
                                    <button class="custom-dropoff-button" style=" justify-content: flex-end;">
                                        <span id="displayDropoffAddress" class="address-container">
                                            <p class="text-drop-off-point-arrange text-drop-off-point-maps text-decoration-underline "
                                                style="margin-left: 31px;">
                                                Nhập địa chỉ tại đây
                                            </p>
                                        </span>
                                        <span id="changeDropoffLink" class="change-link text-drop-off-point-maps"
                                            style="display: none;margin-left: 10px;">Thay đổi</span>
                                    </button>
                                </div>
                            </div>
                            <div class="container-group-items-pick-up-point" id="items-dropoff-point">
                                @foreach ($dropOffPoints as $index => $point)
                                    <div class="form-check item point_id-1" data-id="{{ $point['id'] }}"
                                        data-point-id="{{ $point['point_id'] }}">
                                        <input class="form-check-input" type="radio"
                                            name="rdioCheckTransfer-{{ $keyId }}"
                                            value="{{ $point['point_id'] }}"
                                            id="rdioCheckTransfer-{{ $keyId }}"
                                            data-name="{{ $point['name'] }}" {{ $index == 0 ? 'checked' : '' }}>
                                        <div class="fw-bold">{{ formatDateTime($point['real_time'], 'H:m • (d/m)') }}
                                        </div>
                                        <label class="form-check-label-title"
                                            for="rdioCheckTransfer-{{ $keyId }}">{{ $point['name'] }},
                                            {{ $point['areaDetail']['city_name'] }}</label>
                                        <!-- Modal Trigger -->
                                        <small>
                                            <i class="fa-solid fa-location-dot me-1"></i>{{ $point['address'] }}
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#mapModalDrop{{ $index }}">Bản đồ</a>
                                        </small>
                                        <!-- Modal Structure -->
                                        <div class="modal fade" id="mapModalDrop{{ $index }}" tabindex="-1"
                                            aria-labelledby="mapModalLabelDrop{{ $index }}"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title-map text-center"
                                                            id="mapModalLabelDrop{{ $index }}">
                                                            {{ $point['name'] }},
                                                            {{ $point['areaDetail']['city_name'] }}
                                                        </h5>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- Google Map -->
                                                        <div class="mapouter">
                                                            <div class="gmap_canvas">
                                                                <iframe class="gmap_iframe" frameborder="0"
                                                                    scrolling="no" marginheight="0" marginwidth="0"
                                                                    src="https://maps.google.com/maps?width=524&height=500&hl=en&q={{ $point['areaDetail']['latitude'] }}+{{ $point['areaDetail']['longitude'] }}&t=&z=13&ie=UTF8&iwloc=B&output=embed"></iframe>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="total-amount">
            <div class="left-total-amount d-flex align-items-center">
                <button type="button" class="ant-btn-primary back-step me-1"><span><i
                            class="fa-solid fa-arrow-left"></i> Quay lại</span></button>
                {{-- load list seat choosed --}}
                <div class="left-total code-seat-choosed"></div>
            </div>
            <div class="right-total-amount d-flex align-items-center">
                {{-- Load fate total seatchoosed --}}
                <div class="fare-total"></div>
                <button type="button" class="ant-btn-primary next-step"><span>Tiếp tục <i
                            class="fa-solid fa-arrow-right"></i></span></button>
                <button type="button" class="ant-btn-success confirm-step"><span>Xác nhận <i
                            class="fa-regular fa-circle-check"></i></span></button>
            </div>
        </div>

        {{-- Modal search Address --}}
        <!-- Button trigger modal -->
        <button type="button" class="hidden" data-bs-toggle="modal" id="btn_show_modal_search_address"
            data-bs-target="#modalSearchAddress">
            Launch demo modal
        </button>

        <!-- Modal -->
        <div class="modal fade" id="modalSearchAddress" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tìm kiếm địa chỉ</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <small class="text-primary">*Nhập địa chỉ điểm đến của bạn để sử dụng tiêu chí sắp xếp
                                này</small>
                            <input type="text" class="form-control mt-2 mb-2" id="address_input"
                                placeholder="03 Đinh Thị Hòa, An Hải Bắc, Sơn Trà, Đà Nẵng">
                            <div>
                                <p class="text-decoration-underline text-primary">Dùng vị trí hiện tại của bạn</p>
                            </div>
                            <hr class="mt-2 mb-2">
                            <div style="min-height: 200px">
                                {{-- content Demo --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- end modal --}}
    </div>
@else
    <!-- Content not found -->
    <div class="card card-body card-body-new">
        <div class="card card-body card-body-new">
            <div id="step1-{{ $keyId }}" class="wizard-step active step-bus1">
                <div class="trust-message">
                    <p class="trust-message-text"><i class="fa-solid fa-headset"></i> Gọi điện thoại tổng đài nhà xe để đặt vé</p>
                </div>
                <div class="wrap-card-body w-100">
                    <div class="seat-groups">
                    <div class="note">Thông tin liên hệ</div>
                    <div class="row w-100">
                        <div class="col-6">
                            <div class="fw-bold">{{ $companyData['name'] }}</div>
                        </div>
                        <div class="col-6">
                            <div class="list-group list-group-flush">
                                @foreach ($hotline as $val)
                                    <a class="list-group-item list-group-item-action"><i class="fa-solid fa-phone me-1"></i>{{$val}}</a>
                                @endforeach
                              </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endif
@push('page-scripts')
    <script>
        function renderSortItems(dataArray) {
            return dataArray.map((element, index) => {
                var originalDate = element.real_time;

                // Tách phần giờ và ngày từ chuỗi đầu vào
                var time = originalDate.split(' ')[0];
                var datePart = originalDate.split(' ')[1];

                // Tách ngày, tháng, năm
                var dateParts = datePart.split('-');
                var day = dateParts[0];
                var month = dateParts[1];

                // Định dạng lại ngày theo định dạng mong muốn
                var formattedDate = time + ' • (' + day + '/' + month + ')';

                return (`<div class="form-check item point_id-1" data-id="${element.id}" data-point-id="${element.point_id}">
                    <input class="form-check-input" type="radio"
                        name="rdioCheckTransfer-${ element.keyId }"
                        value="${element.point_id}" id="rdioCheckTransfer-${element.keyId}" data-name="${element.name}"
                        ${index == 0 ? "checked" : ""}>
                    <div class="fw-bold"> ${formattedDate}
                    <label class="form-check-label-title" for="rdioCheckTransfer-${ element.keyId }">
                        ${ element?.name }, ${ element.areaDetail?.city_name }
                    </label>
                    </div>
                    <small>
                        <i class="fa-solid fa-location-dot me-1"></i>${ element.address }
                        <a href="https://www.google.com/maps/search/${ element?.areaDetail?.latitude }+${ element?.areaDetail?.longitude }/'@'${element?.areaDetail?.latitude},${ element?.areaDetail?.longitude},17z?entry=ttu" target="_blank">Bản đồ</a>
                    </small>
                </div>`)
            })
        }

        // pickup select change
        $('#select_pickup').change((element) => {
            var curren_array_pick_up = {!! json_encode($pickupPoints) !!};

            switch ($('#select_pickup').val()) {
                case "1":
                    return $('#items-pick-up-point').empty().append(renderSortItems(curren_array_pick_up));
                    break;
                case "2":
                    let reverse_arr = curren_array_pick_up.reverse();
                    return $('#items-pick-up-point').empty().append(renderSortItems(reverse_arr));
                    break;
                case "3":
                    $('#btn_show_modal_search_address').click();
                    break;

                default:
                    break;
            }
        });

        // dropoff select change
        $('#dropoff_point').change((element) => {
            var curren_array = {!! json_encode($dropOffPoints) !!};

            switch ($('#dropoff_point').val()) {
                case "1":
                    return $('#items-dropoff-point').empty().append(renderSortItems(curren_array));
                    break;
                case "2":
                    let reverse_arr = curren_array.reverse();
                    return $('#items-dropoff-point').empty().append(renderSortItems(reverse_arr));
                    break;
                case "3":
                    $('#btn_show_modal_search_address').click();
                    break;

                default:
                    break;
            }
        });
    </script>
@endpush
