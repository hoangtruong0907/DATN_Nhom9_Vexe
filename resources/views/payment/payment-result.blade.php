@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/payment-result.css') }}">
@endsection

@section('content')
    <div class="container my-5 custom-container">
        <div class="mb-4">
            <a href="/" class="text-decoration-none">
                <div class="chevron_left">
                    <img src="https://229a2c9fe669f7b.cmccloud.com.vn/svgIcon/chevron_left_gray.svg" alt="">
                    <p>Về Trang chủ</p>
                </div>
            </a>
        </div>
        <div class="row">
            <div class="col-md-8">
                <!-- Đặt chỗ thành công -->
                @if (session('order_status') == config('apps.common.status_booking.cancel'))
                    <div class="card p-0 mb-4 custom-card">
                        <div class="card-body text-center bg-secondary" style="z-index: 10">
                            <div class="mb-3">
                                <i class="fas fa-circle-xmark" style="font-size: 50px"></i>
                            </div>
                            <img class="confetti-background"
                                src="https://229a2c9fe669f7b.cmccloud.com.vn/images/confetti_desktop.png" alt="">
                            <h4 class="font-weight-bold">Vé đã bị hủy</h4>
                            <p class="mb-0 position-relative">Thông tin chuyến đi đã được gửi đến <a
                                    href="https://mail.google.com/" target="_blank"
                                    class="text-white"><strong>{{ $infoBooking['customer_email'] }}</strong></a>, bạn hãy kiểm tra nhé!</p>
                        </div>
                    </div>
                @else
                    <div class="card p-0 mb-4 custom-card">
                        <div class="card-body text-center">
                            <div class="mb-3">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <img class="confetti-background"
                                src="https://229a2c9fe669f7b.cmccloud.com.vn/images/confetti_desktop.png" alt="">
                            <h4 class="font-weight-bold">Đặt chỗ thành công</h4>
                            <p class="mb-0 position-relative">Thông tin chuyến đi đã được gửi đến <a
                                    href="https://mail.google.com/" target="_blank"
                                    class="text-white"><strong>{{ $infoBooking['customer_email'] }}</strong></a>, bạn hãy
                                kiểm
                                tra nhé!</p>
                        </div>
                    </div>
                @endif
                @if (session('order_status') == config('apps.common.status_booking.cancel'))
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="qr-details" id="qr-details">
                                <h5 class="w-full text-center">Chuyển khoản bằng mã QR, tự động điền thông tin</h5>
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
                                            <img class="w-75 h-75" src="{{ session('qr_code') }}" alt="QR Code">
                                        @endif
                                        <p class="mt-2">VIETQR | NAPAS</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Thông tin thanh toán</h5>
                        <div class="d-flex justify-content-between align-items-center mb-2 custom-pay">
                            <span>Trạng thái</span>
                            @if (session('order_status') == config('apps.common.status_booking.paid'))
                                <span class="text-primary fw-bold">Đã thanh toán</span>
                            @else
                                <span class="text-danger fw-bold">Chưa thanh toán</span>
                            @endif
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2 custom-pay">
                            <span>Phương thức thanh toán</span>
                            <span class="text-muted custom-text">Quét mã QR</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center custom-pay">
                            <span>Tổng tiền</span>
                            <span id="toggle-details" class="toggle-details">
                                {{ number_format($infoBooking['price'], 0, ',', '.') . ' ₫' }}
                                <img id="arrow-icon" class="arrow-icon"
                                    src="https://229a2c9fe669f7b.cmccloud.com.vn/svgIcon/expand_more.svg" alt="Toggle Icon">
                            </span>
                        </div>

                        <div id="payment-details" class="payment-details">
                            <hr>
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="mb-1">Giá vé: </p>
                                <span id="toggle-details" class="toggle-details">
                                    {{ number_format($infoBooking['price'], 0, ',', '.') . ' ₫' }}
                                </span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="mb-1">Phụ thu điểm đón: </p>
                                <span id="toggle-details" class="toggle-details">
                                    {{ number_format(0, 0, ',', '.') . ' ₫' }}
                                </span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="mb-1">Phụ thu điểm trả: </p>
                                <span id="toggle-details" class="toggle-details">
                                    {{ number_format(0, 0, ',', '.') . ' ₫' }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">{{ session('order_status') !== config('apps.common.status_booking.cancel') ? "Quản lý đơn hàng" : "Hỗ trợ" }}</h5>
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center custom-help">
                                <button class="btn d-flex align-items-center w-100 text-start p-0 custom-button"
                                    data-bs-toggle="offcanvas" data-bs-target="#supportOffcanvas">
                                    <span class="d-flex align-items-center bcCBBz">
                                        <i class="fas fa-question-circle text-primary me-2"></i>
                                        Trung tâm Hỗ trợ
                                    </span>
                                    <span class="ms-auto">
                                        <i class="fas fa-chevron-right"></i>
                                    </span>
                                </button>
                            </li>

                            <div class="offcanvas offcanvas-end" tabindex="-1" id="supportOffcanvas"
                                aria-labelledby="supportOffcanvasLabel">
                                <div class="offcanvas-header">
                                    <button type="button" class="btn btn-link text-white p-0"
                                        data-bs-dismiss="offcanvas" aria-label="Close">
                                        <i class="fas fa-arrow-left"></i>
                                    </button>
                                    <h5 class="offcanvas-title ms-3" id="supportOffcanvasLabel">Liên hệ</h5>
                                </div>
                                <div class="offcanvas-body">
                                    <div class="contact-info card">
                                        <div class="card-body">
                                            <p class="mb-2"><strong>Liên hệ qua email</strong></p>
                                            <a href="mailto:cs@vexere.com"
                                                class="btn btn-outline-secondary d-inline-flex align-items-center">
                                                <i class="fas fa-envelope me-2"></i> cs@vexere.com
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if (session('order_status') !== config('apps.common.status_booking.cancel'))
                                <li class="list-group-item d-flex justify-content-between align-items-center custom-cancel">
                                    <button class="btn d-flex align-items-center w-100 text-start p-0 custom-cancel-button"
                                        data-bs-toggle="offcanvas" data-bs-target="#cancelOrderOffcanvas">
                                        <span class="d-flex align-items-center bcCBBz">
                                            <i class="fas fa-times-circle text-danger me-2"></i>
                                            Hủy đơn hàng
                                        </span>
                                        <span class="ms-auto">
                                            <i class="fas fa-chevron-right"></i>
                                        </span>
                                    </button>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>

                <div class="offcanvas offcanvas-end" tabindex="-1" id="cancelOrderOffcanvas"
                    aria-labelledby="cancelOrderOffcanvasLabel">
                    <div class="offcanvas-header">
                        <button type="button" class="btn btn-link text-white p-0" data-bs-dismiss="offcanvas"
                            aria-label="Close">
                            <i class="fas fa-arrow-left"></i>
                        </button>
                        <h5 class="offcanvas-title ms-3" id="cancelOrderOffcanvasLabel">Chọn vé cần hủy</h5>
                    </div>
                    <div class="offcanvas-body">
                        <div class="form-check d-flex align-items-start justify-content-between border-bottom py-2 mb-2">
                            <div class="d-flex align-items-start">
                                <input class="form-check-input mt-1 me-2" type="checkbox" id="ticket1" checked>
                                <div>
                                    <label class="form-check-label fw-bold" for="ticket1">
                                        Đà Nẵng → Hà Nội
                                    </label>
                                    <div class="text-muted small text-decoration-none">20:00 • T7, 24/08/2024</div>
                                </div>
                            </div>
                            <div class="text-end custom-text">
                                <span class="text-muted">Phí hủy</span> <span class="text-danger fw-bold">0đ</span>
                            </div>
                        </div>

                        <div class="alert alert-info custom-alert " role="alert">
                            <i class="fa-sharp fa-solid fa-circle-exclamation"></i> Phí hủy được tính trên giá gốc và không
                            vượt quá số tiền bạn đã thanh toán (giá gốc không bao gồm mã giảm giá).
                        </div>
                    </div>

                    <div class="offcanvas-footer p-3">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="refund-label">Số tiền hoàn</span>
                            <span class="refund-amount">0đ</span>
                        </div>
                        <button class="btn btn-primary w-100 mt-2" data-bs-toggle="offcanvas"
                            data-bs-target="#reasonOffcanvas">Tiếp tục</button>
                    </div>
                </div>

                <div class="offcanvas offcanvas-end" tabindex="-1" id="reasonOffcanvas"
                    aria-labelledby="reasonOffcanvasLabel">
                    <div class="offcanvas-header bg-primary text-white">
                        <button type="button" class="btn btn-link text-white p-0" data-bs-dismiss="offcanvas"
                            aria-label="Close">
                            <i class="fas fa-arrow-left"></i>
                        </button>
                        <h5 class="offcanvas-title ms-3" id="reasonOffcanvasLabel">Lí do hủy</h5>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <input class="form-check-input me-2" type="radio" name="reason" id="reason1">
                                <label class="form-check-label" for="reason1">Tôi bận nên không đi nữa</label>
                            </li>
                            <li class="list-group-item">
                                <input class="form-check-input me-2" type="radio" name="reason" id="reason2">
                                <label class="form-check-label" for="reason2">Tôi đặt nhầm giờ/ngày</label>
                            </li>
                            <li class="list-group-item">
                                <input class="form-check-input me-2" type="radio" name="reason" id="reason3">
                                <label class="form-check-label" for="reason3">Tôi đặt nhầm tuyến đường</label>
                            </li>
                            <li class="list-group-item">
                                <input class="form-check-input me-2" type="radio" name="reason" id="reason4">
                                <label class="form-check-label" for="reason4">Hãng xe không có tiện ích cần thiết</label>
                            </li>
                            <li class="list-group-item">
                                <input class="form-check-input me-2" type="radio" name="reason" id="reason5">
                                <label class="form-check-label" for="reason5">Tôi muốn đón dọc đường/trung chuyển nhưng
                                    nhà
                                    xe không đón</label>
                            </li>
                            <li class="list-group-item">
                                <input class="form-check-input me-2" type="radio" name="reason" id="reason6">
                                <label class="form-check-label" for="reason6">Bất khả kháng về sức khỏe</label>
                            </li>
                            <li class="list-group-item">
                                <input class="form-check-input me-2" type="radio" name="reason" id="reason7">
                                <label class="form-check-label" for="reason7">*** Lý do khác (dùng ghi chú hủy vé)
                                    ***</label>
                            </li>
                        </ul>
                    </div>

                    <div class="offcanvas-footer p-3">
                        <button class="btn btn-primary w-100 mt-2" data-bs-toggle="modal"
                            data-bs-target="#confirmCancelModal">Xong</button>
                    </div>
                </div>

                <div class="modal fade" id="confirmCancelModal" tabindex="-1" aria-labelledby="confirmCancelModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content text-center p-4">
                            <div class="modal-icon mb-3">
                                <img src="https://229a2c9fe669f7b.cmccloud.com.vn/svgIcon/popup_icon_question_rounded.svg"
                                    alt="Question Icon" class="img-fluid modal-icon-image">
                            </div>
                            <h5 class="modal-title mb-2" id="confirmCancelModalLabel">Xác nhận hủy vé</h5>
                            <div class="modal-body">
                                Chúng tôi sẽ không giữ chỗ bạn đã chọn nữa.
                            </div>
                            <div class="modal-footer border-0 justify-content-center">
                                <button type="button" class="btn btn-outline-secondary me-2"
                                    data-bs-dismiss="modal">Quay
                                    lại</button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#cancelSuccessModal">Hủy đơn hàng</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="cancelSuccessModal" tabindex="-1" aria-labelledby="cancelSuccessModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content text-center p-4">
                            <!-- Success icon at the top -->
                            <div class="modal-icon mb-3">
                                <img src="https://229a2c9fe669f7b.cmccloud.com.vn/svgIcon/check-circle-shadow.svg"
                                    alt="Success Icon" class="img-fluid success-icon-image">
                            </div>
                            <h5 class="modal-title mb-2" id="cancelSuccessModalLabel">Hủy đơn hàng thành công</h5>
                            <div class="modal-body">
                                Bạn có thể đặt lại vé khác bất kỳ lúc nào.
                            </div>
                            <div class="modal-footer border-0 justify-content-center">
                                <button type="button" class="btn btn-dark full-width-button"
                                    data-bs-dismiss="modal">Đóng</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="img mb-5">
                    <div class="img-body">
                        <a href="#">
                            <img src="//static.vexere.com/production/banners/1085/__banner-mobile_960x-(2).jpg"
                                alt="">
                        </a>
                    </div>
                </div>

                @if (isset($otherMethod))
                    <div class="other-services">
                        <h5 class="font-weight-bold custom-services">Dịch vụ khác dành cho bạn</h5>
                        <a href="#">
                            <div class="service-card red-card">
                                <div class="service-content">
                                    <h6 class="service-title">Thuê xe máy đời mới, giao tận khách sạn</h6>
                                    <p class="service-description">Đà Lạt, Vũng Tàu, Sa Pa, Hà Giang</p>
                                </div>
                                <img src="https://229a2c9fe669f7b.cmccloud.com.vn/images/motobiker-rental.png" alt="Motorbike"
                                    class="service-image">
                            </div>
                        </a>
                        <a href="#">
                            <div class="service-card green-card">
                                <div class="service-content">
                                    <h6 class="service-title">Thuê xe du lịch giá rẻ</h6>
                                    <p class="service-description">Trên toàn quốc, đa dạng loại xe</p>
                                </div>
                                <img src="https://229a2c9fe669f7b.cmccloud.com.vn/images/bus-hide.png" alt="Tourist Car"
                                    class="service-image">
                            </div>
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="float-btn mt-4 mb-5 d-flex justify-content-center custom-btn">
        @guest
            <button data-bs-toggle="modal" data-bs-target="#authModal" class="btn btn-outline-primary my-ticket-btn">Vé của
                tôi</button>
        @endguest
        @auth
            <a href="{{ route('auth.ticket') }}" class="btn btn-outline-primary my-ticket-btn">Vé của tôi</a>
        @endauth
        <a href="/" class="btn btn-warning text-dark book-ticket-btn">Đặt vé khác</a>
    </div>
@endsection

@push('page-scripts')
    <script>
        document.getElementById('toggle-details').addEventListener('click', function() {
            var details = document.getElementById('payment-details');
            var arrowIcon = document.getElementById('arrow-icon');

            if (details.style.display === 'none') {
                details.style.display = 'block';
                arrowIcon.style.transform = 'rotate(180deg)';
            } else {
                details.style.display = 'none';
                arrowIcon.style.transform = 'rotate(0deg)';
            }
        });
    </script>
@endpush
