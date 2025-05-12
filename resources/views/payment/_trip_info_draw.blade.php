<!---------------------------------- Drawer ---------------------------------->
<!--Chọn mã quốc gia - SĐT-->
<div class="offcanvas offcanvas-end" tabindex="-1" id="countryPhonesRight" aria-labelledby="countryPhonesRightLabel"
    style="width: 560px;">
    <div class="d-flex flex-row align-items-center bg-primary" style="min-height: 72px; padding: 16px;">
        <div class="pointer text-white" style="width: 24px; height: 24px;" data-bs-dismiss="offcanvas"
            aria-label="Close">
            <i class="fa-solid fa-angle-left p-1"></i>
        </div>
        <div class="d-flex ms-3" style="flex: 1 1 0%;">
            <p class="  mb-0 text-white fw-bold" style="line-height: 24px; letter-spacing: 0px;">
                Chọn mã quốc gia</p>
        </div>
    </div>
    <!--end headrer -->
    <div class="p-3 bg-white border-bottom w-100" style="border-bottom-color: rgb(224, 224, 224);">
        <div class="input-group position-relative">
            <input class="form-control border rounded-pill ps-5 search-input" type="search"
                placeholder="Tìm kiếm trong danh sách">
            <span class="position-absolute top-50 translate-middle-y ms-3 search-icon">
                <i class="fa fa-search"></i>
            </span>
        </div>
    </div>
    <!--end search box -->
    <div class="d-flex flex-column h-100 overflow-auto" style="z-index: 2000; scrollbar-width: none;">
        <div class="d-flex align-items-center bg-white p-3 ps-4 pointer">
            <div>🇰🇾</div>
            <div class="d-flex flex-row ms-3">
                <p class="  mb-0" style="font-weight: 400; letter-spacing: 0;">
                    Cayman Islands (+ 345)
                </p>
            </div>
        </div>
        <div class="d-flex align-items-center bg-white p-3 ps-4 pointer">
            <div>🇨🇦</div>
            <div class="d-flex flex-row ms-3">
                <p class="  mb-0" style="font-weight: 400; letter-spacing: 0;">
                    Canada (+1)
                </p>
            </div>
        </div>
    </div>
    <!--end content -->
    <!--Close button -->
    <div class="d-flex gap-3 p-3 border-top border-secondary bottom-0 bg-white" style="border-color: #e0e0e0">
        <button type="button" data-bs-dismiss="offcanvas" aria-label="Close"
            class="btn fw-bold d-flex align-items-center justify-content-center w-100 gap-1 pb-2"
            style="height: 48px; line-height: 24px; padding: 12px 0; border-radius: 8px; color: white; background: rgb(13, 46, 89); border-color: rgb(13, 46, 89);">
            <span>Đóng</span>
        </button>
    </div>
</div>
<!-- Chi tiết chuyến đi-->
<div class="offcanvas offcanvas-end" tabindex="-1" id="tripDetailsRight" aria-labelledby="tripDetailsRightLabel"
    style="width: 560px;">
    <div class="d-flex flex-row align-items-center bg-primary" style="min-height: 72px; padding: 16px;">
        <div class="pointer text-white" style="width: 24px; height: 24px;" data-bs-dismiss="offcanvas"
            aria-label="Close">
           <i class="fa-solid fa-angle-left p-1"></i>
        </div>
        <div class="d-flex ms-3" style="flex: 1 1 0%;">
            <div class="d-flex flex-column w-100 justify-content-start mb-1 pt-1">
                <div class="d-flex flex-row">
                    <p class="  mb-0 text-white fw-bold" style="line-height: 24px; letter-spacing: 0px;">
                        {{{$seatMap['company_name']}}}
                    </p>
                </div>
                <div class="d-flex align-items-center">
                    <p class="fw-normal text-nowrap text-white mb-0"
                        style="font-size: 14px; line-height: 20px; letter-spacing: 0px;">
                        <span class="fw-medium">{{formatDateTime($seatMap['departure_time'], "H:i • D, d/m/Y", 0, 0, 'vi')}}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- end headrer -->
    <div class="d-flex flex-column h-100 overflow-auto" style="z-index: 2000; scrollbar-width: none;">
        <div class="align-items-center bg-white pointer w-100">
            <div class="d-grid gap-3 p-4">
                <div class="d-grid gap-2">
                    <div class="d-flex justify-content-between gap-5">
                        <p class="fw-normal text-nowrap mb-0" style="line-height: 20px; letter-spacing: 0px;">
                            Tuyến</p>
                        <span class="fw-medium text-end mb-0 " style="font-size: 14px;
                            line-height: 20px;">
                            {{$selectedPickupPoint['areaDetail']['city_name']}} - {{$selectedDropPoint['areaDetail']['city_name']}}
                        </span>
                    </div>
                    <div class="d-flex justify-content-between gap-5">
                        <p class="fw-normal text-nowrap mb-0" style="line-height: 20px; letter-spacing: 0px;">
                            Nhà xe
                        </p>
                        <span class="fw-medium text-end mb-0" style="font-size: 14px; line-height: 20px;">
                            {{$seatMap['company_name']}}
                        </span>
                    </div>
                    <div class="d-flex justify-content-between gap-5">
                        <p class="fw-normal text-nowrap mb-0" style="line-height: 20px; letter-spacing: 0px;">
                            Chuyến
                        </p>
                        <span class="fw-medium text-end mb-0" style="font-size: 14px; line-height: 20px;">
                            {{formatDateTime($seatMap['departure_time'], "H:i • D, d/m/Y", 0, 0, 'vi')}}
                        </span>
                    </div>
                    <div class="d-flex justify-content-between gap-5">
                        <p class="fw-normal text-nowrap mb-0" style="line-height: 20px; letter-spacing: 0px;">
                            Loại xe
                        </p>
                        <span class="fw-medium text-end mb-0" style="font-size: 14px; line-height: 20px;">
                            {{$seatMap['name']}}
                        </span>
                    </div>
                    <div class="d-flex justify-content-between gap-5">
                        <p class="fw-normal text-nowrap mb-0" style="line-height: 20px; letter-spacing: 0px;">
                            Số lượng
                        </p>
                        <span class="fw-medium text-end mb-0" style="font-size: 14px; line-height: 20px;">
                            {{count($seatTicket['seatList'])}} vé
                        </span>
                    </div>
                    <div class="w-100">
                        <div class="d-flex justify-content-between w-100 pointer">
                            <p class="fw-normal text-nowrap mb-0" style="line-height: 20px; letter-spacing: 0px;">
                                Mã ghế/ giường
                            </p>
                            <div class="d-flex align-items-center gap-sm-1 pointer">
                                <p class="fw-bold mb-0"
                                    style="font-size: 14px;  line-height: 20px; letter-spacing: 0px">
                                    <div class="fw-bold">{{ implode(', ', array_keys($seatTicket['seatList'])) }}</div>
                                </p>
                                <img class="icon-expand-less ls-is-cached lazyloaded"
                                    data-src="https://229a2c9fe669f7b.cmccloud.com.vn/svgIcon/expand_less.svg"
                                    src="https://229a2c9fe669f7b.cmccloud.com.vn/svgIcon/expand_less.svg"
                                    alt="icon-expand-less" width="20" height="20">
                            </div>
                        </div>
                        <div class="d-flex flex-column gap-2 mt-2 overflow-auto">
                            <div class="d-flex justify-content-end">
                                <p class="fw-normal mb-0"
                                    style="line-height: 20px; letter-spacing: 0px;font-size: 14px;">{{$seatMap['vehicle']['seat_type'] !== 1 ? "Giường" : "Ghế"}}:
                                    <span>{{ implode(', ', array_keys($seatTicket['seatList'])) }}</span>
                                </p>
                            </div>
                        </div>
                        @if($seatInfo['unchoosable'] != 1)
                            <div class="d-flex justify-content-evenly overflow-auto text-center py-1">
                                @if (count($seatTemplateMap) > 0)
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
                                                                        $seat = collect($coach['seats'])->firstWhere(function ($s) use ($row, $col) {
                                                                            return $s['row_num'] == $row && $s['col_num'] == $col;
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
                                                                        @if (in_array($seat['seat_code'], array_keys($seatTicket['seatList'])))
                                                                            <td class="seat">
                                                                                <div class="seat-choose-item seat-container seat-selected"
                                                                                data-disabled="{{ $seat['is_available'] ? 'false' : 'true' }}">
                                                                                    {!! renderSeat($seatMap['vehicle']['seat_type'], $seat['seat_code']) !!}
                                                                                </div>
                                                                            </td>
                                                                        @else
                                                                            <td class="seat">
                                                                                <div class="seat-choose-item seat-container"
                                                                                    data-disabled="{{ $seat['is_available'] ? 'false' : 'true' }}">
                                                                                    {!! renderSeat($seatMap['vehicle']['seat_type'], $seat['seat_code']) !!}
                                                                                </div>
                                                                            </td>
                                                                        @endif
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
                                @endif
                            </div>
                        @endif
                    </div>
                    <div class="w-100">
                        <div class="d-flex justify-content-between w-100 pointer" id="totalAmountModal">
                            <p class="fw-normal text-nowrap mb-0" style="line-height: 20px; letter-spacing: 0px;">
                                Tạm tính
                            </p>
                            <div class="d-flex align-items-center gap-sm-1">
                                <p class="fw-bold mb-0"
                                    style="font-size: 14px;  line-height: 20px; letter-spacing: 0px">
                                    {{number_format($seatTicket['totalFare'], 0, ',', '.')}} đ
                                </p>
                                <img src="https://229a2c9fe669f7b.cmccloud.com.vn/svgIcon/expand_less.svg"
                                    alt="icon-expand-less" width="20" height="20">
                            </div>
                        </div>

                        <div class="pt-2 d-none" id="showTotalAmountModal">
                            <div class="d-flex justify-content-between">
                                <p class="label color--darkness">Giá vé</p>
                                <div class="d-flex flex-column">
                                    @foreach ($seatTicket['seatList'] as $seat)
                                    <div class="text-end">
                                        <p class="mb-0 fw-medium">{{$seat['fareSeat']}}đ x 1</p>
                                        <p class="mb-0"
                                            style="font-size: 12px;color: rgb(133, 133, 133) !important;">Mã
                                            ghế/giường: {{$seat['seatCode']}}</p>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="d-flex justify-content-between mt-1">
                                <p class="label color--darkness">Bảo hiểm chuyến đi</p>
                                <div class="text-end">
                                    <p class="mb-0">60.000đ đ</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-column gap-2" data-bs-toggle="offcanvas" data-bs-target="#changeRight"
                        aria-controls="changeRight">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex gap-1 align-items-center">
                                <img data-src="https://229a2c9fe669f7b.cmccloud.com.vn/svgIcon/pickup_vex_blue_24dp.svg"
                                    src="https://229a2c9fe669f7b.cmccloud.com.vn/svgIcon/pickup_vex_blue_24dp.svg"
                                    alt="pickup-icon" width="16" height="16">
                                <p class="mb-0 fw-bold" style="line-height: 20px; letter-spacing: 0px;">
                                    Điểm đón
                                </p>
                            </div>
                            @if(!isset($isPayment))
                                <p class="fw-bold mb-0 text-decoration-underline lh-sm text-primary pointer">
                                    Thay đổi
                                </p>
                            @endif
                        </div>
                        <div class="gap-1 d-flex flex-column mb-0">
                            <p class="  mb-0 fw-normal" style="line-height: 20px; letter-spacing: 0px;">
                                {{$selectedPickupPoint['areaDetail']['state_name']}}
                            </p>
                            <p class="  mb-0 fw-normal mb-0 text-secondary"
                                style="line-height: 20px; letter-spacing: 0px;">{{$selectedPickupPoint['areaDetail']['address']}}, {{$selectedPickupPoint['areaDetail']['city_name']}}</p>
                            <span class="fw-medium mb-0" style="font-size: 14px; line-height: 20px;">
                                Dự kiến đón lúc: {{formatDateTime($selectedPickupPoint['real_time'], "H:i d/m/Y")}}
                            </span>
                        </div>
                    </div>
                    {{-- row --}}
                    <div class="d-flex flex-column gap-2" data-bs-toggle="offcanvas" data-bs-target="#changeLeft"
                        aria-controls="changeLeft">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex gap-1 align-items-center">
                                <img data-src="https://229a2c9fe669f7b.cmccloud.com.vn/svgIcon/dropoff_semantic_negative_12dp.svg"
                                    src="https://229a2c9fe669f7b.cmccloud.com.vn/svgIcon/dropoff_semantic_negative_12dp.svg"
                                    alt="dropoff-icon" width="16" height="16">
                                <p class="mb-0   fw-bold" style="line-height: 20px; letter-spacing: 0px;">
                                    Điểm trả
                                </p>
                            </div>
                            @if(!isset($isPayment))
                                <p class="fw-bold mb-0 text-decoration-underline lh-sm text-primary pointer">
                                    Thay đổi
                                </p>
                            @endif
                        </div>
                        <div class="gap-1 d-flex flex-column mb-0">
                            <p class="  mb-0 fw-normal" style="line-height: 20px; letter-spacing: 0px;">
                                {{$selectedDropPoint['areaDetail']['state_name']}}
                            </p>
                            <p class="  mb-0 fw-normal mb-0 text-secondary"
                                style="line-height: 20px; letter-spacing: 0px;">
                                {{$selectedDropPoint['areaDetail']['address']}}, {{$selectedDropPoint['areaDetail']['city_name']}}
                            </p>
                            <span class="fw-medium mb-0" style="font-size: 14px; line-height: 20px;">
                                Dự kiến trả lúc: {{formatDateTime($selectedDropPoint['real_time'], "H:i d/m/Y")}}
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
            class="btn   fw-bold d-flex align-items-center justify-content-center w-100 gap-1 pb-2"
            style="height: 48px; line-height: 24px; padding: 12px 0; border-radius: 8px; color: white; background: rgb(13, 46, 89); border-color: rgb(13, 46, 89);">
            <span>Đóng</span>
        </button>
    </div>
</div>
<!-- Thay đổi điểm đón chiều đi -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="changeRight" aria-labelledby="changeRightLabel"
    style="width: 560px;">
    <div class="d-flex flex-row align-items-center bg-primary" style="min-height: 72px; padding: 16px;">
        <div class="pointer text-white" style="width: 24px; height: 24px;" data-bs-dismiss="offcanvas"
            aria-label="Close">
           <i class="fa-solid fa-angle-left p-1"></i>
        </div>
        <div class="d-flex ms-3" style="flex: 1 1 0%;">
            <p class="  mb-0 text-white fw-bold" style="line-height: 24px; letter-spacing: 0px;">
                Thay đổi điểm đón chiều đi
            </p>
        </div>
    </div>
    <!-- end headrer -->
    <!-- header 2 -->
    <div class="position-sticky d-flex flex-column w-100"
        style="background-color: rgb(247, 247, 247) !important; padding: 12px 20px; z-index: 5;">
        <div class="d-flex flex-row  justify-content-between">
            <p class="fw-normal mb-0" style="font-size: 12px; line-height: 16px; ">Sắp xếp theo</p>
            <p class="fw-normal mb-0" style="font-size: 12px; line-height: 16px;">Khoảng cách từ điểm đón đến
            </p>
        </div>

        <div class="d-flex flex-row justify-content-between mt-1">
            <button type="button" class="d-flex align-items-center p-0 border-0 m-0" id="sortedBy"
                style="background-color: unset;">
                <p class="fw-bold mb-0" style="font-size: 12px; line-height: 16px;">
                    Sớm nhất
                </p>
                <i class="material-icons-outlined"
                    style="font-size: 16px; line-height: 16px; margin-left: 4px;">arrow_drop_down</i>
            </button>

            <button type="button" class="d-flex flex-row p-0 border-0 m-0" id="changeLocation"
                style="background-color: unset;">
                <p class="fw-bold mb-0" style="font-size: 12px; line-height: 16px;">
                    Vị trí của bạn
                </p>
                <p class="fw-bold mb-0"
                    style="font-size: 12px; line-height: 16px; margin-left: 4px; text-decoration: underline; color: rgb(36, 116, 229) !important;">
                    Thay đổi
                </p>
            </button>
        </div>
    </div>
    {{-- @php
        dd($pickup_points);
    @endphp --}}
    <!--content -->
    <div class="d-flex flex-column bg-white" style="overflow-x: hidden !important;">
        <div class="d-flex flex-column" style="min-width: 232px;">
            @foreach ($pickup_points as $key => $point)
            <label class="d-flex align-items-start mb-0" data-id="{{$key}}"
                style="padding: 16px 0 0 20px; background-color: rgb(227, 237, 252);">
                <input class="form-check-input" type="radio" name="rdPickupPoint" id="rdPickupPoint-{{$key}}"
                    value="{{$point['id']}}" {{$key == 0 ? "checked" : ""}}/>
                <div style="flex: 1 1 0%; padding: 0px; margin-left: 12px;">
                    <div class="d-flex flex-column "
                        style="padding: 0px 20px 16px 32px; border-bottom: 0.5px solid rgb(224, 224, 224); margin-left: -32px;">
                        <div class="d-flex flex-row" style="flex: 1 1 0%;">
                            <div class="d-flex flex-column justify-content-center position-relative w-75" data-drop-id="{{$point['id']}}">
                                <div class="d-flex flex-row align-items-start align-items-center">
                                    <p class="fw-bold ms-1 mb-1">
                                        {{formatDateTime($point['real_time'], "H:i")}}
                                    </p>
                                </div>
                                <div class="d-flex flex-column align-items-start">
                                    <p class="fw-medium mb-1" style="line-height: 20px; letter-spacing: 0px;">
                                        {{$point['name']}}
                                    </p>
                                </div>
                                <div class="d-flex flex-column align-items-start ">
                                    <p class="fw-normal mb-1 text-secondary"
                                        style="line-height: 16px; font-size: 12px;">
                                        {{$point['areaDetail']['address']?? []}}, {{$point['areaDetail']['city_name'] ?? ""}}, {{$point['areaDetail']['state_name'] ?? ""}}
                                    </p>
                                </div>
                                {{-- <div class="d-flex flex-column align-items-start text-danger">
                                    <p class="fw-normal mb-1" style="line-height: 16px; font-size: 12px;">
                                        220.000đ / nhóm từ 1-3 khách (trả tại website Vexere)
                                    </p>
                                </div> --}}
                            </div>
                            <div class="d-flex flex-column justify-content-center position-relative w-25">
                                <div class="d-flex flex-column align-items-start">
                                    <p class="position-absolute text-center fw-bold mb-0 top-0 end-0"
                                        style="width: calc(100% + 42px); line-height: 20px;">
                                        636.9 km
                                    </p>
                                </div>
                                <button type="button" id="viewLocation"
                                    class="d-flex justify-content-end p-0 border-0 m-0 bg-transparent">
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <div class="d-flex" style="width: 24px; height: 24px;">
                                            <i class="material-icons-round text-primary">place</i>
                                        </div>
                                        <p class="fw-normal text-primary mb-0"
                                            style="line-height: 20px; letter-spacing: 0px;text-decoration: underline;">
                                            Xem vị trí
                                        </p>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </label>
            @endforeach
        </div>
    </div>
    <!--end content -->
    <!--footer -->
    <div class="border-top border-secondary bg-white position-absolute start-0 bottom-0 w-100 p-3">
        <div class="d-flex justify-content-between align-items-center mb-2">
            <div>Sai hoặc thiếu thông tin?</div>
            <p class="text-primary fw-bold text-decoration-underline cursor-pointer" id="reportUs">
                Báo cáo với chúng tôi
            </p>
        </div>
        <button type="button" data-bs-dismiss="offcanvas" aria-label="Close"
            class="btn btn-warning text-black   fw-bold d-flex align-items-center justify-content-center w-100 rounded-pill py-2">
            <span>Cập nhật</span>
        </button>
    </div>
</div>
<!-- Thay điểm trả chiều đi -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="changeLeft" aria-labelledby="changeLeftLabel"
    style="width: 560px;">
    <div class="d-flex flex-row align-items-center bg-primary" style="min-height: 72px; padding: 16px;">
        <div class="pointer text-white" style="width: 24px; height: 24px;" data-bs-dismiss="offcanvas"
            aria-label="Close">
           <i class="fa-solid fa-angle-left p-1"></i>
        </div>
        <div class="d-flex ms-3" style="flex: 1 1 0%;">
            <p class="  mb-0 text-white fw-bold" style="line-height: 24px; letter-spacing: 0px;">
                Thay đổi điểm trả chiều đi
            </p>
        </div>
    </div>
    <!-- end headrer -->
    <!-- header 2 -->
    <div class="position-sticky d-flex flex-column w-100"
        style="background-color: rgb(247, 247, 247) !important; padding: 12px 20px; z-index: 5;">
        <div class="d-flex flex-row  justify-content-between">
            <p class="fw-normal mb-0" style="font-size: 12px; line-height: 16px; ">Sắp xếp theo</p>
            <p class="fw-normal mb-0" style="font-size: 12px; line-height: 16px;">Khoảng cách từ điểm đón đến
            </p>
        </div>

        <div class="d-flex flex-row justify-content-between mt-1">
            <button type="button" class="d-flex align-items-center p-0 border-0 m-0" id="sortedBy"
                style="background-color: unset;">
                <p class="fw-bold mb-0" style="font-size: 12px; line-height: 16px;">
                    Sớm nhất
                </p>
                <i class="material-icons-outlined"
                    style="font-size: 16px; line-height: 16px; margin-left: 4px;">arrow_drop_down</i>
            </button>

            <button type="button" class="d-flex flex-row p-0 border-0 m-0" id="changeLocation"
                style="background-color: unset;">
                <p class="fw-bold mb-0" style="font-size: 12px; line-height: 16px;">
                    Vị trí của bạn
                </p>
                <p class="fw-bold mb-0"
                    style="font-size: 12px; line-height: 16px; margin-left: 4px; text-decoration: underline; color: rgb(36, 116, 229) !important;">
                    Thay đổi
                </p>
            </button>
        </div>
    </div>
    {{-- @php
        dd($transfer_points);
    @endphp --}}
    <!--content -->
    <div class="d-flex flex-column bg-white" style="overflow-x: hidden !important;">
        <div class="d-flex flex-column" style="min-width: 232px;">
            @foreach ($transfer_points as $key=>$point)
            <label class="d-flex align-items-start mb-0" data-id="{{$key}}"
                style="padding: 16px 0 0 20px; background-color: rgb(227, 237, 252);">
                <input class="form-check-input" type="radio" name="rdDropPoint" id="rdDropPoint-{{$key}}"
                    value="{{$point['id']}}" {{$key == 0 ? "checked" : ""}}/>
                <div style="flex: 1 1 0%; padding: 0px; margin-left: 12px;">
                    <div class="d-flex flex-column "
                        style="padding: 0px 20px 16px 32px; border-bottom: 0.5px solid rgb(224, 224, 224); margin-left: -32px;">
                        <div class="d-flex flex-row" style="flex: 1 1 0%;">
                            <div class="d-flex flex-column justify-content-center position-relative w-75">
                                <div class="d-flex flex-row align-items-start align-items-center">
                                    <p class="fw-bold ms-1 mb-1">
                                        {{formatDateTime($point['real_time'], "H:i")}} Trung Chuyển
                                    </p>
                                </div>
                                <div class="d-flex flex-column align-items-start">
                                    <p class="fw-medium mb-1" style="line-height: 20px; letter-spacing: 0px;">
                                        {{$point['name']}}
                                    </p>
                                </div>
                                <div class="d-flex flex-column align-items-start ">
                                    <p class="fw-normal mb-1 text-secondary"
                                        style="line-height: 16px; font-size: 12px;">
                                        {{$point['areaDetail']['address'] ?? ""}}, {{$point['areaDetail']['city_name'] ?? ""}}, {{$point['areaDetail']['state_name'] ?? ""}}
                                    </p>
                                </div>
                                {{-- <div class="d-flex flex-column align-items-start text-danger">
                                    <p class="fw-normal mb-1" style="line-height: 16px; font-size: 12px;">
                                        220.000đ / nhóm từ 1-3 khách (trả tại website Vexere)
                                    </p>
                                </div> --}}
                            </div>
                            <div class="d-flex flex-column justify-content-center position-relative w-25">
                                <div class="d-flex flex-column align-items-start">
                                    <p class="position-absolute text-center fw-bold mb-0 top-0 end-0"
                                        style="width: calc(100% + 42px); line-height: 20px;">
                                        636.9 km
                                    </p>
                                </div>
                                <button type="button" id="viewLocation"
                                    class="d-flex justify-content-end p-0 border-0 m-0 bg-transparent">
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <div class="d-flex" style="width: 24px; height: 24px;">
                                            <i class="material-icons-round text-primary">place</i>
                                        </div>
                                        <p class="fw-normal text-primary mb-0"
                                            style="line-height: 20px; letter-spacing: 0px;text-decoration: underline;">
                                            Xem vị trí
                                        </p>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </label>
            @endforeach
            @foreach ($drop_points as $key => $point)
            <label class="d-flex align-items-start mb-0" data-id="{{$key}}"
                style="padding: 16px 0 0 20px; background-color: rgb(227, 237, 252);">
                <input class="form-check-input" type="radio" name="rdDropPoint" id="rdDropPoint-{{$key}}"
                    value="{{$point['id']}}" {{$key == 0 ? "checked" : ""}}/>
                <div style="flex: 1 1 0%; padding: 0px; margin-left: 12px;">
                    <div class="d-flex flex-column "
                        style="padding: 0px 20px 16px 32px; border-bottom: 0.5px solid rgb(224, 224, 224); margin-left: -32px;">
                        <div class="d-flex flex-row" style="flex: 1 1 0%;">
                            <div class="d-flex flex-column justify-content-center position-relative w-75">
                                <div class="d-flex flex-row align-items-start align-items-center">
                                    <p class="fw-bold ms-1 mb-1">
                                        {{formatDateTime($point['real_time'], "H:i")}}
                                    </p>
                                </div>
                                <div class="d-flex flex-column align-items-start">
                                    <p class="fw-medium mb-1" style="line-height: 20px; letter-spacing: 0px;">
                                        {{$point['name']}}
                                    </p>
                                </div>
                                <div class="d-flex flex-column align-items-start ">
                                    <p class="fw-normal mb-1 text-secondary"
                                        style="line-height: 16px; font-size: 12px;">
                                        {{$point['areaDetail']['address']}}, {{$point['areaDetail']['city_name']}}, {{$point['areaDetail']['state_name'] ?? ""}}
                                    </p>
                                </div>
                                {{-- <div class="d-flex flex-column align-items-start text-danger">
                                    <p class="fw-normal mb-1" style="line-height: 16px; font-size: 12px;">
                                        220.000đ / nhóm từ 1-3 khách (trả tại website Vexere)
                                    </p>
                                </div> --}}
                            </div>
                            <div class="d-flex flex-column justify-content-center position-relative w-25">
                                <div class="d-flex flex-column align-items-start">
                                    <p class="position-absolute text-center fw-bold mb-0 top-0 end-0"
                                        style="width: calc(100% + 42px); line-height: 20px;">
                                        636.9 km
                                    </p>
                                </div>
                                <button type="button" id="viewLocation"
                                    class="d-flex justify-content-end p-0 border-0 m-0 bg-transparent">
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <div class="d-flex" style="width: 24px; height: 24px;">
                                            <i class="material-icons-round text-primary">place</i>
                                        </div>
                                        <p class="fw-normal text-primary mb-0"
                                            style="line-height: 20px; letter-spacing: 0px;text-decoration: underline;">
                                            Xem vị trí
                                        </p>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </label>
            @endforeach
        </div>
    </div>
    <!--end content -->
    <!--footer -->
    <div class="border-top border-secondary bg-white position-absolute start-0 bottom-0 w-100 p-3">
        <div class="d-flex justify-content-between align-items-center mb-2">
            <div>Sai hoặc thiếu thông tin?</div>
            <p class="text-primary fw-bold text-decoration-underline cursor-pointer" id="reportUs">
                Báo cáo với chúng tôi
            </p>
        </div>
        <button type="button" data-bs-dismiss="offcanvas" aria-label="Close"
            class="btn btn-warning text-black   fw-bold d-flex align-items-center justify-content-center w-100 rounded-pill py-2">
            <span>Cập nhật</span>
        </button>
    </div>
</div>
<!-- Sắp xếp theo -->
<div class="offcanvas offcanvas-bottom" tabindex="-1" id="sortedByShow" aria-labelledby="offcanvasBottomLabel"
    style="border-radius: 16px 16px 0 0;height: auto; width: 560px; right: 0; left: auto;">
    <div class="offcanvas-header d-flex w-100 justify-content-center">
        <h5 class="offcanvas-title mb-0" id="offcanvasBottomLabel">Sắp xếp theo</h5>
    </div>
    <!-- end header-->
    <!-- content-->
    <div class="offcanvas-body">
        <div class="p-0" style="min-width: 232px;">
            <div class="btn-group-vertical w-100" role="group" aria-label="Vertical radio toggle button group">
                <input type="radio" class="btn-check" name="radio-options" id="radio1" value="time#asc" checked
                    data-bs-dismiss="offcanvas" aria-label="Close">
                <label class="btn btn-outline-dark" for="radio1">Sớm nhất</label>

                <input type="radio" class="btn-check" name="radio-options" id="radio2" value="time#desc"
                    data-bs-dismiss="offcanvas" aria-label="Close">
                <label class="btn btn-outline-dark" for="radio2">Muộn nhất</label>

                <input type="radio" class="btn-check" name="radio-options" id="radio3" value="distance#asc"
                    data-bs-dismiss="offcanvas" aria-label="Close">
                <label class="btn btn-outline-dark" for="radio3">Gần nhất</label>
            </div>

        </div>
    </div>
    <!--Close button -->
    <div class="d-flex gap-3 p-3 border-top border-secondary bottom-0 bg-white" style="border-color: #e0e0e0">
        <button type="button" data-bs-dismiss="offcanvas" aria-label="Close"
            class="btn   fw-bold d-flex align-items-center justify-content-center w-100 gap-1 pb-2"
            style="height: 48px; line-height: 24px; padding: 12px 0; border-radius: 8px; color: white; background: rgb(13, 46, 89); border-color: rgb(13, 46, 89);">
            <span>Đóng</span>
        </button>
    </div>
</div>
<!-- Thay đổi Vị trí của bạn -->
<div class="offcanvas offcanvas-bottom" tabindex="-1" id="changeLocationShow" aria-labelledby="offcanvasBottomLabel"
    style="border-radius: 16px 16px 0 0;height: 560px; width: 560px; right: 0; left: auto;">
    <div class="offcanvas-header d-flex w-100 justify-content-center">
        <h5 class="offcanvas-title mb-0" id="offcanvasBottomLabel">Thay đổi vị trí</h5>
    </div>
    <!-- end header-->
    <!--end headrer -->
    <div class="p-3 bg-white border-bottom w-100" style="border-bottom-color: rgb(224, 224, 224);">
        <div class="input-group position-relative">
            <input class="form-control border rounded-pill ps-5 search-input" type="search"
                placeholder="222 Điện Biên Phủ, Quận 3...">
            <span class="position-absolute top-50 translate-middle-y ms-3 search-icon">
                <i class="fa fa-search"></i>
            </span>
        </div>
        <div class="justify-content-sm-start mt-1">
            <button type="button" class="text-primary" style="border: none; background: none; ">
                <img data-src="https://229a2c9fe669f7b.cmccloud.com.vn/svgIcon/current-location.svg"
                    src="https://229a2c9fe669f7b.cmccloud.com.vn/svgIcon/current-location.svg"
                    alt="current-location-icon" width="16" height="16" style="margin-right: 5px;">
                <span class="ms-1 text-primary">Dùng vị trí hiện tại của bạn</span>
            </button>
        </div>
    </div>
    <!--end search box -->
    <div class="d-flex flex-column h-100 overflow-auto" style="z-index: 2000; scrollbar-width: none;">
        <div class="d-flex align-items-center bg-white p-2 ps-4 pointer">
            <div class="d-flex" style="width: 24px; height: 24px; color: rgb(133, 133, 133) !important;">
                <i class="material-icons-outlined ">place</i>
            </div>
            <div class="d-flex flex-column flex-grow-1 flex-shrink-1 flex-basis-0 ps-0 pe-3 ms-3"
                style="border-bottom: 0.5px solid rgb(224, 224, 224);">
                <p class="  mb-0" style="font-weight: 400; letter-spacing: 0;">
                    222 Đường Điện Biên Phủ, Phường 17, Quận Bình Thạnh, Hồ Chí Minh, Việt Nam
                </p>
                <p class="mt-1 text-secondary" style="font-size: 12px; ">
                    222 Đường Điện Biên Phủ, Phường 17, Quận Bình Thạnh, Hồ Chí Minh, Việt Nam
                </p>
            </div>
        </div>
        <!--end row -->
        <div class="d-flex align-items-center bg-white p-2 ps-4 pointer">
            <div class="d-flex" style="width: 24px; height: 24px; color: rgb(133, 133, 133) !important;">
                <i class="material-icons-outlined ">place</i>
            </div>
            <div class="d-flex flex-column flex-grow-1 flex-shrink-1 flex-basis-0 ps-0 pe-3 ms-3"
                style="border-bottom: 0.5px solid rgb(224, 224, 224);">
                <p class="  mb-0" style="font-weight: 400; letter-spacing: 0;">
                    222 Đường Điện Biên Phủ, Phường 17, Quận Bình Thạnh, Hồ Chí Minh, Việt Nam
                </p>
                <p class="mt-1 text-secondary" style="font-size: 12px; ">
                    222 Đường Điện Biên Phủ, Phường 17, Quận Bình Thạnh, Hồ Chí Minh, Việt Nam
                </p>
            </div>
        </div>
        <!--end row -->
        <div class="d-flex align-items-center bg-white p-2 ps-4 pointer">
            <div class="d-flex" style="width: 24px; height: 24px; color: rgb(133, 133, 133) !important;">
                <i class="material-icons-outlined ">place</i>
            </div>
            <div class="d-flex flex-column flex-grow-1 flex-shrink-1 flex-basis-0 ps-0 pe-3 ms-3"
                style="border-bottom: 0.5px solid rgb(224, 224, 224);">
                <p class="  mb-0" style="font-weight: 400; letter-spacing: 0;">
                    222 Đường Điện Biên Phủ, Phường 17, Quận Bình Thạnh, Hồ Chí Minh, Việt Nam
                </p>
                <p class="mt-1 text-secondary" style="font-size: 12px; ">
                    222 Đường Điện Biên Phủ, Phường 17, Quận Bình Thạnh, Hồ Chí Minh, Việt Nam
                </p>
            </div>
        </div>
        <!--end row -->
        <!-- Không có địa điểm cần tìm -->
        <div class="text-center py-4 p-3">
            <div class="d-flex flex-column align-items-center">
                <img src="https://229a2c9fe669f7b.cmccloud.com.vn/svgIcon/no-result-icon.svg" height="104"
                    class="mb-3">
                <p class="fs-4 fw-bold text-dark mb-2">Không có địa điểm cần tìm</p>
                <p class="  text-muted mb-2">
                    Bạn lưu ý nhập địa chỉ cụ thể khi tìm kiếm
                </p>
                <p class="  text-muted">
                    Hãy thử nhập một địa chỉ đầy đủ Ví dụ: 222 Điện Biên Phủ, Phường 7, Quận 3, Hồ Chí Minh
                </p>
            </div>
        </div>
    </div>
    <!--end content -->
    <!--Close button -->
    <div class="d-flex gap-3 p-3 border-top border-secondary bottom-0 bg-white" style="border-color: #e0e0e0">
        <button type="button" data-bs-dismiss="offcanvas" aria-label="Close"
            class="btn   fw-bold d-flex align-items-center justify-content-center w-100 gap-1 pb-2"
            style="height: 48px; line-height: 24px; padding: 12px 0; border-radius: 8px; color: white; background: rgb(13, 46, 89); border-color: rgb(13, 46, 89);">
            <span>Đóng</span>
        </button>
    </div>
</div>
<!-- Xem Vị trí của bạn -->
<div class="modal fade" id="viewLocationShow" tabindex="-1" aria-labelledby="viewLocationShowLabel">
    <div class="modal-dialog custom-modal-width">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header border-0">
                <h5 class="modal-title text-center fw-bold w-100" id="viewLocationShowLabel">
                    Sân Bay Nội Bài (Sảnh E Ga Nội Địa T1)
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <h3>Map data</h3>
                <img src="https://sackim.com/wp-content/uploads/2018/07/voi-nhung-cong-cu-rat-huu-ich-ban-da-co-the-in-truc-tiep-ngay-tren-google-map.jpg"
                    alt="">
            </div>
        </div>
    </div>
</div>
<!-- Báo cáo với chúng tôi -->
<div class="offcanvas offcanvas-bottom" tabindex="-1" id="reportUsShow" aria-labelledby="offcanvasBottomLabel"
    style="border-radius: 16px 16px 0 0;height: 560px; width: 560px; right: 0; left: auto;">
    <div class="offcanvas-header d-flex w-100 justify-content-center">
        <h5 class="offcanvas-title mb-0" id="offcanvasBottomLabel">Báo cáo với chúng tôi </h5>
    </div>
    <!-- end header-->
    <div class="d-flex flex-column h-100 overflow-auto" style="z-index: 2000; scrollbar-width: none;">
        <div class="p-3">
            <div>
                <div class="mb-3">Chọn loại vấn đề bạn đang gặp phải</div>
                <div class="mb-3">
                    <div class="custom-checkbox-container">
                        <label class="custom-checkbox me-3">
                            <input type="checkbox" autocomplete="off">
                            <span class="checkmark"></span>
                            Thiếu thông tin
                        </label>
                        <label class="custom-checkbox">
                            <input type="checkbox" autocomplete="off">
                            <span class="checkmark"></span>
                            Thông tin sai
                        </label>
                    </div>

                </div>
                <div class="text-danger mt-2"></div>
            </div>
            <div class="mb-3">
                <textarea class="form-control" id="note" placeholder="Vui lòng mô tả chi tiết" style="height: 94px;"
                    spellcheck="false"></textarea>
                <div class="text-danger mt-2"></div>
            </div>
            <div class="alert alert-info d-flex align-items-center p-3 mt-3 mb-3" role="alert">
                <div class="me-2">
                    <i class="material-icons-round text-primary">info</i>
                </div>
                <p class="mb-0 text-dark">
                    Địa điểm đón/trả đề xuất nên là địa điểm dễ nhận biết như: Ngã 4, Vòng xoay, Siêu thị,… Bạn vui
                    lòng không nhập địa chỉ nhà riêng.
                </p>
            </div>

            <div class="mt-2">
                <input class="form-control" id="phone" placeholder="Số điện thoại để liên hệ với bạn"
                    style="height: 52px;"></input>
                <div class="text-danger mt-2"></div>
            </div>
        </div>
    </div>
    <!--end content -->
    <!--Button -->
    <div class="d-flex gap-3 p-3 border-top border-secondary bottom-0 bg-white" style="border-color: #e0e0e0">
        <button type="button" data-bs-dismiss="offcanvas" aria-label="Close"
            class="btn text-dark fw-bold d-flex align-items-center justify-content-center w-100 gap-1 pb-2"
            style="height: 48px; line-height: 24px; padding: 12px 0; border-radius: 8px; background: white; border-color: rgb(13, 46, 89);">
            <span>Đóng</span>
        </button>
        <button type="button" data-bs-dismiss="offcanvas" aria-label="Close"
            class="btn   fw-bold d-flex align-items-center justify-content-center w-100 gap-1 pb-2"
            style="height: 48px; line-height: 24px; padding: 12px 0; border-radius: 8px; color: white; background: rgb(13, 46, 89); border-color: rgb(13, 46, 89);">
            <span>Gửi</span>
        </button>
    </div>
</div>
<!-- Chi tiết bảo hiểm -->
<div class="modal" id="utilityDetailslModal" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-dialog custom-modal-width modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header" style="border-bottom: none !important;">
                    <h5 class="modal-title">Chi tiết bảo hiểm</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <!-- Tabs -->
                <ul class="nav nav-fill nav-tabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active text-secondary pointer text-nowrap" id="fill-tab-0"
                            data-bs-toggle="tab" href="#fill-tabpanel-0" role="tab" aria-controls="fill-tabpanel-0"
                            aria-selected="true">
                            Quyền lợi
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link text-secondary pointer text-nowrap" id="fill-tab-1" data-bs-toggle="tab"
                            href="#fill-tabpanel-1" role="tab" aria-controls="fill-tabpanel-1"
                            aria-selected="false">
                            Điệu kiện bảo hiểm
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link text-secondary pointer text-nowrap" id="fill-tab-2" data-bs-toggle="tab"
                            href="#fill-tabpanel-2" role="tab" aria-controls="fill-tabpanel-2"
                            aria-selected="false">
                            Quy trình bồi thường
                        </a>
                    </li>
                </ul>
                <!-- Tab Content -->
                <div class="tab-content">
                    <!--Tab 1 -->
                    <div class="tab-pane active" id="fill-tabpanel-0" role="tabpanel" aria-labelledby="fill-tab-0">
                        <div class="d-flex flex-column pb-0 ps-2 pe-2">
                            <div class="alert alert-warning d-flex align-items-center p-2 ms-1"
                                style="font-size: 0.875rem;">
                                <img class="p-2"
                                    src="https://229a2c9fe669f7b.cmccloud.com.vn/svgIcon/yellow_warning.svg"
                                    alt="warning">
                                <div>
                                    Phí bảo hiểm chuyến đi chỉ được hoàn trả nếu huỷ vé trước 48 tiếng so với giờ
                                    khởi
                                    hành.
                                </div>
                            </div>
                            <p class="fw-bold fs-5 mb-0 text-black pb-2">
                                Bảo hiểm tai nạn
                            </p>
                            <!--tabel -->
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td class="border">
                                                Tử vong / Thương tật toàn bộ vĩnh viễn do tai nạn
                                            </td>
                                            <td class="fw-medium text-end border">400,000,000đ</td>
                                        </tr>
                                        <tr>
                                            <td class="border">Thương tật bộ phận vĩnh viễn</td>
                                            <td class="fw-medium text-end border">
                                                <span>Trả theo</span>
                                                <a href="" class="text-primary cursor-pointer">
                                                    bảng tỉ lệ thương tật
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border">Hỗ trợ chi phí điều trị y tế do tai nạn</td>
                                            <td class="fw-medium text-end border">3,000,000đ</td>
                                        </tr>
                                        <tr>
                                            <td class="border">Hỗ trợ viện phí do tai nạn
                                                <small class="d-block text-muted">(tối đa 03 ngày)</small>
                                            </td>
                                            <td class="fw-medium text-end border">500,000đ / ngày</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <p class="fw-bold fs-5 text-black pb-1">
                                Bảo hiểm hủy chuyến
                            </p>
                            <p class="text-black">
                                Khách hàng sẽ được công ty bảo hiểm bồi thường
                                <span class="fw-bolder">100% tiền vé</span>
                                thực tế nếu không thể thực hiện được chuyến đi trong một số trường hợp bất khả
                                kháng.
                            </p>
                        </div>
                    </div>
                    <!--Tab 2 -->
                    <div class="tab-pane" id="fill-tabpanel-1" role="tabpanel" aria-labelledby="fill-tab-1">
                        <div class="d-flex flex-column pb-0 ps-2 pe-2">
                            <p class="fw-bold fs-5 mb-0 text-black">
                                Bảo hiểm tai nạn
                            </p>
                            <p class="text-black">
                                Rủi ro tai nạn xảy ra trong chuyến đi kể từ lúc NĐBH lên xe (điểm
                                khởi hành) đến khi NĐBH
                                xuống xe (điểm đến) dẫn tới NĐBH phải điều trị y tế, nằm viện, Tử vong/ Thương tật
                                vĩnh
                                viễn.
                            </p>
                            <p class="fw-bold fs-5 text-black">
                                Bảo hiểm hủy chuyến
                            </p>
                            <div class="alert alert-warning d-flex align-items-center p-2 ms-1"
                                style="font-size: 0.875rem;">
                                <img class="p-2"
                                    src="https://229a2c9fe669f7b.cmccloud.com.vn/svgIcon/yellow_warning.svg"
                                    alt="warning">
                                <p>
                                    Chính sách hoàn hủy chuyến đi có hiệu lực trong vòng <span class="fw-bolder">48
                                        giờ </span> trước giờ khởi hành theo
                                    lịch trình được bảo hiểm. Không áp dụng cho hủy chuyến do khách hàng đến
                                    muộn/vắng
                                    mặt tại giờ khởi hành theo lịch trình.
                                </p>
                            </div>
                            <p class="text-black">Khách hàng sẽ được công ty bảo hiểm bồi
                                thường 100% tiền vé thực tế đã chi trả khi không thể thực hiện chuyến đi theo lịch
                                trình
                                được bảo hiểm do bất kỳ nguyên nhân nào dưới đây:
                            <ul class="text-black">
                                <li>Nhà xe cung cấp dịch vụ vận tải hành khách thông báo hủy chuyến đi vì các nguyên
                                    nhân bất khả kháng (Các rủi ro thiên tai; Bạo loạn &amp; đình công; Phương tiện
                                    di
                                    chuyển gặp sự cố mà không thể khắc phục) và không có chuyến đi thay thế cho
                                    khách
                                    hàng.</li>
                                <li>Thành viên trong gia đình của khách hàng: là vợ/chồng đã kết hôn hợp pháp, con
                                    cái
                                    (con đẻ hoặc con nuôi hợp pháp), cha mẹ ruột, cha mẹ vợ/chồng của Người được bảo
                                    hiểm bị:<ul>
                                        <li>Tử vong; hoặc</li>
                                        <li>Nhập viện điều trị từ 24 giờ trở lên, cần sự hiện diện của Người được
                                            bảo
                                            hiểm, và việc này không được dự đoán hay biết trước vào ngày mua Vé</li>
                                    </ul>
                                </li>
                                <li>Người được bảo hiểm nhập viện điều trị từ 24 giờ trở lên.</li>
                            </ul>
                            </p>
                        </div>
                    </div>
                    <!--Tab 3 -->
                    <div class="tab-pane" id="fill-tabpanel-2" role="tabpanel" aria-labelledby="fill-tab-2">
                        <div class="d-flex flex-column pb-0 ps-2 pe-2">
                            <p class="fw-bold fs-5 mb-0 text-black p-1">
                                Thời hạn yêu cầu bồi thường
                            </p>
                            <p class="text-black">
                                NĐBH/ Đại diện hợp pháp của NĐBH phải thông báo sự kiện bảo hiểm bằng văn bản, điện
                                thoại, thư điện tử hoặc thông qua phần mềm yêu cầu bồi thường trực tuyến của
                                Saladin.
                                Thời hạn thông báo <span class="fw-bolder">tối đa 30 ngày</span> kể từ Ngày xảy ra
                                sự
                                kiện bảo hiểm.
                            </p>
                            <p class="fw-bold fs-5 mb-0 text-black p-1">
                                Hướng dẫn tạo yêu cầu bồi thường
                            </p>
                            <p class="text-black">
                                Truy cập Cổng Yêu cầu bồi thường của Saladin qua đường dẫn riêng bằng cách:

                            <ul class="text-black">
                                <li><span class="medium-bold">Cách 1</span>: Vào chi tiết chuyến đi đã chọn &gt;
                                    Tìm
                                    phần tiện ích chuyến đi &gt; Vào chi tiết tiện ích &gt; Bấm chọn nút "Yêu cầu
                                    bồi
                                    thường"</li>
                                <li><span class="medium-bold">Cách 2</span> : Nếu bạn hủy vé vì lý do bất khả
                                    kháng,
                                    bấm vào nút “Yêu cầu bồi thường” khi hủy vé hoặc tìm ở trang Chi tiết chuyến đi
                                    đã
                                    hủy</li>
                                <li><span class="medium-bold">Cách 3</span> : Tìm đường link đính kèm trong email
                                    Thông báo phát hành Hợp đồng bảo hiểm điện tử.</li>
                            </ul>
                            </p>
                            <p class="text-black">
                                Lựa chọn Nguyên nhân Yêu cầu bồi thường phù hợp và tiếp tục làm theo hướng dẫn:

                            <ul class="text-black">
                                <li>Điều trị y tế và/hoặc thương tật vĩnh viễn do tai nạn</li>
                                <li>Tử vong</li>
                                <li>Hủy chuyến đi (Chính sách dành riêng cho khách hàng mua Bảo hiểm chuyến đi)</li>
                            </ul>
                            </p>
                            <div class="alert alert-warning d-flex align-items-center p-2 ms-1"
                                style="font-size: 0.875rem;">
                                <img class="p-2"
                                    src="https://229a2c9fe669f7b.cmccloud.com.vn/svgIcon/yellow_warning.svg"
                                    alt="warning">
                                <div>
                                    Mỗi yêu cầu bồi thường chỉ được tạo cho 1 người được bảo hiểm.
                                </div>
                            </div>
                            <p class="fw-bold fs-5 text-black pb-1">
                                Liên hệ hỗ trợ
                            </p>
                            <div class="d-flex flex-column align-items-start p-3 border border-secondary rounded-3"
                                style="background-color: white; color: black;">
                                <img class="mb-3"
                                    src="https://229a2c9fe669f7b.cmccloud.com.vn/svgIcon/helpcenter_icon.svg"
                                    alt="helpcenter_icon">
                                <div class="d-flex justify-content-between flex-column flex-md-row w-100">
                                    <div class="d-flex align-items-center">
                                        <img class="me-2"
                                            src="https://229a2c9fe669f7b.cmccloud.com.vn/svgIcon/phone_helpcenter.svg"
                                            alt="phone_helpcenter">
                                        <div>
                                            <p class="mb-1 fw-bold">Số điện thoại</p>
                                            <p class="text-primary cursor-pointer">1900 638 454</p>
                                            <p class="mb-1">
                                                Cước phí gọi là <span class="fw-bold">1.500</span> đ
                                            </p>
                                            <p class="text-muted">Hoạt động: 24/7</p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <img class="me-2"
                                            src="https://229a2c9fe669f7b.cmccloud.com.vn/svgIcon/email_helpcenter.svg"
                                            alt="email_helpcenter">
                                        <div>
                                            <p class="mb-1 fw-bold">Địa chỉ email</p>
                                            <p class="text-primary cursor-pointer">cs@saladin.vn</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal Footer -->
                <div class="modal-footer">
                    <div class="d-flex justify-content-between w-100">
                        <p class="text-black mb-0">Cần giải đáp thắc mắc / khiếu nại</p>
                        <a href="#" class="fw-bold mb-0">Trung tâm hỗ trợ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!---------------------------------- End Drawer ---------------------------------->
