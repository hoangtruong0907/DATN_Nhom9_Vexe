<div class="d-flex flex-column m-2">
    <div class="d-flex flex-column policy-content-f">
        <h6>Chính sách huỷ đơn hàng</h6>
        <div class="timeline-policy position-relative">
            @if (count($cancelPolicy['detail']) == 3)
                <div class="text-center time-sa">
                    <div class="fw-bold">
                        {{ formatDateTime($cancelPolicy['trip_date'], 'H:i', (int) $cancelPolicy['detail'][1]['to']) }}
                    </div>
                    <div>{{ formatDateTime($cancelPolicy['trip_date'], 'd/m/Y') }}</div>
                </div>
                <div class="text-center time-ch">
                    <div class="fw-bold">
                        {{ formatDateTime($cancelPolicy['trip_date'], 'H:i', (int) $cancelPolicy['detail'][0]['to']) }}
                    </div>
                    <div>{{ formatDateTime($cancelPolicy['trip_date'], 'd/m/Y') }}</div>
                </div>
            @else
                <div class="text-center time-ch" style="left: calc(50% - 20px);">
                    <div class="fw-bold">
                        {{ formatDateTime($cancelPolicy['trip_date'], 'H:i', (int) $cancelPolicy['detail'][0]['to']) }}
                    </div>
                    <div>{{ formatDateTime($cancelPolicy['trip_date'], 'd/m/Y') }}</div>
                </div>
            @endif
        </div>
        <div class="w-100 d-flex flex-row position-relative">
            <div class="check-point">
                <div class="tag-dot" >Hôm nay</div>
                <div class="dot"></div>
            </div>
            @if (count($cancelPolicy['detail']) == 3)
                <div class="cancellation-policy-period w-100">
                    <div class="cancellation-line w-100" style="background:rgb(0, 96, 196)">
                    </div>
                    <p class="text-center">
                        {{ $cancelPolicy['detail'][0]['fee'] == '100' ? 'Không mất phí' : 'Phí huỷ' . (100 - (int) $cancelPolicy['detail'][0]['fee'] . '%') }}
                    </p>
                </div>
                <div class="cancellation-policy-period w-100">
                    <div class="cancellation-line w-100" style="background: rgb(255, 199, 0);">
                    </div>
                    <p class="text-center">{{ 'Phí huỷ ' . (100 - (int) $cancelPolicy['detail'][1]['fee'] . '%') }}</p>
                </div>
                <div class="cancellation-policy-period w-100">
                    <div class="cancellation-line w-100" style="background: rgb(241, 0, 0)">
                    </div>
                    <p class="text-center">{{ 'Phí huỷ ' . (100 - (int) $cancelPolicy['detail'][2]['fee'] . '%') }}</p>
                </div>
            @else
                <div class="cancellation-policy-period w-100">
                    <div class="cancellation-line w-100" style="background: rgb(255, 199, 0);">
                    </div>
                    <p class="text-center">
                        {{ $cancelPolicy['detail'][0]['fee'] == '100' ? 'Không mất phí' : 'Phí huỷ' . (100 - (int) $cancelPolicy['detail'][0]['fee'] . '%') }}
                    </p>
                </div>
                <div class="cancellation-policy-period w-100">
                    <div class="cancellation-line w-100" style="background: rgb(241, 0, 0)">
                    </div>
                    <p class="text-center">{{ 'Phí huỷ ' . (100 - (int) $cancelPolicy['detail'][1]['fee'] . '%') }}</p>
                </div>
            @endif
            <div class="check-point-end">
                <div class="tag-dot">Khởi hành</div>
                <div class="dot"></div>
            </div>
        </div>
    </div>
    <p><b>Ghi Chú: </b> {{ $cancelPolicy['note'] }}</p>
    <hr />
    <div class="d-flex flex-column policy-content-b">
        <h5 class="mb-2">Chính sách nhà xe</h5>
        <p>Vexere xin trân trọng cảm ơn quý khách đã tin tưởng và đặt vé tại
            đây. Chính sách đặt vé của Vexere như sau:</p>
        <div class="d-flex flex-column ms-2">
            @if (count($operatorPolicy) > 0)
                @foreach ($operatorPolicy as $policy)
                    <div class="policy-content-l">
                        <h6>{{ $policy['name'] }}</h6>
                        <ul>
                            @foreach ($policy['details'] as $detail)
                                <li data-id="{{ $detail['id'] }}">{{ $detail['title'] }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            @else
                <div class="policy-content-l">
                    <h6>Yêu cầu khi lên xe</h6>
                    <ul>
                        <li>Có mặt tại văn phòng/quầy vé/bến xe trước 20 phút để làm thủ tục lên xe
                        </li>
                        <li>Xuất trình SMS/Email đặt vé trước khi lên xe</li>
                        <li>Không mang đồ ăn, thức ăn có mùi lên xe </li>
                        <li>Không hút thuốc, uống rượu, sử dụng chất kích thích trên xe</li>
                        <li>Không mang các vật dễ cháy nổ lên xe</li>
                        <li>Không vứt rác trên xe</li>
                        <li>Không làm ồn, gây mất trật tự trên xe</li>
                    </ul>
                </div>
                <div class="policy-content-l">
                    <h6>Hành lý xách tay</h6>
                    <ul>
                        <li>Tổng trọng lượng hành lý không vượt quá 3 kg</li>
                    </ul>
                </div>
                <div class="policy-content-l">
                    <h6>Trẻ em và phụ nữ có thai</h6>
                    <ul>
                        <li>Trẻ em dưới 3 tuổi hoặc dưới 110 cm được miễn phí vé nếu ngồi cùng
                            ghế/giường với bố mẹ</li>
                        <li>Trẻ em từ 3 tuổi hoặc cao từ 110 cm trở lên mua vé như người lớn</li>
                    </ul>
                </div>
                <div class="policy-content-l">
                    <h6>Động vật cảnh/Thú cưng</h6>
                    <ul>
                        <li>Hãng xe chỉ chấp nhận vận chuyển động vật như là một hành lý ký gửi;
                            không cho phép mang lên xe cùng hành khách</li>
                    </ul>
                </div>
                <div class="policy-content-l">
                    <h6>Xuất hóa đơn GTGT</h6>
                    <ul>
                        <li>Nhà xe từ chối xuất lại hóa đơn nếu hành khách cung cấp sai thông tin
                        </li>
                    </ul>
                </div>
            @endif
        </div>
    </div>
</div>
