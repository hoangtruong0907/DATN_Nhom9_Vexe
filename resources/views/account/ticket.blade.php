@extends('layouts.app')

@section('title', 'Đơn hàng của tôi')

@section('styles')
    <style>
        .nav-tabs .nav-link {
            color: #000;
            border: 1px solid transparent;
            border-radius: 0;
        }

        .nav-tabs .nav-link.active {
            color: #007bff;
            font-weight: 500;
            border-bottom: 2px solid #007bff;
        }

        .nav-tabs .nav-link:hover {
            color: #0056b3;
        }

        .nav-item.flex-fill {
            flex: 1 1 0%;
        }
    </style>
@endsection

@section('content')
    <div class="container my-4">
        <!-- Breadcrumb -->
        <div class="d-flex align-items-center mb-3">
            <a href="/" class="text-primary text-decoration-none">
                <p class="fw-medium mb-0">Trang chủ</p>
            </a>
            <span>
                <img src="https://229a2c9fe669f7b.cmccloud.com.vn/svgIcon/chevron_right_gray_20dp.svg" width="20" height="20" alt="">
            </span>
            <p class="fw-medium mb-0">Đơn hàng của tôi</p>
        </div>
        <!-- Main Content -->
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3">
                <div class="card">
                    <div class="list-group list-group-flush">
                        <a href="{{ route('auth.info') }}" class="list-group-item list-group-item-action">
                            <img src="https://229a2c9fe669f7b.cmccloud.com.vn/images/Auth/account-circle.svg" width="24" height="16" alt="">
                            <span>Thông tin tài khoản</span>
                        </a>
                        <a href="{{ route('auth.membership') }}" class="list-group-item list-group-item-action">
                            <img src="https://229a2c9fe669f7b.cmccloud.com.vn/images/loyalty.svg" width="24" height="16" alt="">
                            <span>Thành viên <b>thường</b></span>
                        </a>
                        <a href="{{ route('auth.ticket') }}" class="list-group-item list-group-item-action">
                            <img src="https://229a2c9fe669f7b.cmccloud.com.vn/images/ticket.svg" width="24" height="16" alt="">
                            <span class="text-primary">Đơn hàng của tôi</span>
                        </a>
                        <a href="{{ route('auth.reward') }}" class="list-group-item list-group-item-action">
                            <img src="https://229a2c9fe669f7b.cmccloud.com.vn/images/promotion.svg" width="24" height="16" alt="">
                            <span>Ưu đãi</span>
                        </a>
                        <a href="{{ route('auth.card') }}" class="list-group-item list-group-item-action">
                            <img src="https://229a2c9fe669f7b.cmccloud.com.vn/images/credit-card.svg" width="24" height="16" alt="">
                            <span>Quản lý thẻ</span>
                        </a>
                        <a href="{{ route('auth.review') }}" class="list-group-item list-group-item-action">
                            <img src="https://229a2c9fe669f7b.cmccloud.com.vn/images/review.svg" width="24" height="16" alt="">
                            <span>Nhận xét chuyến đi</span>
                        </a>
                        <a href="{{ route('auth.logout') }}" class="list-group-item list-group-item-action" style="cursor: pointer;">
                            <img src="https://229a2c9fe669f7b.cmccloud.com.vn/images/Auth/logout.svg" width="24" height="16" alt="">
                            <span>Đăng xuất</span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Form Content -->
            <div class="col-md-9">
                <div class="container">
                    <!-- Tab navigation -->
                    <ul class="nav nav-tabs mb-4 rounded" id="myTab" role="tablist">
                        <li class="nav-item flex-fill" role="presentation">
                            <a class="nav-link active text-center" id="current-tab" data-bs-toggle="tab" href="#current" role="tab" aria-controls="current" aria-selected="true">Hiện tại</a>
                        </li>
                        <li class="nav-item flex-fill" role="presentation">
                            <a class="nav-link text-center" id="past-tab" data-bs-toggle="tab" href="#past" role="tab" aria-controls="past" aria-selected="false">Đã đi</a>
                        </li>
                        <li class="nav-item flex-fill text-center" role="presentation">
                            <a class="nav-link" id="canceled-tab" data-bs-toggle="tab" href="#canceled" role="tab" aria-controls="canceled" aria-selected="false">Đã hủy</a>
                        </li>
                    </ul>

                    <!-- Tab content -->
                    <div class="tab-content" id="myTabContent">
                        @if (isset($arrayData) && !empty($arrayData))
                            <div class="tab-pane fade show active" id="current" role="tabpanel" aria-labelledby="current-tab">
                                @foreach ($arrayData as $result)
                                @if ($result['status'] == config('apps.common.status_booking.pending') || $result['status'] == config('apps.common.status_booking.reserve'))
                                    <div class="card shadow-sm w-100 mb-3">
                                        <div class="card-body position-relative p-3">
                                            <div class="position-absolute" style="top: 10px; right: 10px;">
                                                <span class="badge bg-danger text-white">Chưa thanh toán</span>
                                            </div>
                                            <div class="text-muted mb-2" style="font-size: 0.9rem;">
                                                {{ date('D, d/m/Y', strtotime($result['pickup_time'])) }} <!-- Ngày -->
                                            </div>
                                            <div class="text-muted mb-2" style="font-size: 0.9rem;">
                                                Mã đặt chỗ: {{ $result['code'] }}
                                            </div>
                                            <div class="fw-bold text-dark mb-2" style="font-size: 1.5rem;">{{ $result['pickup_date'] }}</div>
                                            <div class="text-muted mb-2" style="font-size: 0.9rem;">{{ $result['trip_name'] }}</div>
                                            <div class="text-danger mb-4" style="font-size: 0.8rem;">Vui lòng thanh toán trước {{$result['expired_time']}}</div>
                                            <hr>
                                            <div class="d-flex flex-column align-items-center text-primary">
                                                <div><i class="fas fa-phone-alt me-1"></i>{{$result['bo_phone_info'] ?? ''}}</div>
                                                <h6 class="mt-1" style="font-size: 0.9rem;">Gọi điện</span>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                            </div>
                            <div class="tab-pane fade" id="past" role="tabpanel" aria-labelledby="past-tab">
                                @foreach ($arrayData as $result)
                                    @if ($result['status'] === config('apps.common.status_booking.paid'))
                                        <div class="card shadow-sm w-100 mb-3">
                                            <div class="card-body position-relative p-3">
                                                <div class="position-absolute" style="top: 10px; right: 10px;">
                                                    <span class="badge bg-success text-white">Đã thanh toán</span>
                                                </div>
                                                <div class="text-muted mb-2" style="font-size: 0.9rem;">
                                                    {{ date('D, d/m/Y', strtotime($result['pickup_time'])) }} <!-- Ngày -->
                                                </div>
                                                <div class="text-muted mb-2" style="font-size: 0.9rem;">
                                                    Mã đặt chỗ: {{ $result['code'] }}
                                                </div>
                                                <div class="fw-bold text-dark mb-2" style="font-size: 1.5rem;">{{ date('H:i', strtotime($result['pickup_time'])) }}</div>
                                                <div class="text-muted mb-2" style="font-size: 0.9rem;">{{ $result['trip_name'] }}</div>
                                                <hr>
                                            
                                                <div class="d-flex flex-column align-items-center text-primary">
                                                    <div><i class="fas fa-phone-alt me-1"></i>{{$result['bo_phone_info'] ?? ''}}</div>
                                                    <h6 class="mt-1" style="font-size: 0.9rem;">Gọi điện</h6>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <div class="tab-pane fade" id="canceled" role="tabpanel" aria-labelledby="canceled-tab">
                                @foreach ($arrayData as $result)
                                    @if ($result['status'] === config('apps.common.status_booking.cancel'))
                                        <div class="card shadow-sm w-100 mb-3">
                                            <div class="card-body position-relative p-3">
                                                <div class="position-absolute" style="top: 10px; right: 10px;">
                                                    <span class="badge bg-danger text-white">Đã hủy</span>
                                                </div>
                                                <div class="text-muted mb-2" style="font-size: 0.9rem;">
                                                    {{ date('D, d/m/Y', strtotime($result['pickup_time'])) }} <!-- Ngày -->
                                                </div>
                                                <div class="text-muted mb-2" style="font-size: 0.9rem;">
                                                    Mã đặt chỗ: {{ $result['code'] }}
                                                </div>                                              
                                                <div class="fw-bold text-dark mb-2" style="font-size: 1.5rem;">{{ date('H:i', strtotime($result['pickup_time'])) }}</div>
                                                <div class="text-muted mb-2" style="font-size: 0.9rem;">{{ $result['trip_name'] }}</div>
                                                <hr>
                                                
                                                <div class="d-flex justify-content-center text-primary">
                                                    <span class="ms-2" style="font-size: 0.9rem;">Liên Hệ</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        @else
                            <div class="text-center mt-4">
                                <p>Không có đơn hàng nào.</p>
                            </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
