<div class="steps-container-train">
    <div id="step-{{ $key }}" class="step-train step-active navigation-step navigation-step-active">
        <div class="step-icon-train step-icon-n step-content2">1</div>
        Chỗ mong muốn
    </div>
    <div id="step-2-{{ $key }}" class="step-train step-inactive navigation-step navigation-step-inactive">
        <div class="step-icon-train step-icon-n step-content2">2</div>
        Nhập thông tin
    </div>

</div>

<div id="content-step-{{ $key }}" class="step-content" style="display: block;">
    <div class="card-body-train">
        <div id="step-{{ $key }}" class="wizard-step-train active-train">
            <div class="trust-message-train">
                <p class="trust-message-text-train"><i class="fas fa-shield-alt mx-2"></i> Vexere cam kết giữ đúng chỗ
                    bạn đã chọn.</p>
            </div>

            <div class="coupon-container-train pt-2 pb-2">
                <div class="locomotive">
                    <div class="boxTrain"> </div>
                    <div class="textTrain">SE6</div>
                </div>
                {{-- Khoang tau  --}}
                @foreach ($carriage_list as $i => $carriage)
                    <div class="wrap-coupon-train" id="template-seat-train-{{ $i }}"
                        data-id="{{ $carriage['carriage_number'] }}" data-physical-train-id="{{ $route['train_id'] }}"
                        data-physical-carriage-id="{{ $carriage['physical_carriage_id'] }}">
                        <button id="button-step-custom-1-{{ $key }}" class="navigation-button-custom"
                            data-key="{{ $key }}" data-step="1">
                            <div class="carriage-train">
                                <div class="border-coupon-train ">
                                    <div class="flex-coupon-train">
                                        <div class="count text-center">
                                            <div class="">{{ $carriage['carriage_number'] }}</div>
                                        </div>
                                        <div class="text-coupon-train">
                                            <div class="coupon-exp-train">
                                                {{ $carriage['carriage_description'] }}
                                            </div>
                                            <p class="text-coupon-train">{{ $carriage['total_carriage_seats'] }} chỗ -
                                                Từ {{ formatCurrency($carriage['min_price']) }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </button>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="container-steps-train" id="template-seat-{{ $route['train_id'] }}">
            {{-- Load template here  --}}
            <p class="fw-bold">Vui lòng chọn khoang tàu</p>
        </div>
    </div>
</div>

<div id="content-step-2-{{ $key }}" class="step-content">
    <!-- hehe -->
    <div class="card-body-train">
        <div class="trust-message-train">
            <p class="trust-message-text-train"><i class="fa-solid fa-circle-check mx-2"></i> Đừng
                quên
                tối ưu hóa theo giá <b class="text-success">ưu đãi đối tượng</b> bằng cách chọn đúng loại
                hành khách
            </p>
        </div>
        <div id="step1-{{ $key }}" class="wizard-step-train active-train">
            <div class="content-information w-full gap-5">
                <div class="information-item mt-3 ">
                    <h5>Thông tin hành khách</h5>
                    <div class="border rounded p-3 d-flex justify-content-center align-items-center gap-3 mt-3 mb-3">
                        <i class="fa-solid fa-id-card"></i>
                        Chọn nhanh từ danh sách đã lưu
                    </div>
                    <div class="d-flex mb-3 ">
                        <select class="bg-custom-train me-auto p-2 text-primary border-0 fw-bold rounded-2 p-2">
                            <option>Người lớn</option>
                            <option>Trẻ em</option>
                            <option>Người cao tuổi</option>
                            <option>Sinh viên</option>
                            <option>Đoàn viên công đoàn</option>
                        </select>
                    </div>

                    <div class="d-flex flex-column train-width-train gap-3">
                        <div class="input-train">
                            <select class="form-select rounded-2" id="selectToa">
                                <option value="">Toa 1</option>
                                <option value="">Toa 2</option>
                            </select>


                        </div>


                        <input class="rounded-2 px-2 py-2 border border-light-subtle " type="text"
                            placeholder="Họ và tên (VD: NGUYEN VAN A)">
                        <input class="rounded-2 px-2 py-2 border border-light-subtle " type="text"
                            placeholder="Số CMND/Ngày sinh/Hộ chiếu">
                    </div>


                </div>
                <div class="information-item mt-3">
                    <h5>Thông tin liên hệ</h5>
                    <span>Hệ thống sẽ xác nhận đặt chỗ, hoàn tiền hoặc đổi lịch qua thông tin này </span>

                    <div class="container-contract-train mt-4">
                        <div class="input-group  mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <span class="flag-icon">🇻🇳</span> (+84)
                                </span>
                            </div>
                            <input type="text" class="form-control" id="phoneInput" value="0966105411">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary clear-btn" type="button"
                                    onclick="clearInput('phoneInput')">
                                    <i class="fa-solid fa-xmark"></i>
                                </button>
                            </div>
                            <label for="phoneInput" class="form-label placeholder-label">Số điện
                                thoại</label>
                        </div>

                        <div class="input-group mb-4">
                            <input type="email" class="form-control" id="emailInput" value="nguyenvana@gmail.com">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary clear-btn" type="button"
                                    onclick="clearInput('emailInput')">
                                    <i class="fa-solid fa-xmark"></i>
                                </button>
                            </div>
                            <label for="emailInput" class="form-label placeholder-label">Email nhận
                                thông
                                tin về</label>
                        </div>

                        <div class="input-group mb-4">
                            <input type="text" class="form-control" id="idInput" value="08937466267184">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary clear-btn" type="button"
                                    onclick="clearInput('idInput')">
                                    <i class="fa-solid fa-xmark"></i>
                                </button>
                            </div>
                            <label for="idInput" class="form-label placeholder-label">Số CMND/Ngày
                                sinh/Hộ
                                chiếu</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="total-amount-train">
    <div class="left-total-amount-train">
        <button onclick="navigateStep('previous', '{{ $key }}')"> Quay lại</button>
        <span class="selected-seats"> Ghế: </span><span class="left-seat-train"></span>
    </div>    
    <div class="right-total-amount-train ">
        <div class="text-total-amout"> <span> Tổng cộng: </span><span class="right-total-train">0đ</span>
        </div>
        <div>
            <button onclick="navigateStep('next', '{{ $key }}')">Tiếp tục <i
                    class="fa-solid fa-arrow-right"></i></button>
        </div>
    </div>
</div>

