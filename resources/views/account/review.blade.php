@extends('layouts.app')

@section('title', 'Nhận xét chuyến đi')
@section('content')
    <div class="container mt-4">
        <!-- Breadcrumb -->
        <div class="d-flex align-items-center mb-3">
            <a href="/" class="text-primary text-decoration-none">
                <p class="fw-medium mb-0">Trang chủ</p>
            </a>
            <span>
                <img src="https://229a2c9fe669f7b.cmccloud.com.vn/svgIcon/chevron_right_gray_20dp.svg" width="20"
                    height="20" alt="">
            </span>
            <p class="fw-medium mb-0">Thông tin tài khoản</p>
        </div>
        <!-- Main Content -->
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3">
                <div class="card">
                    <div class="list-group list-group-flush">
                        <a href="{{ route('auth.info') }}" class="list-group-item list-group-item-action">
                            <img src="https://229a2c9fe669f7b.cmccloud.com.vn/images/Auth/account-circle.svg" width="24"
                                height="16" alt="">
                            <span>Thông tin tài khoản</span>
                        </a>
                        <a href="{{ route('auth.membership') }}" class="list-group-item list-group-item-action">
                            <img src="https://229a2c9fe669f7b.cmccloud.com.vn/images/loyalty.svg" width="24"
                                height="16" alt="">
                            <span>Thành viên <b>thường</b></span>
                        </a>
                        <a href="{{ route('auth.ticket') }}" class="list-group-item list-group-item-action">
                            <img src="https://229a2c9fe669f7b.cmccloud.com.vn/images/ticket.svg" width="24"
                                height="16" alt="">
                            <span>Đơn hàng của tôi</span>
                        </a>
                        <a href="{{ route('auth.reward') }}" class="list-group-item list-group-item-action">
                            <img src="https://229a2c9fe669f7b.cmccloud.com.vn/images/promotion.svg" width="24"
                                height="16" alt="">
                            <span>Ưu đãi</span>
                        </a>
                        <a href="{{ route('auth.card') }}" class="list-group-item list-group-item-action">
                            <img src="https://229a2c9fe669f7b.cmccloud.com.vn/images/credit-card.svg" width="24"
                                height="16" alt="">
                            <span>Quản lý thẻ</span>
                        </a>
                        <a href="{{ route('auth.review') }}" class="list-group-item list-group-item-action">
                            <img src="https://229a2c9fe669f7b.cmccloud.com.vn/images/review.svg" width="24"
                                height="16" alt="">
                            <span class="text-primary">Nhận xét chuyến đi</span>
                        </a>
                        <a href="{{ route('auth.logout') }}" class="list-group-item list-group-item-action"
                            style="cursor: pointer;">
                            <img src="https://229a2c9fe669f7b.cmccloud.com.vn/images/Auth/logout.svg" width="24"
                                height="16" alt="">
                            <span>Đăng xuất</span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Form Content -->
            <div class="col-md-9">
                <div class="container mt-3">
                    <div class="text-center mb-4">
                        <h2 class="headline">Tải ngay ứng dụng Vexere để trải nghiệm tính năng này</h2>
                    </div>
                    <div class="text-center mb-4">
                        <img src="https://229a2c9fe669f7b.cmccloud.com.vn/images/vexere-app.png" alt="Vexere App"
                            width="255" height="231">
                    </div>
                    <div class="text-center">
                        <div class="d-flex justify-content-center gap-3">
                            <a class="btn btn-outline-dark" href="https://itunes.apple.com/vn/app/vexere/id1183279479"
                                target="_blank" rel="noreferrer">
                                <img src="https://229a2c9fe669f7b.cmccloud.com.vn/images/download-app-store.png"
                                    alt="App Store" width="152" height="48">
                                <span class="d-none d-sm-inline">App Store</span>
                            </a>
                            <a class="btn btn-outline-dark"
                                href="https://play.google.com/store/apps/details?id=com.vexere.vexere" target="_blank"
                                rel="noreferrer">
                                <img src="https://229a2c9fe669f7b.cmccloud.com.vn/images/download-gg-play.png"
                                    alt="Google Play" width="152" height="48">
                                <span class="d-none d-sm-inline">Google Play</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
