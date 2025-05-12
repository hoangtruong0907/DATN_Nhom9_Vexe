@extends('layouts.app')
@section('title', 'Booking Confirmation')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/trip-info.css') }}">
@endsection

@section('content')
    <div class="content">
        <div class="container  mx-auto flex-column flex gap-3" style="padding: 20px 0px;">
            <!-- Back button and image -->
            <div class="d-flex align-items-center mb-3">
                <img src="https://229a2c9fe669f7b.cmccloud.com.vn/svgIcon/chevron_left_gray.svg" alt="">
                <a href="{{ URL::previous() }}" class="fw-medium mb-0 text-decoration-none  " style="font-size: 14px;">Quay
                    lại</a>
            </div>
            <!-- Main content layout -->
            <div class="main-content d-flex gap-3">
                <!-- Left section -->
                <div class="d-flex flex-column p-4 left-top border bg-white card-border-radius">
                    <div class="left-section">
                        @guest
                            <div class="d-flex justify-content-between align-items-center border border-secondary rounded mb-3"
                                style="padding: 12px 12px 12px 16px">
                                <p class="fw-medium mb-0 text-dark">Đăng nhập để tự điền thông tin và nhận điểm khi đặt vé</p>
                                <button class="btn btn-dark" type="button" style="width: 120px" data-bs-toggle="modal"
                                    data-bs-target="#authModal">Đăng nhập</button>
                            </div>
                        @endguest
                        <h1 class="fw-bold fs-5">Thông tin liên hệ</h1>
                        <form action="{{ route('booking.store') }}" method="POST" accept-charset="UTF-8" id="bookingForm">
                            <input name="_token" type="hidden" value="{{ csrf_token() }}" />
                            {{-- Data form booking --}}
                            <input type="hidden" name="trip_code" value="{{ $seatInfo['trip_code'] }}">
                            <input type="hidden" name="seats" value="{{ $seatInfo['seat'] }}">
                            <input type="hidden" name="price" value="{{ $seatTicket['totalFare'] }}">
                            <input type="hidden" name="pickup_id" value="{{ $seatInfo['pickup_id'] }}">
                            <input type="hidden" name="drop_off_info" value="{{ $seatInfo['drop_off_info'] }}">
                            <input type="hidden" name="drop_off_point_id" value="{{ $seatInfo['drop_off_point_id'] }}">
                            <input type="hidden" name="data" value="{{ $data }}">
                            {{-- end set data booking for form --}}

                            <div class="form-input mb-3">
                                <label for="name">Tên người đi <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" id="name" name="customer_name"
                                    placeholder="Nhập tên người đi" value="{{ Auth::user()->name ?? null }}" required>
                                <div class="error-message text-danger"></div>
                            </div>

                            <div class="form-input mb-3">
                                <label for="phone">Số điện thoại <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" id="phone" name="customer_phone"
                                    placeholder="Nhập số điện thoại" value="{{ Auth::user()->phone ?? null }}" required>
                                <div class="error-message text-danger"></div>
                            </div>

                            <div class="form-input mb-3">
                                <label for="email">Email để nhận thông tin đặt chỗ <span
                                        class="text-danger">*</span></label>
                                <input class="form-control" type="email" id="email" name="customer_email"
                                    placeholder="Nhập email để nhận thông tin" value="{{ Auth::user()->email ?? null }}"
                                    required>
                                <div class="error-message text-danger"></div>
                            </div>

                            <div class="d-flex align-items-center p-2 rounded-2"
                                style="border-radius: 5px; border: 1px solid #28a745; background-color: #e9f7ec;">
                                <i class="fa-solid fa-user-shield text-success m-2 p-1"></i>
                                <p class="mb-0">Bạn cần nhập số điện thoại và email chính xác để gửi thông tin đơn hàng và
                                    liên hệ khi cần thiết.</p>
                            </div>
                        </form>
                    </div>
                    <!--bottom-left section -->
                    {{-- <div class="bottom-left d-flex flex-column gap-3 bg-white border border-light-subtle rounded-2 p-4 card-border-radius">
                    <div class="container">
                        <h1 class="fw-bold fs-5 text-black">Tiện ích</h1>
                        <div class="d-flex flex-column align-items-center">
                            <div class="pb-3 w-100 d-flex align-items-center justify-content-between">
                                <div class="d-flex flex-row align-items-center">
                                    <div class="ms-3">
                                        <div class="d-flex align-items-center flex-row">
                                            <div class="me-2 mb-3">
                                                <img style="width: auto;"
                                                    src="https://229a2c9fe669f7b.cmccloud.com.vn/svgIcon/icon_protect_trip.svg"
                                                    alt="icon_protect_trip">
                                            </div>
                                            <div class="d-flex fw-normal text-dark">
                                                <p class="fw-semibold d-inline">
                                                    Bảo hiểm chuyến đi
                                                </p>
                                                <p class="fw-normal   mb-0 ms-1 lh-sm" style="letter-spacing: 0;">
                                                    (+20.000đ/ghế)
                                                </p>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column align-items-center">
                                            <p class="text-muted fw-normal fs-7 mb-0"
                                                style="color: #858585 !important; line-height: 16px;">
                                                Được bồi thường lên đến 400.000.000đ/ghế.</p>
                                        </div>
                                        <div class="d-flex flex-row align-items-center">
                                            <p class="text-muted fw-normal   mb-0"
                                                style="line-height: 16px; margin-right: 3px; color: #858585 !important;">
                                                Cung cấp bởi
                                            </p>
                                            <div class="d-flex flex-row align-items-center">
                                                <img src="https://229a2c9fe669f7b.cmccloud.com.vn/svgIcon/baoviet.svg"
                                                    alt="baoviet">
                                                <img class="w-auto mx-1"
                                                    src="https://229a2c9fe669f7b.cmccloud.com.vn/svgIcon/close_gray.svg"
                                                    alt="close-gray">
                                            </div>
                                            <img class="w-auto"
                                                src="https://229a2c9fe669f7b.cmccloud.com.vn/svgIcon/icon_saladin.svg"
                                                alt="icon_saladin">
                                        </div>
                                    </div>
                                </div>
                                <label
                                    class="d-inline-block text-dark text-opacity-65 lh-sm mb-3 pointer custom-checkbox ">
                                    <input type="checkbox" value="">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                        <div class="pointer" style="border-radius: 8px; background-color: rgb(39, 174, 96);">
                            <div class="p-3 rounded-3"
                                style=" border: 1px solid rgb(39, 174, 96); color: rgb(20, 20, 20); background-color: rgb(255, 255, 255);">
                                <div class="d-flex flex-column" style="margin-bottom: 12px;">
                                    <p class="fw-bold mb-0 lh-sm" style="font-size: 14px; letter-spacing: 0px;">
                                        Bảo hiểm tai nạn
                                    </p>
                                    <p class="text-muted mb-0 fw-normal" style="font-size: 12px; line-height: 16px;">
                                        Quyền lợi bảo hiểm lên đến 400
                                        triệu đồng khi xảy ra tai nạn
                                    </p>
                                </div>
                                <div class="d-flex flex-column" style="margin-bottom: 12px;">
                                    <p class="fw-bold mb-0 lh-sm" style="font-size: 14px; letter-spacing: 0px;">
                                        Bảo hiểm hủy chuyến
                                    </p>
                                    <p class="text-muted mb-0 fw-normal" style="font-size: 12px; line-height: 16px;">
                                        Bồi thường 100% tiền vé nếu chuyến đi bị hủy bởi các lí do khách quan hoặc bất
                                        khả
                                        kháng về sức khỏe.
                                    </p>
                                </div>
                            </div>

                            <div class="d-flex flex-row justify-content-between"
                                style="padding: 8px 12px; border-bottom-left-radius: 8px; border-bottom-right-radius: 8px; color: rgb(255, 255, 255);">
                                <p class="mb-0 fw-normal" style="font-size: 12px; line-height: 16px;">
                                    Bồi thường trực tuyến nhanh chóng, dễ dàng
                                </p>
                                <p class="fw-bold mb-0 text-decoration-underline text-underline-offset-1"
                                    style="font-size: 12px;" data-bs-toggle="modal"
                                    data-bs-target="#utilityDetailslModal">
                                    Chi tiết
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-column align-items-center g-3 border-top border-light-subtle pt-2">
                        <div class="d-flex align-items-center justify-content-between w-100 p-1">
                            <div class="d-flex align-items-center">
                                <img class="me-3" src="https://229a2c9fe669f7b.cmccloud.com.vn/svgIcon/rental.svg"
                                    alt="rental">
                                <div>
                                    <p class="fw-bold mb-0">Thuê xe máy tại Hải Phòng</p>
                                    <p class="text-muted mb-0" style="font-size: 12px;">Vexere sẽ liên hệ lại để xác
                                        nhận
                                        dịch vụ.</p>
                                </div>
                            </div>
                            <label class="d-inline-block text-dark text-opacity-65 lh-sm mb-3 pointer custom-checkbox ">
                                <input type="checkbox" value="">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="container mt-4">
                            <div class="d-flex overflow-auto">
                                <!-- Bike Item 1 -->
                                <div class="d-flex flex-column me-3 text-center" style="width: 128px;">
                                    <img class="img-fluid"
                                        src="https://229a2c9fe669f7b.cmccloud.com.vn/images/thuexe/Xe_so_110cc_-_Yamaha_Sirius.jpg"
                                        alt="bike-image">
                                    <p class="fw-medium mt-2 mb-1 text-dark">Xe số 110cc</p>
                                    <p class="text-muted mb-1">Dòng xe bất kỳ</p>
                                    <p class="text-danger mb-1 fw-bold">120.000đ/ngày</p>
                                    <div class="text-muted" style="font-size: 10px;">Giao xe tận nơi</div>
                                </div>
                                <!-- Bike Item 2 -->
                                <div class="d-flex flex-column me-3 text-center" style="width: 128px;">
                                    <img class="img-fluid"
                                        src="https://229a2c9fe669f7b.cmccloud.com.vn/images/thuexe/Xe_tay_ga_Honda_AirBlad_125cc_2018.jpg"
                                        alt="bike-image">
                                    <p class="fw-medium mt-2 mb-1 text-dark">Xe tay ga 125cc</p>
                                    <p class="text-muted mb-1">Dòng xe bất kỳ</p>
                                    <p class="text-danger mb-1 fw-bold">120.000đ/ngày</p>
                                    <div class="text-muted" style="font-size: 10px;">Giao xe tận nơi</div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center p-2 rounded-2 w-100 mt-3"
                            style="border-radius: 5px; border: 1px solid #28a745; background-color: #e9f7ec; ">
                            <i class="material-icons-round me-2 text-success">verified_user</i>
                            <p class="mb-0">Thuê càng lâu, giá càng rẻ!</p>
                        </div>
                    </div>
                </div> --}}
                </div>
                <!-- Right section -->
                <div class="right-section d-flex flex-column p-0 card-border-radius">
                    @include('payment._trip_info')
                </div>
            </div>
            <div class="border-top bg-white position-fixed bottom-0 start-50 translate-middle-x w-100" style="z-index: 999;">
                <div class="container note d-flex py-4 mx-auto">
                    <div class="d-flex flex-column gap-3 w-100">
                        <div class="note d-flex gap-3 w-100 text-center justify-content-center">
                            <button type="submit" id="submitButton" class="btn fw-bold rounded-3 w-100"
                                style="color: rgb(44, 44, 44);background: rgb(255, 211, 51); border-color: rgb(255, 211, 51); height: 48px; line-height: 24px; white-space: nowrap;">
                                <span>Thanh toán</span>
                            </button>
                        </div>

                        <div class="flex-fill text-dark lh-base text-center">
                            Bằng việc tiếp tục, bạn đồng ý với
                            <a href="#" class="fw-bold mb-0 text-decoration-underline lh-sm text-primary"
                                target="_blank">
                                Chính sách bảo mật thanh toán
                            </a>
                            và <a href="#" class="fw-bold mb-0 text-decoration-underline lh-sm text-primary"
                                target="_blank">
                                Quy chế
                            </a>
                        </div>
                    </div>
                    @if (isset($isBookingTwo))
                        <div style="width: 375px; min-width: 375px;">
                            <div class="d-flex flex-column gap-3">
                                <div class="d-flex flex-column">
                                    <p class="fs-6 fw-bold mb-0 text-success">
                                        Đặt thêm chiều về, giảm ngay 20k!
                                    </p>
                                    <p class="fw-normal mb-0 lh-sm" style="letter-spacing: 0px;">
                                        Áp dụng khi đặt cùng nhà xe Hải Phòng Travel (Đất Cảng) (dùng mã giảm giá khứ hồi ở
                                        bước
                                        thanh
                                        toán).
                                    <p id="detailsButton"
                                        class="fw-bold mb-0 text-decoration-underline lh-sm text-primary pointer mt-1"
                                        data-bs-toggle="popover" data-bs-trigger="manual" data-bs-placement="top"
                                        data-bs-html="true" title="<div class='text-center'>Phạm vi áp dụng</div>"
                                        data-bs-content="
                                        <div class='popup-info-section terms-and-conditions border-bottom pb-2'>
                                            <div class='popup-info-row d-flex align-items-center mb-1'>
                                                <i class='material-icons-round text-muted me-2'>alt_route</i>
                                                <p class='mb-0 text-dark'>
                                                    <strong>Tuyến đường</strong>: Tất cả tuyến đường
                                                </p>
                                            </div>
                                            <div class='popup-info-row d-flex align-items-center mb-1'>
                                                <i class='material-icons-round text-muted me-2'>directions_bus</i>
                                                <p class='mb-0 text-dark'><strong>Nhà xe</strong>: Hải Phòng Travel</p>
                                            </div>
                                            <div class='popup-info-row d-flex align-items-center mb-1'>
                                                <i class='material-icons-round text-muted me-2'>timer</i>
                                                <p class='mb-0 text-dark'>
                                                    <strong>Ngày khởi hành</strong>: T6, 14/06 00:00 - T4, 31/12/2025 00:00 (trừ 30/08 - 04/09; 30/12 - 02/01/2025)
                                                </p>
                                            </div>
                                        </div>
                                        <div class='popup-info-row d-flex pt-3'>
                                            <p class='mb-0'>
                                                Giảm 20k khi đơn hàng mua từ 1 vé trở lên.<br>
                                                - Lưu ý: Các điều kiện và số tiền giảm giá khứ hồi sẽ được xét và giảm trừ trên chiều về.<br>
                                                - Chiều đi và chiều về phải cùng một nhà xe và số lượng vé phải bằng nhau.<br>
                                                - Vé chiều đi và chiều về phải khởi hành trong cùng ngày.<br>
                                                - Mã giảm giá khứ hồi sẽ không còn được áp dụng nếu đơn hàng bị huỷ 1 chiều hoặc cả 2 chiều.<br>
                                                - Vé có sử dụng mã giảm giá thuộc chương trình KHÔNG được hoàn/hủy/đổi/trả.<br>
                                                - Ưu đãi chỉ áp dụng cho KH đặt vé tại Website/App và tổng đài đặt vé VeXeRe. Không áp dụng hình thức thanh toán tại Nhà xe.<br>
                                                - Có thể áp dụng đồng thời với các chương trình khuyến mãi từ đối tác thanh toán.<br>
                                                - Số lượng mã giảm giá có giới hạn, chương trình có thể kết thúc sớm hơn so với dự kiến.
                                            </p>
                                        </div>
                                    ">
                                        Chi tiết
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            @include('payment._trip_info_draw')
        </div>
    </div>
@endsection
@push('page-scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const toggleVisibility = (iconId, contentId) => {
                const $toggleIcon = $(`#${iconId}`);
                const $additionalContent = $(`#${contentId}`);

                if ($toggleIcon.length && $additionalContent.length) {
                    $toggleIcon.on('click', () => {
                        const isHidden = $additionalContent.toggleClass('d-none').hasClass('d-none');
                        $toggleIcon
                            .toggleClass('fa-angle-down', isHidden) // Thêm fa-angle-down khi ẩn
                            .toggleClass('fa-angle-up', !isHidden); // Thêm fa-angle-up khi hiện
                    });
                }
            };

            // Khởi chạy hàm toggle cho các phần tử với ID phù hợp
            toggleVisibility('totalAmount', 'showTotalAmount');
            toggleVisibility('totalAmountModal', 'showTotalAmountModal');

            const setupOffcanvasOrModal = (triggerId, targetId, isModal = false) => {
                document.querySelectorAll(`#${triggerId}`).forEach(element => {
                    element.addEventListener('click', event => {
                        event.preventDefault();

                        if (isModal) {
                            const modal = new bootstrap.Modal(document.getElementById(
                                targetId));
                            modal.show();
                        } else {
                            const offcanvas = new bootstrap.Offcanvas(document.getElementById(
                                targetId));
                            offcanvas.show();
                        }

                        const changeRight = document.getElementById('changeRight');
                        if (changeRight) {
                            changeRight.classList.add('show');
                            changeRight.style.visibility = 'visible';
                        }
                    });
                });
            };

            setupOffcanvasOrModal('sortedBy', 'sortedByShow');
            setupOffcanvasOrModal('changeLocation', 'changeLocationShow');
            setupOffcanvasOrModal('reportUs', 'reportUsShow');
            setupOffcanvasOrModal('viewLocation', 'viewLocationShow', true);

            const popoverTriggerEl = $('#detailsButton');
            popoverTriggerEl.popover({
                trigger: 'manual'
            });

            popoverTriggerEl.on('click', function(e) {
                e.preventDefault();
                if (popoverTriggerEl.attr('aria-describedby')) {
                    popoverTriggerEl.popover('hide');
                } else {
                    popoverTriggerEl.popover('show');
                }
            });

            $(document).on('click', function(e) {
                if (!popoverTriggerEl.is(e.target) && popoverTriggerEl.has(e.target).length === 0 &&
                    $('.popover').has(e.target).length === 0) {
                    popoverTriggerEl.popover('hide');
                }

            });
        });

        $(document).ready(function() {
            // Xác thực form
            $('#bookingForm').validate({
                rules: {
                    customer_name: {
                        required: true,
                        minlength: 2
                    },
                    customer_phone: {
                        required: true,
                        digits: true,
                        minlength: 10,
                        maxlength: 15
                    },
                    customer_email: {
                        required: true,
                        email: true
                    }
                },
                messages: {
                    customer_name: {
                        required: "Vui lòng nhập tên người đi.",
                        minlength: "Tên phải có ít nhất 2 ký tự."
                    },
                    customer_phone: {
                        required: "Vui lòng nhập số điện thoại.",
                        digits: "Số điện thoại chỉ được chứa các chữ số.",
                        minlength: "Số điện thoại phải có ít nhất 10 ký tự.",
                        maxlength: "Số điện thoại không được vượt quá 15 ký tự."
                    },
                    customer_email: {
                        required: "Vui lòng nhập email.",
                        email: "Vui lòng nhập một địa chỉ email hợp lệ."
                    }
                },
                errorPlacement: function(error, element) {
                    error.appendTo(element.closest('.form-input').find('.error-message'));
                    element.addClass('is-invalid');
                },
                success: function(label, element) {
                    $(element).removeClass('is-invalid').addClass('is-valid');
                    label.closest('.error-message').empty();
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });

            // Sự kiện click cho nút thanh toán
            $('#submitButton').on('click', function() {
                if ($('#bookingForm').valid()) {
                    $('#bookingForm').submit();
                } else {
                    console.log("Form không hợp lệ"); // Ghi thông báo ra console nếu không hợp lệ
                }
            });
        });
    </script>
@endpush
