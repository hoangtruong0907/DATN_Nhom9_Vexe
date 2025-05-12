<!--Right top -->
<div class="d-flex justify-content-between bg-white border border-light-subtle rounded-2 w-100 p-3 card-border-radius mb-2">
    <div class="d-flex flex-column gap-3 w-100">
        <div class="d-flex justify-content-between w-100 pointer">
            <div class="fw-bold fs-5 mb-0 text-black">Tạm tính</div>
            <div class="d-flex align-items-center gap-1">
                <p class="fw-bold fs-5 mb-0">{{ number_format($seatTicket['totalFare'], 0, ',', '.') }} đ</p>
                <i class="fa-solid fa-angle-down p-1" id="totalAmount"></i>
            </div>
        </div>

        <div class="d-flex flex-column gap-2 d-none" id="showTotalAmount">
            <div class="d-flex justify-content-between">
                <div class="label color--darkness">Giá vé</div>
                <div class="text-end">
                    @foreach ($seatTicket['seatList'] as $key => $val)
                    <p class="mb-0 ">{{ formatCurrency($val['fareSeat'])}} x 1</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!--Right bottom -->
<div class="d-flex justify-content-between bg-white border border-light-subtle rounded-2 w-100 p-3 card-border-radius mb-2 mt-2">
    <div class="d-flex flex-column gap-3 w-100">
        <div class="fw-bold fs-5 mb-0 text-black">Thông tin chuyến đi</div>
        <div class="d-flex flex-column gap-3">
            <div
                class="d-flex flex-column align-items-center bg-white border border-light-subtle rounded-2 w-100">
                <div data-bs-toggle="offcanvas" data-bs-target="#tripDetailsRight"
                    aria-controls="tripDetailsRight"
                    class="d-flex w-100 p-2 gap-3 border-bottom align-items-center justify-content-between pointer">
                    <div class="d-flex align-items-center gap-2">
                        <i class="fa-solid fa-bus-simple p-1"></i>
                        <p class="fw-bold mb-0" style="font-size: 12px;">{{formatDateTime($seatMap['departure_time'], 'D, d/m/Y', 0, 0, "vi")}}</p>
                        <div class="d-flex align-items-center">
                            <img data-src="https://229a2c9fe669f7b.cmccloud.com.vn/svgIcon/people_alt_black_24dp.svg"
                                src="https://229a2c9fe669f7b.cmccloud.com.vn/svgIcon/people_alt_black_24dp.svg"
                                alt="people_alt_black_icon" width="16" height="16">
                            <p class="fw-normal mb-0 ms-1 ml-2" style="font-size: 12px;">{{count($seatTicket['seatList'])}}</p>
                        </div>
                    </div>
                    <div>
                        <p class="fw-bold mb-0 text-decoration-underline text-primary"
                            style="font-size: 12px; line-height: 16px; letter-spacing: 0;">
                            Chi tiết
                        </p>
                    </div>
                </div>
                <div class="d-flex flex-column w-100 gap-3" style="padding: 0px 12px 12px;">
                    <div class="d-flex align-items-center w-100 gap-3 {{!isset($isPayment) ? "border-bottom" : "" }} pointer"
                        style="padding: 10px 0px;">
                        <div>
                            <img src="https://static.vexere.com/production/images/1689135259785.jpeg"
                                alt="avatar" style="width: 58px;height: 36px; border-radius: 4px;">
                        </div>
                        <div class="d-grid align-items-center p-0 flex-grow-1 row-gap-1">
                            <p class="mb-0 fw-semibold" style="font-size: 14px;">
                                {{$seatMap['company_name']}}
                            </p>
                            <p class="mb-0" style="font-size: 10px; line-height: 12px;">
                                {{$seatMap['name']}}
                            </p>
                        </div>
                    </div>
                    @if(!isset($isPayment))
                        <div class="d-flex position-relative w-100">
                            <div class="mx-auto d-grid w-100">
                                <div class="d-flex pointer" data-bs-toggle="offcanvas"
                                    data-bs-target="#changeRight" aria-controls="changeRight">
                                    <div class="d-flex flex-column justify-content-between">
                                        <div class="text-nowrap mx-auto text-center">
                                            <p class="fw-bold   mb-0">
                                                {{formatDateTime($selectedPickupPoint['real_time'], "H:i (d/m)")}}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column justify-content-between">
                                        <div class="d-flex flex-column justify-content-between mx-auto"
                                            style="padding: 0px 16px 4px; width: 44px;">
                                            <img data-src="https://229a2c9fe669f7b.cmccloud.com.vn/svgIcon/pickup_vex_blue_24dp.svg"
                                                src="https://229a2c9fe669f7b.cmccloud.com.vn/svgIcon/pickup_vex_blue_24dp.svg"
                                                alt="pickup-icon" width="12" height="12">
                                        </div>
                                        <div class="d-flex" style="min-height: 24px;">
                                            <div class="border-end border-light" style="border-width: 1px;">
                                            </div>
                                            <div class="border-start border-light"
                                                style="border-width: 1px;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex gap-2 mx-auto justify-content-between w-100">
                                        <div class="d-flex flex-column w-100">
                                            <p class="fw-bold mb-1 lh-1" style="font-size: 12px;">
                                                {{$selectedPickupPoint['areaDetail']['state_name']}}
                                            </p>
                                            <p class="text-muted mb-0"
                                                style="font-size: 10px; line-height: 12px;">
                                                {{$selectedPickupPoint['areaDetail']['address']}}, {{$selectedPickupPoint['areaDetail']['city_name']}}
                                            </p>
                                        </div>
                                        <div class="d-flex justify-content-center text-nowrap">
                                            <p class="fw-bold text-primary mb-0"
                                                style="font-size: 12px;line-height: 16px; letter-spacing: 0; text-decoration: underline; text-underline-offset: 2px; word-break: normal;">
                                                Thay đổi</p>
                                        </div>
                                    </div>
                                </div>
                                <!--end row -->
                                <div class="d-flex pointer" data-bs-toggle="offcanvas"
                                    data-bs-target="#changeRight" aria-controls="changeRight">
                                    <div class="d-flex flex-column justify-content-between">
                                        <div class="text-nowrap mx-auto text-center">
                                            <p class="fw-bold   mb-0">
                                                {{formatDateTime($selectedDropPoint['real_time'], "H:i (d/m)")}}

                                            </p>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column justify-content-between">
                                        <div class="d-flex" style="min-height: 24px;">
                                            <div class="border-end border-light" style="border-width: 1px;">
                                            </div>
                                            <div class="border-start border-light"
                                                style="border-width: 1px;">
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column justify-content-between mx-auto"
                                            style="padding: 4px 16px 16px;">
                                            <img data-src="https://229a2c9fe669f7b.cmccloud.com.vn/svgIcon/dropoff_semantic_negative_12dp.svg"
                                                src="https://229a2c9fe669f7b.cmccloud.com.vn/svgIcon/dropoff_semantic_negative_12dp.svg"
                                                alt="dropoff-icon" width="12" height="12">
                                        </div>
                                    </div>
                                    <div class="d-flex gap-2 mx-auto justify-content-between w-100">
                                        <div class="d-flex flex-column w-100">
                                            <p class="fw-bold mb-1 lh-1" style="font-size: 12px;">
                                                {{$selectedDropPoint['areaDetail']['state_name']}}
                                            </p>
                                            <p class="text-muted mb-0"
                                                style="font-size: 10px; line-height: 12px;">
                                                {{$selectedDropPoint['areaDetail']['address']}}, {{$selectedDropPoint['areaDetail']['city_name']}}
                                            </p>
                                        </div>
                                        <div class="d-flex justify-content-center text-nowrap">
                                            <p class="fw-bold text-primary mb-0" data-bs-toggle="offcanvas"
                                                data-bs-target="#changeLeft" aria-controls="changeLeft"
                                                style="font-size: 12px; line-height: 16px; letter-spacing: 0; text-decoration: underline; text-underline-offset: 2px; word-break: normal;">
                                                Thay đổi</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
