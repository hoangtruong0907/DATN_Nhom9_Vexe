<!---------------------------------- Drawer ---------------------------------->
<!-- Chi tiết chuyến đi-->
<div class="offcanvas offcanvas-end" tabindex="-1" id="tripDetailsRight" aria-labelledby="tripDetailsRightLabel"
    style="width: 560px;">
    <div class="d-flex flex-row align-items-center bg-primary" style="min-height: 72px; padding: 16px;">
        <div class="pointer text-white" style="width: 24px; height: 24px;" data-bs-dismiss="offcanvas" aria-label="Close">
            <i class="fa-solid fa-angle-left p-1"></i>
        </div>
        <div class="d-flex ms-3" style="flex: 1 1 0%;">
            <div class="d-flex flex-column w-100 justify-content-start mb-1 pt-1">
                <div class="d-flex flex-row">
                    <p class="mb-0 text-white fw-bold" style="line-height: 24px; letter-spacing: 0px;">
                        Chuyến tàu SP06
                    </p>
                </div>
                <div class="d-flex align-items-center">
                    <p class="fw-normal text-nowrap text-white mb-0"
                        style="font-size: 14px; line-height: 20px; letter-spacing: 0px;">
                        <span class="fw-medium">10:30 • Thứ Sáu, 20/10/2023</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- end header -->
    <div class="d-flex flex-column h-100 overflow-auto" style="z-index: 2000; scrollbar-width: none;">
        <div class="align-items-center bg-white pointer w-100">
            <div class="d-grid gap-3 p-4">
                <div class="d-grid gap-2">
                    <div class="d-flex justify-content-between gap-5">
                        <p class="fw-normal text-nowrap mb-0" style="line-height: 20px; letter-spacing: 0px;">
                            Tuyến</p>
                        <span class="fw-medium text-end mb-0 " style="font-size: 14px; line-height: 20px;">
                            Hà Nội - Sài Gòn
                        </span>
                    </div>
                    <div class="d-flex justify-content-between gap-5">
                        <p class="fw-normal text-nowrap mb-0" style="line-height: 20px; letter-spacing: 0px;">
                            Đơn vị
                        </p>
                        <span class="fw-medium text-end mb-0" style="font-size: 14px; line-height: 20px;">
                            Đường sắt Việt Nam
                        </span>
                    </div>
                    <div class="d-flex justify-content-between gap-5">
                        <p class="fw-normal text-nowrap mb-0" style="line-height: 20px; letter-spacing: 0px;">
                            Thời gian
                        </p>
                        <span class="fw-medium text-end mb-0" style="font-size: 14px; line-height: 20px;">
                            10:30 • Thứ Sáu, 20/10/2023
                        </span>
                    </div>
                    <div class="d-flex justify-content-between gap-5">
                        <p class="fw-normal text-nowrap mb-0" style="line-height: 20px; letter-spacing: 0px;">
                            Chuyến tàu
                        </p>
                        <span class="fw-medium text-end mb-0" style="font-size: 14px; line-height: 20px;">
                            Chuyến SP05
                        </span>
                    </div>
                    <div class="d-flex justify-content-between gap-5">
                        <p class="fw-normal text-nowrap mb-0" style="line-height: 20px; letter-spacing: 0px;">
                            Toa tàu
                        </p>
                        <span class="fw-medium text-end mb-0" style="font-size: 14px; line-height: 20px;">
                            Toa 1 (Ghế mềm), Toa 8 (Ghế cứng)
                        </span>
                    </div>
                    <div class="d-flex justify-content-between gap-5">
                        <p class="fw-normal text-nowrap mb-0" style="line-height: 20px; letter-spacing: 0px;">
                            Số lượng
                        </p>
                        <span class="fw-medium text-end mb-0" style="font-size: 14px; line-height: 20px;">
                            3 vé
                        </span>
                    </div>
                    <div class="w-100">
                        <div class="d-flex justify-content-between w-100 pointer">
                            <p class="fw-normal text-nowrap mb-0" style="line-height: 20px; letter-spacing: 0px;">
                                Mã ghế/ giường
                            </p>
                            <div class="d-flex align-items-center gap-sm-1 pointer">
                                <p class="fw-bold mb-0" style="font-size: 14px; line-height: 20px; letter-spacing: 0px">
                                <div class="fw-bold">A1, A2, A3</div>
                                </p>
                                <img class="icon-expand-less"
                                    src="https://229a2c9fe669f7b.cmccloud.com.vn/svgIcon/expand_less.svg"
                                    alt="icon-expand-less" width="20" height="20">
                            </div>
                        </div>
                        <div class="d-flex flex-column gap-2 mt-2 overflow-auto">
                            <div class="d-flex justify-content-end">
                                <p class="fw-normal mb-0"
                                    style="line-height: 20px; letter-spacing: 0px;font-size: 14px;">
                                    Toa 01: Ghế A1, Ghế A2
                                </p>
                            </div>
                            <div class="d-flex justify-content-end">
                                <p class="fw-normal mb-0"
                                    style="line-height: 20px; letter-spacing: 0px;font-size: 14px;">
                                    Toa 8: Ghế A3
                                </p>
                            </div>
                        </div>
                        <div class="overflow-auto d-flex flex-row coupon-container-train pt-2 pb-2" style="width: 500px">
                            <div class="locomotive">
                                <div class="boxTrain"> </div>
                                <div class="textTrain">SE6</div>
                            </div>
                            {{-- Khoang tau  --}}
                            @foreach ($carriage_list as $i => $carriage)
                                <div class="wrap-coupon-train" id="template-seat-train-{{ $i }}"
                                    data-id="{{ $carriage['carriage_number'] }}"
                                    data-physical-train-id="{{ $i }}"
                                    data-physical-carriage-id="{{ $carriage['physical_carriage_id'] }}">
                                    <button id="button-step-custom-1-{{ $i }}"
                                        class="navigation-button-custom" data-key="{{ $i }}"
                                        data-step="1">
                                        <div class="carriage-train">
                                            <div class="border-coupon-train ">
                                                <div class="flex-coupon-train">
                                                    <div class="count text-center">
                                                        <div class="">{{ $carriage['carriage_number'] }}</div>
                                                    </div>
                                                    <div class="text-coupon-train">
                                                        <div class="coupon-exp-train">
                                                            {{ $carriage['carriage_description'] }}
                                                        </div>
                                                        <p class="text-coupon-train">
                                                            {{ $carriage['total_carriage_seats'] }} chỗ -
                                                            Từ {{ formatCurrency($carriage['min_price']) }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </button>
                                </div>
                            @endforeach
                        </div>
                        @if (!empty($seatMap['data']) && isset($seatMap['data']['coach_seat_template']))
                            <div class="wrap-steps-train">
                                {{-- List template seat  --}}
                                <div class="right-steps-train">
                                    <div class="mt-3 border border-1 rounded-3 p-2">
                                        <div class="wrap-coach-train">
                                            @if (count($seatMap['data']['coach_seat_template']) > 0)
                                                @foreach ($seatMap['data']['coach_seat_template'] as $i => $val)
                                                    <div class="coach-train">
                                                        <table>
                                                            <tbody>
                                                                <tr class="coach-row-train">
                                                                    {{ $val['coach_name'] }}
                                                                </tr>
                                                                @for ($row = 1; $row <= $val['row_num']; $row++)
                                                                    <tr class="coach-row-train">
                                                                        @for ($col = 1; $col <= $val['col_num']; $col++)
                                                                            @php
                                                                                // Tìm ghế tại vị trí hàng và cột tương ứng
                                                                                $seat = collect(
                                                                                    $val['seats'],
                                                                                )->firstWhere(function ($s) use (
                                                                                    $row,
                                                                                    $col,
                                                                                ) {
                                                                                    return $s['row_num'] == $row &&
                                                                                        $s['col_num'] == $col;
                                                                                });
                                                                            @endphp
                                                                            @if (isset($seat['is_available']) && $seat['is_available'] == false && $seat['seat_code'] !== 'HL')
                                                                                <td class="seat">
                                                                                    <div class="seat-choose-item seat-container seat-unavailable"
                                                                                        data-disabled="{{ $seat['is_available'] ? 'false' : 'true' }}">
                                                                                        {!! renderSeat('', 'unselected') !!}
                                                                                    </div>
                                                                                </td>
                                                                                {{-- @elseif ($seat['is_available'] == false && $seat['seat_code'] == 'HL') --}}
                                                                                <td class="train-hl"></td>
                                                                            @elseif($seat)
                                                                                <td class="seat">
                                                                                    <div class="seat-choose-item seat-container"
                                                                                        data-disabled="{{ $seat['is_available'] ? 'false' : 'true' }}"
                                                                                        data-full-code="{{ $seat['full_code'] }}"
                                                                                        data-seat-code="{{ $seat['seat_code'] }}"
                                                                                        {{-- data-fare-seat="{{ $seat['train_data']['train_original_fare'] ?? $seat['train_data']['train_fare'] }}" --}}>
                                                                                        {!! renderSeat('', $seat['seat_code']) !!}
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
                                                                @endfor
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @elseif (count($seatMap['data']) > 1 && !isset($seatMap['data']['coach_seat_template']))
                            <div class="wrap-steps-train">
                                <div class="left-steps-train">
                                    <div class="seat-groups-train">
                                        <div class="note-train">Chú thích</div>
                                        {{-- List type seat train --}}
                                        <div class="seat-info-train">
                                            {!! renderSeat(3, 'unselected') !!}
                                            <span class="seat-name">Ghế không bán</span>
                                        </div>
                                        <div class="seat-info-train">
                                            {!! renderSeat(3, 'selected') !!}
                                            <span class="seat-name">Đang chọn</span>
                                        </div>
                                        <div class="seat-info-train">
                                            {!! renderSeat(3) !!}
                                            <span class="seat-name">
                                                <div class="seat-name-group">Ghế trống</div>
                                                {{-- <div class="seat-original">
                        <strong>{{ formatCurrency($seatTemplateMap[0]['seats'][0]['fare']) }}</strong>
                        <span
                            class="seat-fare-original">{{ formatCurrency($seatTemplateMap[0]['seats'][0]['fares']['original']) }}</span>
                    </div> --}}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                {{-- List template seat  --}}
                                <div class="right-steps-train scroll-carriage">
                                    <div class="mt-3">
                                        <div class="wrap-shipSeat">
                                            @foreach ($seatMap['data'] as $i => $carriage)
                                                <div class="shipSeat gap-3 mb-3 border border-1 rounded-3 p-2">
                                                    <div class="d-flex align-self-center fw-bold">Khoang
                                                        {{ $i + 1 }}</div>
                                                    <div class="bg-secondary-subtle p-4 align-self-center rounded">
                                                        @foreach ($carriage as $y => $seats)
                                                            <div class=" d-flex gap-5 align-items-center">
                                                                @foreach ($seats as $seat)
                                                                    @if (isset($seat['is_available']) && $seat['is_available'] == false)
                                                                        <td class="seat">
                                                                            <div class="seat-choose-item seat-container"
                                                                                data-disabled="{{ $seat['is_available'] ? 'false' : 'true' }}">
                                                                                {!! renderSeat(3, 'unselected') !!}

                                                                            </div>
                                                                        </td>
                                                                    @elseif($seat)
                                                                        <td class="seat">
                                                                            <div class="seat-choose-item seat-container"
                                                                                data-disabled="{{ $seat['is_available'] ? 'false' : 'true' }}"
                                                                                data-full-code="{{ $seat['full_code'] }}"
                                                                                data-seat-code="{{ $seat['seat_code'] }}"
                                                                                {{-- data-fare-seat="{{ $seat['train_data']['train_original_fare'] ?? $seat['train_data']['train_fare'] }}" --}}>
                                                                                {!! renderSeat(3, $seat['seat_code']) !!}
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
                                                                @endforeach
                                                                <p>Tầng {{ $y + 1 }}</p>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="fw-bold">Chưa có dữ liệu</div>
                        @endif

                    </div>
                    <div class="w-100">
                        <div class="d-flex justify-content-between w-100 pointer" id="totalAmountModal">
                            <p class="fw-normal text-nowrap mb-0" style="line-height: 20px; letter-spacing: 0px;">
                                Tạm tính
                            </p>
                            <div class="d-flex align-items-center gap-sm-1">
                                <p class="fw-bold mb-0"
                                    style="font-size: 14px; line-height: 20px; letter-spacing: 0px">
                                    1.800.000 đ
                                </p>
                                <img src="https://229a2c9fe669f7b.cmccloud.com.vn/svgIcon/expand_less.svg"
                                    alt="icon-expand-less" width="20" height="20">
                            </div>
                        </div>
                        <div class="pt-2 d-none" id="showTotalAmountModal">
                            <div class="d-flex justify-content-between">
                                <p class="label color--darkness">Giá vé</p>
                                <div class="d-flex flex-column">
                                    <div class="text-end">
                                        <p class="mb-0 fw-medium">600.000đ x 1</p>
                                        <p class="mb-0"
                                            style="font-size: 12px;color: rgb(133, 133, 133) !important;">Mã
                                            ghế/giường: A1</p>
                                    </div>
                                    <div class="text-end">
                                        <p class="mb-0 fw-medium">600.000đ x 1</p>
                                        <p class="mb-0"
                                            style="font-size: 12px;color: rgb(133, 133, 133) !important;">Mã
                                            ghế/giường: A2</p>
                                    </div>
                                    <div class="text-end">
                                        <p class="mb-0 fw-medium">600.000đ x 1</p>
                                        <p class="mb-0"
                                            style="font-size: 12px;color: rgb(133, 133, 133) !important;">Mã
                                            ghế/giường: A3</p>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between mt-1">
                                <p class="label color--darkness">Bảo hiểm chuyến đi</p>
                                <div class="text-end">
                                    <p class="mb-0">60.000đ</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-column gap-2" data-bs-toggle="offcanvas" data-bs-target="#changeRight"
                        aria-controls="changeRight">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex gap-1 align-items-center">
                                <img src="https://229a2c9fe669f7b.cmccloud.com.vn/svgIcon/pickup_vex_blue_24dp.svg"
                                    alt="pickup-icon" width="16" height="16">
                                <p class="mb-0 fw-bold" style="line-height: 20px; letter-spacing: 0px;">Điểm đón</p>
                            </div>
                            <p class="fw-bold mb-0 text-decoration-underline lh-sm text-primary pointer">Thay đổi</p>
                        </div>
                        <div class="gap-1 d-flex flex-column mb-0">
                            <p class="mb-0 fw-normal" style="line-height: 20px; letter-spacing: 0px;">Hà Nội</p>
                            <p class="mb-0 fw-normal mb-0 text-secondary"
                                style="line-height: 20px; letter-spacing: 0px;">
                                123 Đường ABC, Quận XYZ
                            </p>
                            <span class="fw-medium mb-0" style="font-size: 14px; line-height: 20px;">
                                Dự kiến đón lúc: 08:00 20/10/2023
                            </span>
                        </div>
                    </div>
                    <div class="d-flex flex-column gap-2" data-bs-toggle="offcanvas" data-bs-target="#changeLeft"
                        aria-controls="changeLeft">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex gap-1 align-items-center">
                                <img src="https://229a2c9fe669f7b.cmccloud.com.vn/svgIcon/dropoff_semantic_negative_12dp.svg"
                                    alt="dropoff-icon" width="16" height="16">
                                <p class="mb-0 fw-bold" style="line-height: 20px; letter-spacing: 0px;">Điểm trả</p>
                            </div>
                            <p class="fw-bold mb-0 text-decoration-underline lh-sm text-primary pointer">Thay đổi</p>
                        </div>
                        <div class="gap-1 d-flex flex-column mb-0">
                            <p class="mb-0 fw-normal" style="line-height: 20px; letter-spacing: 0px;">Sài Gòn</p>
                            <p class="mb-0 fw-normal mb-0 text-secondary"
                                style="line-height: 20px; letter-spacing: 0px;">
                                456 Đường DEF, Quận UVW
                            </p>
                            <span class="fw-medium mb-0" style="font-size: 14px; line-height: 20px;">
                                Dự kiến trả lúc: 18:00 20/10/2023
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  end content  -->
    <!-- Close button -->
    <div class="d-flex gap-3 p-3 border-top border-secondary bottom-0 bg-white" style="border-color: #e0e0e0">
        <button type="button" data-bs-dismiss="offcanvas" aria-label="Close"
            class="btn fw-bold d-flex align-items-center justify-content-center w-100 gap-1 pb-2"
            style="height: 48px; line-height: 24px; padding: 12px 0; border-radius: 8px; color: white; background: rgb(13, 46, 89); border-color: rgb(13, 46, 89);">
            <span>Đóng</span>
        </button>
    </div>
</div>
<!---------------------------------- End Drawer ---------------------------------->
