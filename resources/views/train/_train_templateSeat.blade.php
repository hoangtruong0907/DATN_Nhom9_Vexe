@if (!empty($seatMap['data']) && isset($seatMap['data']['coach_seat_template']))
    <div class="wrap-steps-train">
        <div class="left-steps-train">
            <div class="seat-groups-train">
                <div class="note-train">Chú thích</div>
                {{-- List type seat train --}}
                <div class="seat-info-train">
                    {!! renderSeat(1, 'unselected') !!}
                    <span class="seat-name">Ghế không bán</span>
                </div>
                <div class="seat-info-train">
                    {!! renderSeat(1, 'selected') !!}
                    <span class="seat-name">Đang chọn</span>
                </div>
                <div class="seat-info-train">
                    {!! renderSeat(1) !!}
                    <span class="seat-name">
                        <div class="seat-name-group">Ghế trống</div>
                        {{-- <div class="seat-original">
                            <strong>{{ formatCurrency($seatTemplateMap[0]['seats'][0]['fare']) }}</strong>
                            <span
                                class="seat-fare-original">{{ formatCurrency($seatTemplateMap[0]['seats'][0]['fares']['original']) }}</span>
                        </div> --}}
                    </span>
                </div>
                <div class="type-seat flex mt-3">
                    <h5>Hành khách: </h5>
                    {{-- Render items in here --}}
                </div>
            </div>
        </div>
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
                                                        $seat = collect($val['seats'])->firstWhere(function ($s) use (
                                                            $row,
                                                            $col,
                                                        ) {
                                                            return $s['row_num'] == $row && $s['col_num'] == $col;
                                                        });
                                                    @endphp
                                                    @if (isset($seat['is_available']) && $seat['is_available'] == false && $seat['seat_code'] !== 'HL')
                                                        <td class="seat">
                                                            <div class="seat-choose-item seat-container seat-unavailable"
                                                                data-disabled="{{ $seat['is_available'] ? 'false' : 'true' }}">
                                                                {!! renderSeat('', 'unselected') !!}
                                                            </div>
                                                        </td>
                                                    @elseif ($seat['is_available'] == false && $seat['seat_code'] == 'HL')
                                                        <td class="train-hl"></td>
                                                    @elseif($seat)
                                                        <td class="seat">
                                                            <div class="seat-choose-item seat-container"
                                                                data-disabled="{{ $seat['is_available'] ? 'false' : 'true' }}"
                                                                data-full-code="{{ $seat['full_code'] }}"
                                                                data-seat-code="{{ $seat['seat_code'] }}"
                                                                data-fare-seat="{{ $seat['train_data']['train_original_fare'] ?? $seat['train_data']['train_fare'] }}">
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
                <div class="type-seat flex mt-3">
                    <h5>Hành khách: </h5>
                    {{-- Render items in here --}}
                </div>
            </div>
        </div>
        {{-- List template seat  --}}
        <div class="right-steps-train scroll-carriage">
            <div class="mt-3">
                <div class="wrap-shipSeat">
                    @foreach ($seatMap['data'] as $i => $carriage)
                        <div class="shipSeat gap-3 mb-3 border border-1 rounded-3 p-2">
                            <div class="d-flex align-self-center fw-bold">Khoang {{ $i + 1 }}</div>
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
                                                        data-fare-seat="{{ $seat['train_data']['train_original_fare'] ?? $seat['train_data']['train_fare'] }}">
                                                        {!! renderSeat(3, $seat['seat_code']) !!}
                                                    </div>
                                                </td>
                                            @else
                                                <td class="seat">
                                                    <div class="seat-choose-item  seat-none" data-disabled="true"
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


<!-- Modal cảnh báo -->
<div class="modal fade" id="modals-warning" tabindex="-1" aria-labelledby="modals-warningLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="modals-warningLabel">Thông báo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="mt-2 mb-2">Bạn đã chọn tối đa hành khách, vui lòng chọn thêm hành khách.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đã hiểu</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        let listSeatChoosed = {};
        $('.seat-container').on('click', function() {
            if ($(this).data('disabled') === 'true') {
                return;
            }

            const seatCode = $(this).data('seat-code');
            const seatFare = parseInt($(this).data('fare-seat'));
            const fullCode = $(this).data('full-code')

            if ($(this).hasClass('seat-selected')) {
                delete listSeatChoosed[seatCode];
                $(this).removeClass('seat-selected');
            } else {
                if (Object.keys(listSeatChoosed).length < $('input[name="user_type"]').length) {
                    
                    // Lấy giá trị của input radio đã được chọn
                    const selectedType = $('input[name="user_type"]:checked').val();
                    let isUpdated = false; // Biến để kiểm tra xem đã cập nhật hay chưa

                    // Duyệt qua từng phần tử trong obj để kiểm tra và cập nhật
                    for (let key in listSeatChoosed) {
                        if (listSeatChoosed[key].type === selectedType) {
                            // Nếu type trùng, cập nhật fareSeat và fullCode
                            listSeatChoosed[key].fareSeat = seatFare; // Giá trị mới cho fareSeat
                            listSeatChoosed[key].fullCode = fullCode; // Giá trị mới cho fullCode
                            isUpdated = true; // Đánh dấu là đã cập nhật
                            break; // Thoát khỏi vòng lặp khi đã tìm thấy và cập nhật
                        }
                    }

                    // Nếu không có type nào trùng, tạo mới phần tử
                    if (!isUpdated) {
                        // Thêm phần tử mới vào obj
                        listSeatChoosed[seatCode] = {
                            fareSeat: seatFare,
                            fullCode: fullCode,
                            type: selectedType
                        };
                    }


                    $(this).addClass('seat-selected');
                    
                    // Tìm ô radio hiện đang được chọn
                    var currentChecked = $('input[name="user_type"]:checked');

                    if (currentChecked.length > 0) {
                        // Tìm tất cả các ô radio trong nhóm
                        var radios = $('input[name="user_type"]');
                        // Lấy chỉ số của ô radio hiện đang được chọn
                        var currentIndex = radios.index(currentChecked);

                        // Tìm ô radio tiếp theo nếu tồn tại
                        var nextIndex = currentIndex + 1;
                        if (nextIndex < radios.length) {
                            radios.eq(nextIndex).prop('checked', true);
                        }
                    } else {
                        // Nếu chưa có ô nào được chọn, đánh dấu ô đầu tiên
                        $('input[name="user_type"]').first().prop('checked', true);
                    }


                } else {
                    $('#modals-warning').modal('show');
                    return;
                }
            }
            updateTotalAndSeats();
        });

        function updateTotalAndSeats() {
            let total = 0;
            const selectedSeats = Object.keys(listSeatChoosed);
            const seatNumbers = selectedSeats.length ? selectedSeats.join(', ') : '';

            // Tính tổng giá tiền
            for (const seat of selectedSeats) {
                total += listSeatChoosed[seat].fareSeat;
            }
            $('.right-total-train').text(formatCurrency(total)); // Cập nhật tổng tiền
            $('.left-seat-train').text(seatNumbers); // Cập nhật ghế đã chọn
        }

        // Hàm định dạng tiền
        function formatCurrency(amount) {
            // Định dạng số với hai chữ số thập phân và dấu phẩy phân cách hàng nghìn
            return amount.toLocaleString('vi-VN', {
                style: 'decimal',
                minimumFractionDigits: 3,
                maximumFractionDigits: 3
            }) + 'đ';
        }

        var totalArrayUsersType = [];
        function handleRenderTypeUser() {

            for (let index = 0; index < userPresent.child; index++) {
                let count = index + 1;
                const dataHtml = 
                    `<div class="item-child">
                        <label for="child-${count}" class="child-type">
                            <h6><b>Trẻ em ${count}</b></h6>
                            <div>Bấm để chọn chỗ</div>
                        </label>
                        <input type="radio" value="child-${count}" name="user_type" id="child-${count}"/>
                    </div>`;

                $('.type-seat').append(dataHtml);
                totalArrayUsersType.push({id: 'child-' + count});
            }

            for (let index = 0; index < userPresent.adult; index++) {
                let count = index + 1;
                const dataHtml = 
                `<div class="item-child">
                    <label for="adult-${count}" class="child-type">
                        <h6><b>Người lớn ${count}</b></h5>
                        <div>Bấm để chọn chỗ</div>
                    </label>
                    <input type="radio" value="adult-${count}" name="user_type" id="adult-${count}"/>
                </div>`;
                
                $('.type-seat').append(dataHtml);
                totalArrayUsersType.push({id: 'adult-' + count});
            }

            $('input[name="user_type"]').first().prop('checked', true);
        }
        handleRenderTypeUser();
    });
</script>
