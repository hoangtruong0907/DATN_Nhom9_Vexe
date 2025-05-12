@extends('layouts.app')
@section('title', 'Payment Method')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/payment.css') }}">
    <link rel="stylesheet" href="{{ asset('css/trip-info.css') }}">
@endsection

@section('content')
    @php
        $dataSeat = [];
        if (isset(session('info_booking')['data'])) {
            $dataSeat = json_decode(session('info_booking')['data'], true);
        }
        // dd($dataSeat['selectedDropPoint']['real_time'])
    @endphp
    <div class="container mt-5">
        <div class="countdown-timer">
            <div>
                Thời gian thanh toán còn lại: <span id="timer">10:00</span>
            </div>
        </div>
    </div>
    <div class="container mx-auto flex-column flex gap-3">
        <div class="row">
            <!-- Payment Method Section -->
            <div class="col-md-8">
                <div class="payment-methods">
                    <h4 class="mb-4">Phương thức thanh toán</h4>
                    <!-- QR chuyển khoản/ Ví điện tử -->
                    <div class="form-check mb-2">

                        <input class="form-check-input" type="radio" name="paymentMethod" id="paymentMethod1" checked
                            onclick="toggleQRDetails()">
                        <label class="form-check-label" for="paymentMethod1">
                            <img src="https://229a2c9fe669f7b.cmccloud.com.vn/httpImage/transfer_va.svg" alt="Icon"
                                class="payment-icon"> QR chuyển khoản/ Ví
                            điện tử
                        </label>
                        <p class="text-muted">Không cần nhập thông tin. Xác nhận thanh toán tức thì, nhanh chóng và ít sai
                            sót.</p>
                        <div class="qr-details" id="qr-details">
                            <h5>Chuyển khoản bằng mã QR, tự động điền thông tin</h5>
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <div class="d-flex justify-content-between">
                                        <div class="text-center">
                                            <i class="fa-solid fa-phone"></i>
                                            <p>Mở ứng dụng ngân hàng hoặc Ví điện tử</p>
                                        </div>
                                        <div class="text-center">
                                            <i class="fas fa-qrcode"></i>
                                            <p>Dùng tính năng Mã QR quét hình bên</p>
                                        </div>
                                        <div class="text-center">
                                            <i class="fa-solid fa-check-circle"></i>
                                            <p>Hoàn tất thanh toán, chờ Vexere xác nhận</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 text-center">
                                    <p>Quét mã bên dưới</p>
                                    @if (session('order_code') && session('order_price'))
                                        <img class="w-75 h-75" src="{{ $qr_code }}" alt="QR Code">
                                    @endif
                                    <p class="mt-2">VIETQR | NAPAS</p>
                                </div>
                            </div>
                            <div class="mt-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="fw-bold">Không thể thanh toán bằng mã QR?</p>
                                    <p class="show-more-bank" onclick="toggleBankDetails()">Thu gọn</p>

                                </div>
                                <div class="bank-details" id="bank-details" style="display: block">
                                    <p><strong>Ngân hàng:</strong> VIETCOMBANK</p>
                                    <p><strong>Số tài khoản:</strong> 0021000337309
                                        <i class="bi bi-clipboard copy-icon" onclick="copyToClipboard('0021000337309')"
                                            title="Sao chép"></i>
                                    </p>
                                    <p><strong>Chủ tài khoản:</strong> NGUYEN THE TRINH</p>
                                    <p><strong>Tổng tiền:</strong>
                                        {{ number_format(session('order_price'), 0, ',', '.') . ' ₫' }}
                                        <i class="bi bi-clipboard copy-icon"
                                            onclick="copyToClipboard('{{ session('order_price') }}')" title="Sao chép"></i>
                                    </p>
                                    <p><strong>Vui lòng nhập lời nhắn là:</strong> {{ session('order_code') }}</p>
                                    <p class="text-muted">Hệ thống sẽ tự động xác thực giao dịch</p>
                                    <p class="text-muted">Quét mã QR hỗ trợ nhập nhanh thông tin, hạn chế sai sót trong quá
                                        trình chuyển khoản. Nếu bạn vẫn muốn tự nhập, vui lòng chuyển khoản nhanh 24/7 và
                                        nhập chính xác thông tin bên trên.</p>
                                </div>
                            </div>
                            <div class="bank-support">
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="fw-bold mb-1">Hỗ trợ nhiều ví điện tử & 42 ngân hàng</p>
                                    <p class="show-more-bank toggle-support" onclick="toggleSupport()">Xem tất cả</p>

                                </div>
                                <div class="support-info expandable" id="support-info">

                                    <img src="https://229a2c9fe669f7b.cmccloud.com.vn/images/bank_wallet/Wallet-0.png"
                                        alt="MoMo">
                                    <img src="https://229a2c9fe669f7b.cmccloud.com.vn/images/bank_wallet/Wallet-7.png"
                                        alt="viettel">
                                    <img src="https://229a2c9fe669f7b.cmccloud.com.vn/images/bank_wallet/Wallet-6.png"
                                        alt="cake">
                                    <img src="https://229a2c9fe669f7b.cmccloud.com.vn/images/bank_wallet/Bank-1.png"
                                        alt="ACB">
                                    <img src="https://229a2c9fe669f7b.cmccloud.com.vn/images/bank_wallet/Bank-2.png"
                                        alt="Bank 1">
                                    <img src="https://229a2c9fe669f7b.cmccloud.com.vn/images/bank_wallet/Bank-4.png"
                                        alt="Bank 2">
                                    <img src="https://229a2c9fe669f7b.cmccloud.com.vn/images/bank_wallet/Bank-38.png"
                                        alt="Bank 3">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Phần Bảo Hiểm -->
                    @if(isset($baohiem))
                        <hr>
                        <div id="insurance-section" class="insurance-section">
                            <div id="insurance-info" class="insurance-info" style="display: flex;">
                                <span id="insurance-status">Vé có bảo hiểm không áp dụng thanh toán tại nhà xe</span>
                                <a href="#" id="add-insurance" class="add-insurance">Thêm bảo hiểm</a>
                            </div>
                            <div id="insurance-details" class="insurance-details" style="display: none;">
                                <span><i class="bi bi-info-circle"></i> Vé có bảo hiểm không áp dụng thanh toán tại nhà
                                    xe</span>
                                <a href="#" id="remove-insurance" class="remove-insurance">Hủy bảo hiểm</a>
                            </div>
                        </div>
                        <div class="alert alert-warning-custom">
                            <i class="bi bi-exclamation-triangle-fill"></i> Giá khuyến mãi không áp dụng khi thanh toán tại nhà
                            xe hoặc khi lên xe. Bạn hãy chọn phương thức thanh toán khác để được mua vé với giá ưu đãi!
                        </div>

                        <!-- Thanh toán khi lên xe -->
                        <div class="form-check mb-2 d-none">
                            <input class="form-check-input" type="radio" name="paymentMethod" id="paymentMethod2"
                                onclick="showPaymentDetails()">
                            <label class="form-check-label" for="paymentMethod2">
                                <img src="https://229a2c9fe669f7b.cmccloud.com.vn/httpImage/bus_station.svg" alt="Icon"
                                    class="payment-icon"> Thanh toán khi lên xe
                            </label>
                            <p class="text-muted">Bạn có thể thanh toán cho tài xế khi lên xe</p>
                        </div>

                        <!-- Hiển thị chi tiết thanh toán khi chọn "Thanh toán khi lên xe" -->
                        <div id="paymentDetails" class="payment-details">
                            <h5>Hướng dẫn thanh toán</h5>
                            <p>Bạn hãy nói rằng đã đặt chỗ qua Vexere và thanh toán <strong>900.000đ</strong> cho tài xế khi lên
                                xe.</p>
                            <h6>Lưu ý quan trọng</h6>
                            <div class="alert alert-warning">
                                <i class="bi bi-exclamation-triangle-fill"></i> Hãy hủy vé khi không còn nhu cầu di chuyển.
                                Vexere sẽ yêu cầu bạn thanh toán trước cho những lần sau nếu bạn đặt vé nhưng không đi hoặc hủy
                                vé quá nhiều lần.
                            </div>
                        </div>
                        <hr>
                    @endif
                    {{-- Các phương thưc thanh toán khác  --}}

                </div>
            </div>
            <div class="col-md-4">
                <!-- Thông tin chuyến đi -->
                @include('payment._trip_info', [
                    'seatMap' => $dataSeat['seatMap'],
                    'seatTicket' => $dataSeat['seatTicket'],
                    'selectedDropPoint' => $dataSeat['selectedDropPoint'],
                    'selectedPickupPoint' => $dataSeat['selectedPickupPoint'],
                    'isPayment' => true,
                ])
                <!-- Thong tin lien he -->
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="mt-4 mb-4 mb-0 info-search">Thông tin liên hệ</h4>
                        </div>
                        <p><strong>Hành khách: </strong>{{ session('info_booking')['customer_name'] }}</p>
                        <p><strong>Số điện thoại: </strong>{{ session('info_booking')['customer_phone'] }}</p>
                        <p><strong>Email: </strong>{{ session('info_booking')['customer_email'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="fixed-payment-button">
            <div class="d-flex justify-content-center align-items-center flex-wrap payment-info-container">
                <div class="total-money-section">
                    <p class="total-money mb-0" onclick="toggleModal()">Tổng tiền:
                        {{ formatCurrency(session('order_price')) }} <span id="toggle-arrow" class="arrow">^</span></p>
                </div>
                <div class="d-flex justify-content-center align-items-center w-75">
                    <button class="btn mt-2 custom-payment-button text-white bg-secondary me-3"
                        onclick="handleChangeStatusBooking('{{ session('order_code') }}', {{ config('apps.common.status_booking.cancel') }})">
                        <i class="bi bi-shield-check"></i> Hủy thanh toán
                    </button>
                    <button class="btn mt-2 custom-payment-button"
                        onclick="handleChangeStatusBooking('{{ session('order_code') }}', {{ config('apps.common.status_booking.pending') }})">
                        <i class="bi bi-shield-check"></i> Đã thanh toán
                    </button>
                </div>
                <p class="text-center mt-2 mb-0 w-100 order-1 order-md-0">
                    Bằng việc nhấn nút Thanh toán, bạn đồng ý với <a href="#" class="text-primary">Chính sách bảo
                        mật thanh
                        toán</a>
                </p>
                <p class="small-2 mt-2 mb-0 payment-note order-0 order-md-1">
                    Bạn sẽ sớm nhận được biển số xe, số điện thoại tài xế và dễ dàng thay đổi điểm đón trả sau khi đặt.
                </p>
            </div>
        </div>
    </div>

    <!-- Modal Chi Tiết Tổng Tiền -->
    <div id="totalMoneyModal" class="modal-bottom">
        <div class="modal-content-bottom">
            @if (isset($dataSeat))
                <span class="close" onclick="toggleModal()">&times;</span>
                <h4 class="total-amount-1">Tổng tiền</h4>
                <p>Giá vé: {{ formatCurrency(session('order_price')) }}</p>
                @if ($dataSeat['seatInfo']['unchoosable'] != 1)
                    @foreach ($dataSeat['seatTicket']['seatList'] as $key => $value)
                        <p>Mã ghế/giường: {{ $key }} x {{ formatCurrency($value['fareSeat']) }}</p>
                    @endforeach
                @endif
            @endif
            {{-- <p>Khuyến mãi: -50.000đ</p> --}}
            <h4 class="total-amount-1">Tổng tiền: {{ formatCurrency(session('order_price')) }}</h4>
            <button class="btn btn-primary mt-3" onclick="toggleModal()">Đóng</button>
        </div>
    </div>

    @include('payment._trip_info_draw', array_merge($dataSeat, ['isPayment' => true]))

@endsection

@push('page-scripts')
    <script>
        function handleChangeStatusBooking(order_code, status) {
            console.log(order_code, status);
            $.ajax({
                    url: '{{ route('booking.update') }}',
                    type: 'POST',
                    data: {
                        status: status,
                        order_code: order_code
                    },
                })
                .done((data) => {
                    if (data.code == 200) {
                        localStorage.removeItem("countdownEndTime");
                        window.location.href = data.url;
                    } else {
                        console.info(data.message);
                    }
                })
        }

        // tự động check thanh toán 10s/1 lần
        setInterval(() => {
            handleChangeStatusBooking('{{ session('order_code') }}', 1)
        }, 10000);


        $(document).ready(function() {
            const countdownDuration = 10 * 60 * 1000; // 10 phút (tính bằng milliseconds)
            let endTime = localStorage.getItem("countdownEndTime") || (Date.now() + countdownDuration);
            localStorage.setItem("countdownEndTime", endTime);

            function updateCountdown() {
                let timeLeft = endTime - Date.now();
                if (timeLeft <= 0) {
                    $('#timer').text("Đã hết thời gian!");
                    localStorage.removeItem("countdownEndTime");
                    clearInterval(interval);
                    handleChangeStatusBooking('{{ session('order_code') }}', 5) // hết 10p thì update hủy booking
                } else {
                    let minutes = Math.floor(timeLeft / 60000);
                    let seconds = Math.floor((timeLeft % 60000) / 1000);
                    seconds = seconds < 10 ? '0' + seconds : seconds;
                    $('#timer').text(`${minutes}:${seconds}`);
                }
            }

            var interval = setInterval(updateCountdown, 1000);
            updateCountdown();
        });

        document.addEventListener('DOMContentLoaded', () => {
            const toggleButton = document.getElementById('toggleSeatInfo');
            const contentToShow = document.getElementById('contentToShow');
            const toggleIcon = document.getElementById('toggleIcon');
            const contentSection = document.getElementById('contentSectionn');

            if (toggleButton && contentToShow && toggleIcon && contentSection) {
                contentToShow.classList.add('d-none');
                contentSection.classList.add('d-none');

                toggleButton.addEventListener('click', () => {
                    const isHidden = !contentToShow.classList.toggle('d-none');
                    contentSection.classList.toggle('d-none');
                    toggleIcon.src = isHidden ?
                        'https://229a2c9fe669f7b.cmccloud.com.vn/svgIcon/expand_more.svg' :
                        'https://229a2c9fe669f7b.cmccloud.com.vn/svgIcon/expand_less.svg';
                });
            }


            const toggleVisibility = (iconId, contentId) => {
                const $toggleIcon = $(`#${iconId}`);
                const $additionalContent = $(`#${contentId}`);

                if ($toggleIcon.length && $additionalContent.length) {
                    $toggleIcon.on('click', () => {
                        const isHidden = $additionalContent.toggleClass('d-none').hasClass('d-none');
                        $toggleIcon
                            .toggleClass('fa-angle-down', isHidden)
                            .toggleClass('fa-angle-up', !isHidden);
                    });
                }
            };

            toggleVisibility('totalAmount', 'showTotalAmount');
            toggleVisibility('totalAmountModal', 'showTotalAmountModal');

        });

        const addInsuranceButton = document.getElementById('add-insurance');
        const removeInsuranceButton = document.getElementById('remove-insurance');
        const insuranceInfo = document.getElementById('insurance-info');
        const insuranceDetails = document.getElementById('insurance-details');
        const closeButton = document.querySelector('.close-button');

        if (addInsuranceButton && insuranceInfo && insuranceDetails) {
            // Thêm bảo hiểm
            addInsuranceButton.addEventListener('click', function(e) {
                e.preventDefault();
                if (insuranceInfo.style.display !== 'none') {
                    insuranceInfo.style.display = 'none';
                    insuranceDetails.style.display = 'flex';
                }
            });
        }

        if (removeInsuranceButton && insuranceInfo && insuranceDetails) {
            // Hủy bảo hiểm
            removeInsuranceButton.addEventListener('click', function(e) {
                e.preventDefault();
                if (insuranceDetails.style.display !== 'none') {
                    insuranceInfo.style.display = 'flex';
                    insuranceDetails.style.display = 'none';
                }
            });
        }

        if (closeButton) {
            // Sự kiện nút đóng (có thể thêm logic nếu cần)
            closeButton.addEventListener('click', function() {
                console.log("Close button clicked");
            });
        }

        function toggleQRDetails() {
            const qrDetails = document.getElementById('qr-details');
            if (qrDetails.style.display === 'block') {
                hideAllDetails();
            } else {
                hideAllDetails();
                qrDetails.style.display = 'block';
            }
        }

        function toggleBankDetails() {
            const bankDetails = document.getElementById('bank-details');
            const toggleText = document.querySelector('.show-more-bank');

            if (bankDetails.style.display === 'block') {
                bankDetails.style.display = 'none';
                toggleText.textContent = 'Tự nhập thông tin';
            } else {
                bankDetails.style.display = 'block';
                toggleText.textContent = 'Thu gọn';
            }
        }

        function toggleSupport() {
            const supportInfo = document.getElementById('support-info');
            const toggleText = document.querySelector('.toggle-support');

            if (supportInfo.style.display === 'block') {
                supportInfo.style.display = 'none';
                toggleText.textContent = 'Xem tất cả';
            } else {
                supportInfo.style.display = 'block';
                toggleText.textContent = 'Thu gọn';
            }
        }

        function hideBankDetails() {
            document.getElementById('bank-details').style.display = 'none';
        }

        function copyToClipboard(text) {
            navigator.clipboard.writeText(text);
            alert("Đã sao chép: " + text);
        }

        function showCardPayment() {
            hideAllDetails();
            document.getElementById('card-payment-details').style.display = 'block';
        }

        function showWalletDetails(walletId) {
            hideAllDetails();
            document.getElementById(walletId).style.display = 'block';
        }

        function showBankPaymentDetails() {
            hideAllDetails();
            document.getElementById('bankPaymentDetails').style.display = 'block';
        }

        function showStorePaymentDetails() {
            hideAllDetails();
            document.getElementById('storePaymentDetails').style.display = 'block';
        }

        // Hiển thị chi tiết thanh toán khi chọn "Thanh toán khi lên xe"
        function showPaymentDetails() {
            hideAllDetails();
            document.getElementById('paymentDetails').style.display = 'block';
        }

        // Ẩn tất cả các chi tiết thanh toán
        function hideAllDetails() {
            document.querySelectorAll('.expandable').forEach(el => el.style.display = 'none');
            document.getElementById('paymentDetails').style.display = 'none';
            const qrDetails = document.getElementById('qr-details');
            if (qrDetails) qrDetails.style.display = 'none';
        }

        function showContactEditForm() {
            const contactEditForm = document.getElementById('contactEditForm');
            contactEditForm.style.display = 'block';
        }

        function hideContactEditForm() {
            const contactEditForm = document.getElementById('contactEditForm');
            contactEditForm.style.display = 'none';
        }

        window.onclick = function(event) {
            const contactEditForm = document.getElementById('contactEditForm');
            if (event.target == contactEditForm) {
                hideContactEditForm();
            }
        }

        function openContactModal() {
            document.getElementById('contactModal').style.display = 'block';
        }

        function closeContactModal() {
            document.getElementById('contactModal').style.display = 'none';
        }

        function toggleTotalDetails() {
            const totalDetails = document.getElementById('total-details');
            const toggleArrow = document.getElementById('toggle-arrow');
            if (totalDetails.style.display === 'none') {
                totalDetails.style.display = 'block';
                toggleArrow.classList.add('rotate');
            } else {
                totalDetails.style.display = 'none';
                toggleArrow.classList.remove('rotate');
            }
        }

        function toggleModal() {
            const modal = document.getElementById("totalMoneyModal");
            const arrow = document.getElementById("toggle-arrow");

            if (modal.classList.contains("open")) {
                modal.classList.remove("open");
                modal.style.transform = "translateY(100%)";
                arrow.classList.remove('rotate');
            } else {
                modal.classList.add("open");
                modal.style.transform = "translateY(0)";
                arrow.classList.add('rotate');
            }
        }
    </script>
@endpush




           {{-- <!-- Thẻ thanh toán quốc tế -->
                <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" name="paymentMethod" id="paymentMethod3"
                        onclick="showCardPayment()">
                    <label class="form-check-label" for="paymentMethod3">
                        <img src="https://229a2c9fe669f7b.cmccloud.com.vn/httpImage/credit_card.svg" alt="Icon"
                            class="payment-icon"> Thẻ thanh toán quốc
                        tế
                    </label>
                    <p class="text-muted">Thẻ Visa, MasterCard, JCB...</p>
                    <p class="discount-text">Nhập mã VXRHDS50 hoặc VXRHDS100 - Giảm 50K cho đơn từ 250K và 100K cho đơn
                        từ 450K khi thanh toán bằng thẻ tín dụng HDSAISON -</p>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#termsModal">Điều kiện sử dụng</a>
                    <div class="card-payment-section expandable" id="card-payment-details">
                        <div class="alert alert-success d-flex align-items-center">
                            <i class="bi bi-shield-check me-2"></i>
                            Thẻ được lưu bởi đối tác đạt chuẩn quốc tế PCI DSS cấp độ cao nhất về Bảo mật thanh toán.
                            Một khoản phí nhỏ sẽ được khấu trừ để xác minh thông tin thẻ.
                        </div>

                        <div class="row">
                            <div class="col-md-8">
                                <input type="text" class="form-control" placeholder="Số thẻ tín dụng/ghi nợ">
                                <input type="text" class="form-control" placeholder="Tên chủ thẻ">
                                <div class="d-flex">
                                    <input type="text" class="form-control me-2" placeholder="Ngày hết hạn">
                                    <input type="text" class="form-control" placeholder="Mã bảo mật">
                                </div>
                                <button class="btn btn-primary confirm-button w-100">Xác nhận</button>
                            </div>
                            <div class="col-md-4">
                                <div class="card-icon">
                                    <img src="https://via.placeholder.com/100x60" alt="Credit Card Icon">
                                    <div>
                                        <strong>1234 5678 1234 5678</strong><br>
                                        NGUYEN VAN A<br>
                                        10/25
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>

                <!-- Điều Kiện Sử Dụng -->
                <div id="termsModal" class="modal fade" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="termsModalLabel">Chương trình ưu đãi thẻ tín dụng quốc tế
                                    HDSAISON</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Nhập mã VXRHDS50 tại website/ứng dụng Vexere - Nhận ưu đãi 50K cho giao dịch đặt xe
                                    khách có giá trị từ 250K trở lên.</p>
                                <p>Nhập mã VXRHDS100 tại website/ứng dụng Vexere - Nhận ưu đãi 100K cho đơn hàng có giá
                                    trị từ 450K trở lên.</p>
                                <ul>
                                    <li>Thời gian áp dụng: Từ ngày 18/7 đến 31/10/2024.</li>
                                    <li>Điều kiện áp dụng: Áp dụng khi thanh toán đơn hàng xe khách bằng Thẻ tín dụng
                                        quốc tế HDSAISON có đầu BIN 483977 trên website/ứng dụng Vexere.</li>
                                    <li>Số lần sử dụng: Mỗi mã được sử dụng tối đa 6 lần/khách hàng trong suốt thời gian
                                        diễn ra chương trình.</li>
                                    <li>Tuyến đường áp dụng: Tất cả các tuyến đường nhà xe có mở bán online tại
                                        website/ứng dụng Vexere.</li>
                                    <li>Số lượng mã ưu đãi có giới hạn, chương trình sẽ kết thúc khi hết ngân sách
                                        khuyến mãi hoặc hết mã giảm giá mà không thông báo trước.</li>
                                </ul>
                                <p>Chọn hình thức thanh toán bằng Thẻ thanh toán Quốc tế tại website/app Vexere. Nhập
                                    thông tin Số thẻ tín dụng, Tên chủ thẻ, Ngày hết hạn, Mã bảo mật sau đó bấm Xác
                                    nhận. Tiếp tục nhập mã VXRHDS50 hoặc VXRHDS100 tại ô Mã giảm giá để nhận ưu đãi.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đã hiểu</button>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Ví ShopeePay -->
                <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" name="paymentMethod" id="paymentMethod4"
                        onclick="showWalletDetails('shopeePayDetails')">
                    <label class="form-check-label" for="paymentMethod4">
                        <img src="https://229a2c9fe669f7b.cmccloud.com.vn/httpImage/airpay.svg" alt="Icon"
                            class="payment-icon"> Ví ShopeePay
                    </label>
                    <p>Điện thoại của bạn phải được cài đặt ứng dụng ShopeePay</p>
                    <p class="discount-text">Giảm 10K khi nhập mã SPPVEXE09 cho đơn từ 100K </p>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#termsModalShopeePay">Điều kiện sử dụng</a>
                    <div class="wallet-details expandable" id="shopeePayDetails">
                        <h5>Hướng dẫn thanh toán</h5>
                        <ol>
                            <li>Bạn sẽ được chuyển đến ứng dụng ShopeePay</li>
                            <li>Nhập thông tin thẻ thanh toán mới hoặc chọn thanh toán qua ví ShopeePay/thẻ đã liên kết
                                với ví ShopeePay</li>
                            <li>Chọn "Thanh toán" để tiến hành thanh toán vé</li>
                        </ol>
                    </div>
                </div>
                <hr>
                <div id="termsModalShopeePay" class="modal fade" tabindex="-1" aria-labelledby="termsModalShopeePayLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="termsModalShopeePayLabel">Chương trình ưu đãi ShopeePay</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Nhập mã SPPVEXE09 tại ví ShopeePay - Giảm 10K cho đơn hàng xe khách từ 100K trở lên.
                                </p>
                                <ul>
                                    <li>Thời gian khuyến mãi: Từ 1/9 đến hết 30/9/2024.</li>
                                    <li>Số lần sử dụng: 1 user/2 lần/tháng.</li>
                                    <li>Áp dụng cho các đơn hàng vé xe từ 100K.</li>
                                    <li>Số lượng ưu đãi có giới hạn. Khi mã ưu đãi không còn được hiển thị là đã hết
                                        lượt sử dụng. Chương trình sẽ kết thúc khi hết mã.</li>
                                </ul>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đã hiểu</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Thanh toán VNPAY - QR -->
                <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" name="paymentMethod" id="paymentMethod5"
                        onclick="showWalletDetails('vnpayDetails')">
                    <label class="form-check-label" for="paymentMethod5">
                        <img src="https://229a2c9fe669f7b.cmccloud.com.vn/httpImage/vn_pay.svg" alt="Icon"
                            class="payment-icon"> Thanh toán VNPAY - QR
                    </label>
                    <p>Thiết bị cần cài đặt Ứng dụng ngân hàng (Mobile Banking) hoặc Ví VNPAY</p>
                    <p class="discount-text">Giảm 10K và giảm 30K khi nhập mã VNPAYVXR10 lần lượt cho đơn từ 250K và
                        900K </p>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#termsModalVNPAY">Điều kiện sử dụng</a>
                    <div class="wallet-details expandable" id="vnpayDetails">
                        <h5>Hướng dẫn thanh toán</h5>
                        <ol>
                            <li>Đăng nhập Ứng dụng ngân hàng hoặc Ví VNPAY</li>
                            <li>Quét mã VNPAY-QR để thanh toán</li>
                            <li>Nhập số tiền thanh toán & mã giảm giá (nếu có), xác minh giao dịch để đặt vé</li>
                        </ol>
                    </div>
                </div>
                <hr>
                <div id="termsModalVNPAY" class="modal fade" tabindex="-1" aria-labelledby="termsModalVNPAYLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="termsModalVNPAYLabel">Chương trình ưu đãi VNPAY</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Giảm 10K khi nhập mã VNPAYVXR10 cho đơn từ 250K và 30K khi nhập mã cho đơn từ 900K.
                                </p>
                                <ul>
                                    <li>Thời gian ưu đãi: Từ 13/8 đến hết 30/9/2024.</li>
                                    <li>Áp dụng cho các khách hàng khi đặt vé xe khách tại website/ứng dụng Vexere.</li>
                                    <li>Mỗi khách hàng được khuyến mại 01 lần/tháng.</li>
                                    <li>Không áp dụng tách hóa đơn dưới mọi hình thức hoặc hoàn tiền một phần với các
                                        giao dịch đã hưởng khuyến mại.</li>
                                </ul>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đã hiểu</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Ví Zalopay -->
                <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" name="paymentMethod" id="paymentMethod6"
                        onclick="showWalletDetails('zalopayDetails')">
                    <label class="form-check-label" for="paymentMethod6">
                        <img src="data:image/jpeg;base64,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"
                            alt="Icon" class="payment-icon"> Ví Zalopay
                    </label>
                    <p>Điện thoại của bạn phải được cài đặt ứng dụng Zalopay</p>
                    <p class="discount-text">Giảm 15K và giảm 35K khi nhập mã ZLPVXR lần lượt cho đơn từ 400K và 1.000K
                    </p>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#termsModalZaloPay">Điều kiện sử dụng</a>
                    <div class="wallet-details expandable" id="zalopayDetails">
                        <h5>Hướng dẫn thanh toán</h5>
                        <ol>
                            <li>Bạn sẽ được chuyển đến ứng dụng ZaloPay</li>
                            <li>Nhập thông tin thẻ thanh toán mới hoặc chọn thanh toán qua ví ZaloPay/thẻ đã liên kết
                                với ví ZaloPay</li>
                            <li>Chọn "Thanh toán" để tiến hành thanh toán vé.</li>
                        </ol>
                    </div>
                </div>
                <hr>
                <div id="termsModalZaloPay" class="modal fade" tabindex="-1" aria-labelledby="termsModalZaloPayLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="termsModalZaloPayLabel">Chương trình ưu đãi ZaloPay</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Giảm 15K và giảm 35K khi nhập mã ZLPVXR cho đơn từ 400K và 1.000K.</p>
                                <ul>
                                    <li>Thời gian áp dụng: Từ 2/8 đến hết 30/9/2024.</li>
                                    <li>Áp dụng cho Mỗi khách hàng/Tài khoản ZaloPay (ZaloPay ID).</li>
                                    <li>Không áp dụng hoàn tiền hoặc hủy đối với các giao dịch được hưởng khuyến mãi.
                                    </li>
                                    <li>ZaloPay hỗ trợ giải quyết các khiếu nại trong 3 ngày làm việc kể từ khi kết thúc
                                        chương trình.</li>
                                </ul>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đã hiểu</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Ví MoMo -->
                <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" name="paymentMethod" id="paymentMethod7"
                        onclick="showWalletDetails('momoDetails')">
                    <label class="form-check-label" for="paymentMethod7">
                        <img src="https://229a2c9fe669f7b.cmccloud.com.vn/httpImage/momo.svg" alt="Icon"
                            class="payment-icon"> Ví MoMo
                    </label>
                    <p>Điện thoại của bạn phải được cài đặt ứng dụng MoMo</p>
                    <p class="discount-text">Giảm 10K khi nhập mã VEXEMOMO cho đơn từ 400K </p>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#termsModalMoMo">Điều kiện sử dụng</a>
                    <div class="wallet-details expandable" id="momoDetails">
                        <h5>Hướng dẫn thanh toán</h5>
                        <ol>
                            <li>Bạn sẽ được chuyển đến ứng dụng Momo</li>
                            <li>Nhập thông tin thẻ thanh toán mới hoặc chọn thanh toán qua ví Momo/thẻ đã liên kết với
                                ví Momo</li>
                            <li>Chọn "Thanh toán" để tiến thành thanh toán vé</li>
                        </ol>
                    </div>
                </div>
                <hr>
                <div id="termsModalMoMo" class="modal fade" tabindex="-1" aria-labelledby="termsModalMoMoLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="termsModalMoMoLabel">Chương trình ưu đãi MoMo</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Nhập mã VEXEMOMO tại ứng dụng MoMo - Giảm 10K cho đơn từ 400K.</p>
                                <ul>
                                    <li>Thời gian khuyến mãi: 3/7 đến 30/9/2024.</li>
                                    <li>Chương trình áp dụng cho khách hàng mới của MoMo khi mua vé trên ứng
                                        dụng/website Vexere.</li>
                                    <li>Ưu đãi không áp dụng cộng gộp với các chương trình khuyến mãi khác.</li>
                                    <li>Ưu đãi không được hoàn lại và không có giá trị quy đổi thành tiền mặt.</li>
                                </ul>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đã hiểu</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Thanh toán qua Viettel Money -->
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="paymentMethod" id="paymentMethod9"
                        onclick="showWalletDetails('viettelMoneyDetails')">
                    <label class="form-check-label" for="paymentMethod9">
                        <img src="https://229a2c9fe669f7b.cmccloud.com.vn/httpImage/viettel_pay.svg" alt="Icon"
                            class="payment-icon"> Thanh toán qua
                        Viettel Money
                    </label>
                    <p>Bạn cần có tài khoản Viettel Money hoặc có cài đặt ứng dụng Viettel Money</p>
                    <div class="wallet-details expandable" id="viettelMoneyDetails">
                        <h5>Hướng dẫn thanh toán</h5>
                        <ol>
                            <li>Bạn sẽ được chuyển đến ứng dụng Viettel Money</li>
                            <li>Bạn có thể đăng nhập vào tài khoản Viettel Money hoặc mở ứng dụng Viettel Money để quét
                                mã QR thanh toán</li>
                        </ol>
                    </div>
                </div>
                <hr>

                <!-- Tại cửa hàng tiện lợi hoặc siêu thị -->
                <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" name="paymentMethod" id="paymentMethod10"
                        onclick="showStorePaymentDetails()">
                    <label class="form-check-label" for="paymentMethod10">
                        <img src="https://229a2c9fe669f7b.cmccloud.com.vn/httpImage/local_convenience_store.svg" alt="Icon"
                            class="payment-icon"> Tại cửa hàng tiện lợi
                        hoặc siêu thị
                    </label>
                    <p>Bạn có thể thanh toán tại các cửa hàng tiện lợi, Viettel post hoặc siêu thị</p>
                    <div class="wallet-details expandable" id="storePaymentDetails">
                        <h5>Hướng dẫn thanh toán</h5>
                        <ol>
                            <li>Bạn đến bưu cục Viettel Post bất kỳ hoặc một trong các cửa hàng tiện lợi dưới đây</li>
                        </ol>
                        <div class="store-payment-logos">

                            <img src="https://229a2c9fe669f7b.cmccloud.com.vn/httpImage/httt_cash_pc_new.jpg" alt="..">
                        </div>
                        <p>2. Báo với nhân viên là bạn cần thanh toán vé xe đã đặt ở Vé xe rẻ và làm theo hướng dẫn của
                            họ</p>
                        <p><strong>Lưu ý:</strong> Vé/hợp đồng của bạn chỉ được giữ chỗ đến <strong>11:30
                                06-09-2024</strong>. Vui lòng thanh toán trước thời điểm này, nếu không vé của bạn sẽ bị
                            hủy.</p>
                    </div>
                </div>
                <hr>

                <!-- Thẻ ATM nội địa / Internet Banking -->
                <div class="form-check mb-2">
                    <input class="form-check-input" type="radio" name="paymentMethod" id="paymentMethod11"
                        onclick="showBankPaymentDetails()">
                    <label class="form-check-label" for="paymentMethod11">
                        <img src="https://229a2c9fe669f7b.cmccloud.com.vn/httpImage/atm.svg" alt="Icon"
                            class="payment-icon"> Thẻ ATM nội địa /
                        Internet Banking
                    </label>
                    <p>Tài khoản phải có đăng ký Internet banking</p>
                    <div class="wallet-details expandable" id="bankPaymentDetails">
                        <h5>Hướng dẫn thanh toán</h5>
                        <p>Vui lòng chọn ngân hàng và bấm nút Thanh toán bên dưới. Chúng tôi sẽ chuyển bạn đến cổng
                            thanh toán để hoàn thành giao dịch.</p>
                        <input type="text" class="form-control bank-search" placeholder="Tìm kiếm ngân hàng">
                        <div class="bank-selection">
                            <img src="https://229a2c9fe669f7b.cmccloud.com.vn/images/bank/VCOM.png" alt="Vietcombank">
                            <img src="https://229a2c9fe669f7b.cmccloud.com.vn/images/bank/BIDV.png" alt="BIDV">
                            <img src="https://229a2c9fe669f7b.cmccloud.com.vn/images/bank/VPBANK.png" alt="VPBank">
                            <img src="https://229a2c9fe669f7b.cmccloud.com.vn/images/bank/SACB.png" alt="Sacombank">
                            <img src="https://229a2c9fe669f7b.cmccloud.com.vn/images/bank/CTG.png" alt="VietinBank">
                            <img src="https://229a2c9fe669f7b.cmccloud.com.vn/images/bank/ACB.png" alt="ACB">
                            <img src="https://229a2c9fe669f7b.cmccloud.com.vn/images/bank/MB.png" alt="MB">
                            <img src="https://229a2c9fe669f7b.cmccloud.com.vn/images/bank/TPBANK.png" alt="TPBank">
                            <img src="https://229a2c9fe669f7b.cmccloud.com.vn/images/bank/ARGI.png" alt="AGRIBANK">
                            <img src="https://229a2c9fe669f7b.cmccloud.com.vn/images/bank/SHB.png" alt="SHB">
                            <img src="https://229a2c9fe669f7b.cmccloud.com.vn/images/bank/HDB.png" alt="HDBank">
                            <img src="https://229a2c9fe669f7b.cmccloud.com.vn/images/bank/EXIMBANK.png" alt="EXIMBANK">
                            <img src="https://229a2c9fe669f7b.cmccloud.com.vn/images/bank/NCB.png" alt="NCB">
                            <img src="https://229a2c9fe669f7b.cmccloud.com.vn/images/bank/OJB.png" alt="OCEAN BANK">
                            <img src="https://229a2c9fe669f7b.cmccloud.com.vn/images/bank/NAMABANK.png" alt="NAM A BANK">
                            <img src="https://229a2c9fe669f7b.cmccloud.com.vn/images/bank/OCB.png" alt="OCB">
                            <img src="https://229a2c9fe669f7b.cmccloud.com.vn/images/bank/SHB.png" alt="SHB">
                            <img src="https://229a2c9fe669f7b.cmccloud.com.vn/images/bank/HDB.png" alt="HDBank">
                            <img src="https://229a2c9fe669f7b.cmccloud.com.vn/images/bank/EXIMBANK.png" alt="EXIMBANK">
                            <img src="https://229a2c9fe669f7b.cmccloud.com.vn/images/bank/NCB.png" alt="NCB">
                            <img src="https://229a2c9fe669f7b.cmccloud.com.vn/images/bank/OJB.png" alt="OCEAN BANK">
                            <img src="https://229a2c9fe669f7b.cmccloud.com.vn/images/bank/NAMABANK.png" alt="NAM A BANK">
                            <img src="https://229a2c9fe669f7b.cmccloud.com.vn/images/bank/OCB.png" alt="OCB">
                            <img src="https://229a2c9fe669f7b.cmccloud.com.vn/images/bank/SHB.png" alt="SHB">
                            <img src="https://229a2c9fe669f7b.cmccloud.com.vn/images/bank/HDB.png" alt="HDBank">
                        </div>
                    </div>
                </div> --}}
