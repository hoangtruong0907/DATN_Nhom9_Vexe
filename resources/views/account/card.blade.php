@extends('layouts.app')

@section('title', 'Quản lý thẻ')
@section('styles')
    <!-- Thêm vào phần <head> của tài liệu HTML -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Round">
    <style>
        .modal-lg {
            max-width: 80%;
            /* Làm cho modal rộng hơn */
        }

        .input-group .btn-outline-secondary {
            color: #495057;
            background-color: #fff;
            border-color: #ced4da;
        }

        .input-group .btn-outline-secondary:hover {
            color: #212529;
            background-color: #e9ecef;
            border-color: #adadad;
        }

        .card-info-note {
            margin-top: 20px;
            border-top: 1px solid #ddd;
            padding-top: 20px;
        }

        .material-icons-wrapper {
            display: inline-flex;
            align-items: center;
            margin-right: 10px;
        }

        .trust-message-content {
            font-size: 14px;
        }

        .img-pci {
            width: 60px;
            margin-left: 10px;
            vertical-align: middle;
        }

        .search-icon {
            pointer-events: none;
            color: #aaa;
        }

        .search-input:focus+.search-icon {
            display: none;
        }


        .flex-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .flex-item {
            flex: 0 1 100px;
            list-style: none;
            padding: 0;
            justify-content: center;
        }

        .list-group-item {
            margin-bottom: 0;
        }
    </style>
@endsection
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
            <p class="fw-medium mb-0">Quản lý thẻ</p>
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
                            <span class="text-primary">Quản lý thẻ</span>
                        </a>
                        <a href="{{ route('auth.review') }}" class="list-group-item list-group-item-action">
                            <img src="https://229a2c9fe669f7b.cmccloud.com.vn/images/review.svg" width="24"
                                height="16" alt="">
                            <span>Nhận xét chuyến đi</span>
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
            <div class="col-md-9 container">
                <!-- Thẻ ATM nội địa -->
                <div class="card mb-4 border px-3">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title text-dark text-bold mb-0">Thẻ ATM nội địa</h5>
                            <p class="card-text text-muted" style="font-size: 14px;">Đảm bảo thẻ đã đăng ký Internet
                                Banking.</p>
                        </div>
                        <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addCardModal">
                            <i class="bi bi-plus-lg me-2"></i>
                            Thêm thẻ mới
                        </button>
                    </div>
                </div>

                <!-- Thẻ thanh toán quốc tế -->
                <div class="card mb-4 border px-3">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title text-dark text-bold mb-0">Thẻ thanh toán quốc tế</h5>
                            <p class="card-text text-muted" style="font-size: 14px;">VISA, MasterCard, JCB</p>
                        </div>
                        <button type="button" class="btn btn-dark">
                            <i class="bi bi-plus-lg me-2"></i>
                            Thêm thẻ mới
                        </button>
                    </div>
                    <!-- Thông báo -->
                    <div class="alert alert-info d-flex align-items-center border border-info" role="alert">
                        <i class="material-icons-round me-2 text-info">verified_user</i>
                        <div>
                            <p class="mb-0">Thẻ được lưu bởi đối tác đạt chuẩn quốc tế PCI DSS cấp độ cao nhất về Bảo mật
                                thanh toán. Một khoản phí nhỏ sẽ được khấu trừ để xác minh thông tin thẻ.</p>
                        </div>
                        <img class="ms-2" src="https://229a2c9fe669f7b.cmccloud.com.vn/svgIcon/pci_dss_logo.svg"
                            alt="PCI DSS Logo" width="50">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addCardModal" tabindex="-1" aria-labelledby="addCardModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content w-100" style="max-width: 800px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCardModalLabel">Thẻ ATM nội địa/ Internet Banking</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="w-100 mb-2" style="border-bottom-color: rgb(224, 224, 224);">
                        <div class="input-group position-relative">
                            <input class="form-control border rounded-pill ps-5 search-input" type="search"
                                placeholder="Tìm kiếm trong danh sách">
                            <span class="position-absolute top-50 translate-middle-y ms-3 search-icon">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                    <div class="scroll-container bg--white overflow-auto p-3" style="height: 250px;">
                        <div class="scroll-content">
                            <ul class="list-group flex-container d-flex flex-row">
                                <li class="list-group-item flex-item">
                                    <button type="button" class="btn btn-light">
                                        <img src="https://229a2c9fe669f7b.cmccloud.com.vn/images/bank/VCOM.png"
                                            alt="bank-item-image" width="102" height="52">
                                    </button>
                                </li>
                                <li class="list-group-item flex-item">
                                    <button type="button" class="btn btn-light">
                                        <img src="https://229a2c9fe669f7b.cmccloud.com.vn/images/bank/VCOM.png"
                                            alt="bank-item-image" width="102" height="52">
                                    </button>
                                </li>
                                <li class="list-group-item flex-item">
                                    <button type="button" class="btn btn-light">
                                        <img src="https://229a2c9fe669f7b.cmccloud.com.vn/images/bank/VCOM.png"
                                            alt="bank-item-image" width="102" height="52">
                                    </button>
                                </li>
                                <li class="list-group-item flex-item">
                                    <button type="button" class="btn btn-light">
                                        <img src="https://229a2c9fe669f7b.cmccloud.com.vn/images/bank/VCOM.png"
                                            alt="bank-item-image" width="102" height="52">
                                    </button>
                                </li>
                                <li class="list-group-item flex-item">
                                    <button type="button" class="btn btn-light">
                                        <img src="https://229a2c9fe669f7b.cmccloud.com.vn/images/bank/VCOM.png"
                                            alt="bank-item-image" width="102" height="52">
                                    </button>
                                </li>
                                <li class="list-group-item flex-item">
                                    <button type="button" class="btn btn-light">
                                        <img src="https://229a2c9fe669f7b.cmccloud.com.vn/images/bank/VCOM.png"
                                            alt="bank-item-image" width="102" height="52">
                                    </button>
                                </li>
                                <li class="list-group-item flex-item">
                                    <button type="button" class="btn btn-light">
                                        <img src="https://229a2c9fe669f7b.cmccloud.com.vn/images/bank/VCOM.png"
                                            alt="bank-item-image" width="102" height="52">
                                    </button>
                                </li>
                                <li class="list-group-item flex-item">
                                    <button type="button" class="btn btn-light">
                                        <img src="https://229a2c9fe669f7b.cmccloud.com.vn/images/bank/VCOM.png"
                                            alt="bank-item-image" width="102" height="52">
                                    </button>
                                </li>
                                <li class="list-group-item flex-item">
                                    <button type="button" class="btn btn-light">
                                        <img src="https://229a2c9fe669f7b.cmccloud.com.vn/images/bank/VCOM.png"
                                            alt="bank-item-image" width="102" height="52">
                                    </button>
                                </li>
                                <li class="list-group-item flex-item">
                                    <button type="button" class="btn btn-light">
                                        <img src="https://229a2c9fe669f7b.cmccloud.com.vn/images/bank/VCOM.png"
                                            alt="bank-item-image" width="102" height="52">
                                    </button>
                                </li>
                                <li class="list-group-item flex-item">
                                    <button type="button" class="btn btn-light">
                                        <img src="https://229a2c9fe669f7b.cmccloud.com.vn/images/bank/VCOM.png"
                                            alt="bank-item-image" width="102" height="52">
                                    </button>
                                </li>
                                <li class="list-group-item flex-item">
                                    <button type="button" class="btn btn-light">
                                        <img src="https://229a2c9fe669f7b.cmccloud.com.vn/images/bank/VCOM.png"
                                            alt="bank-item-image" width="102" height="52">
                                    </button>
                                </li>
                                <li class="list-group-item flex-item">
                                    <button type="button" class="btn btn-light">
                                        <img src="https://229a2c9fe669f7b.cmccloud.com.vn/images/bank/VCOM.png"
                                            alt="bank-item-image" width="102" height="52">
                                    </button>
                                </li>
                                <li class="list-group-item flex-item">
                                    <button type="button" class="btn btn-light">
                                        <img src="https://229a2c9fe669f7b.cmccloud.com.vn/images/bank/VCOM.png"
                                            alt="bank-item-image" width="102" height="52">
                                    </button>
                                </li>
                                <li class="list-group-item flex-item">
                                    <button type="button" class="btn btn-light">
                                        <img src="https://229a2c9fe669f7b.cmccloud.com.vn/images/bank/VCOM.png"
                                            alt="bank-item-image" width="102" height="52">
                                    </button>
                                </li>
                                <li class="list-group-item flex-item">
                                    <button type="button" class="btn btn-light">
                                        <img src="https://229a2c9fe669f7b.cmccloud.com.vn/images/bank/VCOM.png"
                                            alt="bank-item-image" width="102" height="52">
                                    </button>
                                </li>
                                <li class="list-group-item flex-item">
                                    <button type="button" class="btn btn-light">
                                        <img src="https://229a2c9fe669f7b.cmccloud.com.vn/images/bank/VCOM.png"
                                            alt="bank-item-image" width="102" height="52">
                                    </button>
                                </li>
                                <li class="list-group-item flex-item">
                                    <button type="button" class="btn btn-light">
                                        <img src="https://229a2c9fe669f7b.cmccloud.com.vn/images/bank/VCOM.png"
                                            alt="bank-item-image" width="102" height="52">
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Thông báo -->
                    <div class="alert alert-info d-flex align-items-center border border-info" role="alert">
                        <i class="material-icons-round me-2 text-info">verified_user</i>
                        <div>
                            <p class="mb-0">
                                Thẻ được lưu bởi đối tác đạt chuẩn quốc tế PCI DSS cấp độ cao nhất về Bảo mật thanh toán.
                                Một khoản phí nhỏ sẽ được khấu trừ để xác minh thông tin thẻ.
                            </p>
                        </div>
                        <img class="ms-2" src="https://229a2c9fe669f7b.cmccloud.com.vn/svgIcon/pci_dss_logo.svg"
                            alt="PCI DSS Logo" width="50">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light fw-medium" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-warning fw-medium">Lưu thay đổi</button>
                </div>
            </div>
        </div>
    </div>
@endsection
