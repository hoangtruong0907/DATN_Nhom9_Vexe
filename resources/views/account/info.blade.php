<style>
.validation-icon {
    margin-left: 10px;
    font-size: 20px;
    display: inline-block;
}

.valid {
    color: green;
}

.invalid {
    color: red;
}
.error {
    color: red; /* Đặt màu cho thông báo lỗi */
 }

</style>
@extends('layouts.app')

@section('title', 'Thông tin tài khoản')
@section('styles')
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    {{-- Select Date --}}
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />
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
                            <span class="text-primary">Thông tin tài khoản</span>
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
            <div class="col-md-9">
                <form class="d-flex flex-column h-100" method="POST" id="myForm" action="{{ route('update_profile') }}">
                    @csrf
                    <div class="mb-1">
                        <div class="alert alert-info" role="alert">
                            Bổ sung đầy đủ thông tin sẽ giúp Vexere hỗ trợ bạn tốt hơn khi đặt vé
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Họ và tên<span class="text-danger">*</span></label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ $user->name }}">
                        <div class="text-danger" id="name-error"></div> <!-- Thông báo lỗi sẽ được hiển thị ở đây -->
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Số điện thoại</label>
                        <input type="text" name="phone" class="form-control" value="{{ $user->phone ?? '' }}" readonly disabled>
                    </div>
                    
                    <div class="mb-3">
                        <label for="datepicker" class="form-label">Ngày sinh</label>
                        <input type="date" id="birthdate" name="birthday" class="form-control" placeholder="Chọn ngày sinh" value="{{ $user->birthdate ?? '' }}">
                        <div class="text-danger" id="birthdate-error"></div> <!-- Thông báo lỗi sẽ được hiển thị ở đây -->
                    </div>
            
                    <div class="mb-3">
                        <label class="form-label">Giới tính</label>
                        <div class="d-flex">
                            <div class="btn-group w-100" role="group" aria-label="Gender">
                                <input type="radio" id="gender-male" name="sex" value="1" class="btn-check" 
                                    {{ isset($user->sex) && $user->sex == config('apps.common.sex.male') ? 'checked' : '' }}>
                                <label class="btn btn-outline-primary" for="gender-male">Nam</label>
            
                                <input type="radio" id="gender-female" name="sex" value="0" class="btn-check" 
                                    {{ isset($user->sex) && $user->sex == config('apps.common.sex.female') ? 'checked' : '' }}>
                                <label class="btn btn-outline-primary" for="gender-female">Nữ</label>
            
                                <input type="radio" id="gender-other" name="sex" value="2" class="btn-check" 
                                    {{ isset($user->sex) && $user->sex == config('apps.common.sex.other') ? 'checked' : '' }}>
                                <label class="btn btn-outline-primary" for="gender-other">Khác</label>
                            </div>
                        </div>
                        <div class="text-danger" id="sex-error"></div> <!-- Thông báo lỗi cho giới tính -->
                    </div>
                    
                    <hr class="my-3">
                    
                    <div class="mt-auto">
                        <button id="save-button" type="submit" class="btn btn-primary btn-lg btn-block w-100">Lưu</button>          
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('page-scripts')
    {{-- Select Date --}}
 
    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            $('#datepicker').datepicker({
                uiLibrary: 'bootstrap5',
            });
        });
       
        $(document).ready(function() {
            // Lấy ngày hiện tại
            const today = new Date();
            const year = today.getFullYear();
            const month = String(today.getMonth() + 1).padStart(2, '0'); // Tháng bắt đầu từ 0
            const day = String(today.getDate()).padStart(2, '0');

            // Tính toán ngày tối thiểu (10 năm trước)
            const minDate = new Date(year - 10, month - 1, day);
            const minFormattedDate = `${minDate.getFullYear()}-${String(minDate.getMonth() + 1).padStart(2, '0')}-${String(minDate.getDate()).padStart(2, '0')}`;

            // Xác thực form
            $('#myForm').validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 5
                    },
                    birthday: {
                        required: true,
                        date: true,
                        max: minFormattedDate // Kiểm tra ngày sinh phải nhỏ hơn ngày tối thiểu
                    },
                    sex: {
                        required: true
                    }
                },
                messages: {
                    name: {
                        required: "Vui lòng nhập họ và tên.",
                        minlength: "Tên phải có ít nhất 5 ký tự."
                    },
                    birthday: {
                        required: "Vui lòng chọn ngày sinh.",
                        date: "Vui lòng nhập một ngày hợp lệ.",
                        max: "Bạn phải ít nhất 10 tuổi."
                    },
                    sex: {
                        required: "Vui lòng chọn giới tính."
                    }
                }
            });
        });
    </script>
    
@endpush
