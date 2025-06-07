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
                                    <p><strong>Ngân hàng:</strong> TECHCOMBANK</p>
                                    <p><strong>Số tài khoản:</strong> 8888090703
                                        <i class="bi bi-clipboard copy-icon" onclick="copyToClipboard('8888090703')"
                                            title="Sao chép"></i>
                                    </p>
                                    <p><strong>Chủ tài khoản:</strong> HOANG QUOC TRUONG</p>
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
                    <!-- Thanh toán khi lên xe -->
                        <div class="form-check mb-2">
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
                            <p>Bạn hãy nói rằng đã đặt chỗ qua DolphinBus và thanh toán <strong>{{ number_format($seatTicket['totalFare'], 0, ',', '.') }} đ</strong> cho tài xế khi lên xe.</p>
                            <h6>Lưu ý quan trọng</h6>
                            <div class="alert alert-warning">
                                <i class="bi bi-exclamation-triangle-fill"></i> Hãy hủy vé khi không còn nhu cầu di chuyển.
                                DolphinBus sẽ yêu cầu bạn thanh toán trước cho những lần sau nếu bạn đặt vé nhưng không đi hoặc hủy vé quá nhiều lần.
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
