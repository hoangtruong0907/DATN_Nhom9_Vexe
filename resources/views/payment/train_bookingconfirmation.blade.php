@extends('layouts.app')
@section('title', 'Xác nhận thông tin đặt vé')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/trip-info.css') }}">
    <style>
        .navigation-button-custom {
            border: 0;
            border-radius: 5px;
            background-color: #f9f9f9;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .navigation-button-custom-active {
            color: #fff;
        }

        .coupon-container-train {
            display: flex;
            scroll-behavior: smooth;
            overflow: auto;
            padding-bottom: 10px;

        }

        .coupon-container-train .locomotive {
            width: 90px;
            height: 92px;
            min-width: 94px;
            background-color: #c8c8c9;
            padding: 10px;
            border-radius: 50px 0px 5px 0px;
            margin-right: 5px;
        }

        .locomotive .boxTrain {
            width: 50px;
            height: 40px;
            background-color: white;
            border-radius: 50px 0px 5px 0px;
        }

        .locomotive .textTrain {
            color: white;
        }

        .coupon-container-train .wrap-coupon-train input {
            display: none;
        }

        .wrap-coupon-train.active {
            border: 2px solid #0056b3;
            border-radius: 8px;
        }

        .wrap-coupon-train .carriage-train {
            -webkit-box-align: stretch;
            align-items: stretch;
            border: 1px solid rgb(224, 224, 224);
            border-radius: 8px;
            background-color: white;
            position: relative;
            width: 272px;
            cursor: pointer;
        }

        .wrap-coupon-train .border-coupon-train {
            height: 92px;
            width: 100%;
            display: flex;
            flex-direction: row;
            -webkit-box-align: center;
            align-items: center;
            gap: 4px;
        }

        .border-coupon-train .flex-coupon-train {
            display: flex;
            gap: 12px;
            width: 100%;
            min-width: 0px;
        }

        .flex-coupon-train .count {
            width: 80px;
            height: 92px;
            position: relative;
            background-color: #c8c8c9;
            align-content: center;
            color: white;
            border-radius: 5px;

        }

        .flex-coupon-train .text-coupon-train {
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
        }

        .text-coupon-train .coupon-exp-train {
            font-weight: 700;
            font-size: 12px;
            line-height: 12px;
            margin-bottom: 0px;
            color: rgb(47, 128, 237);
            text-transform: uppercase;
        }

        .text-coupon-train .text-coupon-train {
            font-size: 12px;
            line-height: 20px;
            letter-spacing: 0px;
            margin-bottom: 0px;
            color: rgb(20, 20, 20) !important;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 1;
            line-clamp: 1;
            font-size: 12px;
            line-height: 20px;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .wrap-coach-train span {
            font-size: 16px;
        }

        .wrap-coach-train {
            padding: 20px;
            gap: 20px;
            display: flex;
            text-align: center;
            overflow: auto;
            width: 500px;
        }

        .wrap-coach-train .coach-train {
            padding: 20px 8px 12px;
            background: rgb(242, 242, 242);
            border-radius: 25px 25px 5px 5px;
        }

        .wrap-coach-train .train-hl {
            height: 32px;
            width: 40px;
        }
    </style>
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
            <div class="main-content d-flex gap-3">
                <!-- Left section -->
                <div class="d-flex flex-column p-4 left-top border bg-white card-border-radius">
                    <div class="left-section">
                        <form action="#" method="POST" accept-charset="UTF-8" id="bookingForm">
                            <!-- Đăng nhập -->
                            <div class="d-flex justify-content-between align-items-center border border-secondary rounded mb-3"
                                style="padding: 12px 12px 12px 16px">
                                <p class="fw-medium mb-0 text-dark">Đăng nhập để tự điền thông tin và nhận điểm khi đặt vé
                                </p>
                                <button class="btn btn-dark" type="button" style="width: 120px" data-bs-toggle="modal"
                                    data-bs-target="#authModal">Đăng nhập</button>
                            </div>
                            <h1 class="fw-bold fs-5 mb-3">Thông tin người đi</h1>
                            <ul class="list-group" id="list-user-form">
                                <li class="list-group-item d-flex justify-content-between align-items-center px-3 py-2 border-0 rounded-3 shadow-sm mb-2"
                                    style="cursor: pointer;" onclick="toggleCollapse(this, '#collapseItem1')">
                                    <span class="fw-bold">Người lớn 1</span>
                                    <i class="fa-solid fa-chevron-up"></i>
                                </li>
                                <div class="collapse show" id="collapseItem1">
                                    <div class="card card-body border-0 p-3 mb-3 shadow-sm">
                                        <div class="form-input mb-3">
                                            <label for="name1" class="form-label">Tên người đi <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" type="text" id="name1" name="customer_name"
                                                placeholder="Nhập tên người đi" value="Tên mẫu" required>
                                        </div>
                                        <div class="form-input mb-3">
                                            <label for="id1" class="form-label">CMND/CCCD <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" type="text" id="id1" name="customer_id"
                                                placeholder="Nhập CMND/CCCD" value="0123456789" required>
                                        </div>
                                        <div class="form-input mb-3">
                                            <label for="seat1" class="form-label">Vị trí ghế ngồi <span
                                                    class="text-danger">*</span></label>
                                            <select class="form-select" id="seat1">
                                                <option selected>Vị Trí</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <li class="list-group-item d-flex justify-content-between align-items-center px-3 py-2 border-0 rounded-3 shadow-sm mb-2"
                                    style="cursor: pointer;" onclick="toggleCollapse(this, '#collapseItem2')">
                                    <span class="fw-bold">Người lớn 2</span>
                                    <i class="fa-solid fa-chevron-up"></i>
                                </li>
                                <div class="collapse show" id="collapseItem2">
                                    <div class="card card-body border-0 p-3 mb-3 shadow-sm">
                                        <div class="form-input mb-3">
                                            <label for="name2" class="form-label">Tên người đi <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" type="text" id="name2" name="customer_name"
                                                placeholder="Nhập tên người đi" value="Tên mẫu" required>
                                        </div>
                                        <div class="form-input mb-3">
                                            <label for="id2" class="form-label">CMND/CCCD <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" type="text" id="id2" name="customer_id"
                                                placeholder="Nhập CMND/CCCD" value="0123456789" required>
                                        </div>
                                        <div class="form-input mb-3">
                                            <label for="seat2" class="form-label">Vị trí ghế ngồi <span
                                                    class="text-danger">*</span></label>
                                            <select class="form-select" id="seat2">
                                                <option selected>Vị Trí</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <li class="list-group-item d-flex justify-content-between align-items-center px-3 py-2 border-0 rounded-3 shadow-sm mb-2"
                                    style="cursor: pointer;" onclick="toggleCollapse(this, '#collapseItem3')">
                                    <span class="fw-bold">Trẻ em 1</span>
                                    <i class="fa-solid fa-chevron-up"></i>
                                </li>
                                <div class="collapse show" id="collapseItem3">
                                    <div class="card card-body border-0 p-3 mb-3 shadow-sm">
                                        <div class="form-input mb-3">
                                            <label for="name3" class="form-label">Tên người đi <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" type="text" id="name3"
                                                name="customer_name" placeholder="Nhập tên người đi" value="Tên mẫu"
                                                required>
                                        </div>
                                        <div class="form-input mb-3">
                                            <label for="id3" class="form-label">CMND/CCCD <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" type="text" id="id3" name="customer_id"
                                                placeholder="Nhập CMND/CCCD" value="0123456789" required>
                                        </div>
                                        <div class="form-input mb-3">
                                            <label for="seat3" class="form-label">Vị trí ghế ngồi <span
                                                    class="text-danger">*</span></label>
                                            <select class="form-select" id="seat3">
                                                <option selected>Vị Trí</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </ul>






                            <h1 class="fw-bold fs-5">Thông tin liên hệ</h1>

                            <input name="_token" type="hidden" value="dummy_csrf_token" />
                            <!-- Data form booking -->
                            <input type="hidden" name="trip_code" value="Mã_chuyến_dummy">
                            <input type="hidden" name="seats" value="Ghế_dummy">
                            <input type="hidden" name="price" value="1000000">
                            <input type="hidden" name="pickup_id" value="pickup_id_dummy">
                            <input type="hidden" name="drop_off_info" value="drop_off_info_dummy">
                            <input type="hidden" name="drop_off_point_id" value="drop_off_point_id_dummy">
                            <input type="hidden" name="data" value="data_dummy">
                            <!-- end set data booking for form -->

                            <div class="form-input mb-3">
                                <label for="name">Tên người đi <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" id="name" name="customer_name"
                                    placeholder="Nhập tên người đi" value="Tên mẫu" required>
                                <div class="error-message text-danger"></div>
                            </div>

                            <div class="form-input mb-3">
                                <label for="phone">Số điện thoại <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" id="phone" name="customer_phone"
                                    placeholder="Nhập số điện thoại" value="0123456789" required>
                                <div class="error-message text-danger"></div>
                            </div>

                            <div class="form-input mb-3">
                                <label for="email">Email để nhận thông tin đặt chỗ <span
                                        class="text-danger">*</span></label>
                                <input class="form-control" type="email" id="email" name="customer_email"
                                    placeholder="Nhập email để nhận thông tin" value="email@mau.com" required>
                                <div class="error-message text-danger"></div>
                            </div>

                            <div class="d-flex align-items-center p-2 rounded-2"
                                style="border-radius: 5px; border: 1px solid #28a745; background-color: #e9f7ec;">
                                <i class="fa-solid fa-user-shield text-success m-2 p-1"></i>
                                <p class="mb-0">Bạn cần nhập số điện thoại và email chính xác để gửi thông tin đơn hàng
                                    và
                                    liên hệ khi
                                    cần thiết.</p>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Right section -->
                <div class="right-section d-flex flex-column p-0 card-border-radius">
                    {{-- <!-- Dữ liệu mẫu cho phần @include --> --}}
                    @include('payment._trip_info_train')
                </div>
            </div>

            <div class="border-top bg-white position-fixed bottom-0 start-50 translate-middle-x w-100"
                style="z-index: 999;">
                <div class="container note d-flex py-4 mx-auto">
                    <div class="d-flex flex-column gap-3 w-100">
                        <div class="note d-flex gap-3 w-100 text-center justify-content-center">
                            <button type="submit" id="submitButton" class="btn fw-bold rounded-3 w-100"
                                style="color: rgb(44, 44, 44); background: rgb(255, 211, 51); border-color: rgb(255, 211, 51); height: 48px; line-height: 24px; white-space: nowrap;">
                                <span>Thanh toán</span>
                            </button>
                        </div>

                        <div class="flex-fill text-dark lh-base text-center">
                            Bằng việc tiếp tục, bạn đồng ý với
                            <a href="#" class="fw-bold mb-0 text-decoration-underline lh-sm text-primary"
                                target="_blank">
                                Chính sách bảo mật thanh toán
                            </a>
                            và
                            <a href="#" class="fw-bold mb-0 text-decoration-underline lh-sm text-primary"
                                target="_blank">
                                Quy chế
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            @include('payment._trip_info_train_draw')
        </div>
    </div>
@endsection
@push('page-scripts')
    <script>
        function toggleCollapse(element, targetId) {
            const target = document.querySelector(targetId);
            const icon = element.querySelector('i');

            if (target.classList.contains('show')) {
                target.classList.remove('show');
                icon.classList.remove('fa-chevron-up');
                icon.classList.add('fa-chevron-down');
            } else {
                target.classList.add('show');
                icon.classList.remove('fa-chevron-down');
                icon.classList.add('fa-chevron-up');
            }
        }
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
