<header>
    <div class="total-header shadow">
        <div class="left-header">
            <button class="menu-button-filter" id="menuButton" onclick="toggleMenuFilter()">☰</button>
            <div class="logo-header">
                <a href="/">
                    <img src="{{ asset('images/logo-svexere.svg') }}" alt="logo">
                </a>
            </div>
            <div class="slogan-header">
                Một tấm vé không chỉ là chuyến đi, mà là cả hành trình trải nghiệm
            </div>
        </div>
        <ul class="right-header nav">
            <li class="menu-group-item" id="btn-hotline">
                <div class="Navbar2__ButtonHotline-sa2air-8 button-nav">
                    <div class="material-icons-wrapper md-20 icon-phone">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                    </div>
                    <p class="base__Headline03-sc-1tvbuqk-15 content-button-nav">Hotline 24/7</p>
                </div>
                <div class="contact-dropdown">
                    <i class="fa fa-phone" aria-hidden="true"></i> Hotline 1:<a href="tel:0967041900">
                        0967041900</a><br>
                    <i class="fa fa-phone" aria-hidden="true"></i> Hotline 2:<a href="tel:0967041900"> 0967041900</a>
                </div>
            </li>
            @guest
                <li class="menu-group-item">
                    <div class="Navbar2__ButtonHotline-sa2air-8 button-nav">
                        <p class="base__Headline03-sc-1tvbuqk-15 content-button-nav" data-bs-toggle="modal"
                            data-bs-target="#authModal">
                            Đăng nhập
                        </p>
                    </div>
                </li>
            @else
                <li class="dropdown ms-2" style="cursor: pointer">
                    <div class="d-flex align-items-center" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="profile-icon rounded-circle shadow">
                            <img src="https://229a2c9fe669f7b.cmccloud.com.vn/svgIcon/user_profile.svg" width="32"
                                height="32" alt="User Profile">
                        </div>
                        <div class="material-icons-wrapper md-16">
                            <i class="material-icons-outlined dropdown-icon">arrow_drop_down</i>
                        </div>
                    </div>
                    <!-- Dropdown menu -->
                    <ul class="dropdown-menu dropdown-menu-end"
                        style="border-radius: 8px; box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 2px;">
                        <li class="mb-2">
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('auth.info') }}">
                                <img src="https://229a2c9fe669f7b.cmccloud.com.vn/images/Auth/account-circle.svg"
                                    width="16" height="16" alt="">
                                <span class="ms-2 fw-medium" style="font-size: 14px;">Thông tin tài khoản</span>
                            </a>
                        </li>
                        <li class="mb-2">
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('auth.membership') }}">
                                <img src="https://229a2c9fe669f7b.cmccloud.com.vn/images/loyalty.svg" width="16"
                                    height="16" alt="">
                                <span class="ms-2 fw-medium" style="font-size: 14px;">Thành viên <b> thường</b></span>
                            </a>
                        </li>
                        <li class="mb-2">
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('auth.ticket') }}">
                                <img src="https://229a2c9fe669f7b.cmccloud.com.vn/images/ticket.svg" width="16"
                                    height="16" alt="">
                                <span class="ms-2 fw-medium" style="font-size: 14px;">Đơn hàng của tôi</span>
                            </a>
                        </li>
                        <li class="mb-2">
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('auth.reward') }}">
                                <img src="https://229a2c9fe669f7b.cmccloud.com.vn/images/promotion.svg" width="16"
                                    height="16" alt="">
                                <span class="ms-2 fw-medium" style="font-size: 14px;">Ưu đãi</span>
                            </a>
                        </li>
                        <li class="mb-2">
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('auth.logout') }}">
                                <img src="https://229a2c9fe669f7b.cmccloud.com.vn/images/Auth/logout.svg" width="16"
                                    height="16" alt="">
                                <span class="ms-2 fw-medium" style="font-size: 14px;">Đăng xuất</span>
                            </a>
                        </li>
                    </ul>
                </li>
            @endguest
        </ul>
    </div>
</header>

<!-- Modal Login/Register -->
<div class="modal fade" id="authModal" tabindex="-1" aria-labelledby="authModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="authModalLabel">Đăng nhập</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-4">
                    <label for="phoneNumber" class="form-label m-0">Số điện thoại</label>
                    <div class="input-group mb-4">
                        <select class="form-select flex-shrink-1" style="max-width: 120px" id="phoneCode"
                            aria-label="Phone code">
                            <option value="+84" selected>(Viet Nam) +84</option>
                            <option value="+01">(A) +01</option>
                            <option value="+02">(B) +02</option>
                        </select>
                        <input type="text" class="form-control flex-grow-1" id="phoneNumber"
                            placeholder="Số điện thoại">
                    </div>
                </div>
                <button type="button" class="btn btn-primary w-100">Tiếp tục</button>
                <div class="text-center my-1">
                    <div class="d-flex align-items-center justify-content-center">
                        <hr class="flex-grow-1">
                        <span class="text-muted mx-2">hoặc</span>
                        <hr class="flex-grow-1">
                    </div>
                </div>
                <a href="{{ route('auth.google') }}" class="btn btn-danger w-100" style="text-decoration: none;">
                    Tiếp tục với Google
                </a>

                <div class="mt-3 d-flex align-items-center justify-content-start" id="authSwitch">
                    <span>Bạn chưa có tài khoản?</span>
                    <button type="button" class="btn btn-link" id="toggleAuth" style="text-decoration: none;">
                        Đăng ký
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@auth
    @php
        $user = Auth::user();
    @endphp

    {{-- @if (is_null($user->phone))
        <div class="modal fade" id="addPhonenumberModal" tabindex="-1" aria-labelledby="addPhonenumberModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addPhonenumberModalLabel">Xác thực số điện thoại</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-4">
                            <label for="phoneNumber" class="form-label m-0">Số điện thoại</label>
                            <div class="input-group mb-4">
                                <select class="form-select flex-shrink-1" style="max-width: 120px" id="add_phoneCode"
                                    aria-label="Phone code">
                                    <option value="84" selected>(Viet Nam) +84</option>
                                    <option value="01">(A) +01</option>
                                    <option value="02">(B) +02</option>
                                </select>
                                <input type="text" name="phone" class="form-control flex-grow-1"
                                    style="flex-grow: 1;" id="add_phoneNumber" placeholder="Số điện thoại">
                            </div>
                        </div>
                        <button id="btn-phone-auth" type="button" class="btn btn-primary w-100"
                            data-url="{{ route('auth.addPhone') }}">Tiếp tục</button>
                    </div>
                </div>
            </div>
        </div>
    @endif --}}
@endauth

