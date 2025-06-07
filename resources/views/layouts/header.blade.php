<header>
    <div class="total-header shadow">
        <div class="left-header">
            <button class="menu-button-filter" id="menuButton" onclick="toggleMenuFilter()">☰</button>
            <div class="logo-header">
                <a href="/">
                    <img src="{{ asset('images/logodolphin.png') }}" alt="logo">
                    <!-- <img src="{{ asset('https://sbaygroup.com/images/logosbaytravel.png') }}" alt="logo"> -->
                </a>
            </div>
            <div class="slogan-header">
                Một tấm vé không chỉ là chuyến đi, mà là cả hành trình trải nghiệm
            </div>
        </div>
        <ul class="right-header nav">
            <div class="hotline-container" aria-label="Hotline 24/7">
                <button class="hotline-btn button-nav" id="hotlineBtn" aria-haspopup="true" aria-expanded="false" aria-controls="hotlineDropdown">
                    <i class="fa fa-phone content-button-nav" aria-hidden="true"></i>
                    Hotline 24/7
                </button>
                <div class="hotline-dropdown" id="hotlineDropdown" role="menu" aria-labelledby="hotlineBtn">
                    <div role="menuitem">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    <a href="tel:1900969681">1900969681</a>
                    <span> - Để phản hồi về dịch vụ và xử lý sự cố</span>
                    </div>
                    <div role="menuitem">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    <a href="tel:1900888684">1900888684</a>
                    <span> - Để đặt vé qua điện thoại (24/7)</span>
                    </div>
                </div>
            </div>
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
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content border-0 shadow p-4">
      <div class="row">
        <!-- Left side - Auth Form -->
        <div class="col-md-6 p-4">
          <!-- Sign In Form -->
          <div id="signInForm">
            <h2 class="fw-bold mb-2">WELCOME BACK</h2>
            <p class="text-muted mb-4">Welcome back! Please enter your details.</p>

            <form>
              <div class="mb-3">
                <label class="form-label fw-semibold">Email</label>
                <input type="email" class="form-control rounded-3 shadow-sm" placeholder="Enter your email">
              </div>
              <div class="mb-3">
                <label class="form-label fw-semibold">Password</label>
                <input type="password" class="form-control rounded-3 shadow-sm" placeholder="**********">
              </div>

              <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="rememberMe">
                  <label class="form-check-label" for="rememberMe">Remember me</label>
                </div>
                <a href="#" class="text-decoration-none">Forgot password</a>
              </div>

              <button type="submit" class="btn btn-danger w-100 rounded-3 py-2 fw-semibold">Sign in</button>

              <div class="text-center my-3 text-muted">or</div>

              <a href="{{ route('auth.google') }}" class="btn btn-outline-secondary w-100 rounded-3 py-2 d-flex align-items-center justify-content-center gap-2">
                <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google" width="20">
                Sign in with Google
              </a>
            </form>

            <div class="text-center mt-3">
              <span class="text-muted">Don't have an account?</span>
              <button class="btn btn-link text-danger fw-semibold p-0" onclick="toggleForm()">Sign up for free!</button>
            </div>
          </div>

          <!-- Sign Up Form -->
          <div id="signUpForm" style="display: none;">
            <h2 class="fw-bold mb-2">CREATE ACCOUNT</h2>
            <p class="text-muted mb-4">Let’s get started with your new account.</p>

            <form>
              <div class="mb-3">
                <label class="form-label fw-semibold">Full Name</label>
                <input type="text" class="form-control rounded-3 shadow-sm" placeholder="Enter your full name">
              </div>
              <div class="mb-3">
                <label class="form-label fw-semibold">Email</label>
                <input type="email" class="form-control rounded-3 shadow-sm" placeholder="Enter your email">
              </div>
              <div class="mb-3">
                <label class="form-label fw-semibold">Password</label>
                <input type="password" class="form-control rounded-3 shadow-sm" placeholder="Create a password">
              </div>

              <button type="submit" class="btn btn-danger w-100 rounded-3 py-2 fw-semibold">Sign up</button>

              <div class="text-center my-3 text-muted">or</div>

              <a href="{{ route('auth.google') }}" class="btn btn-outline-secondary w-100 rounded-3 py-2 d-flex align-items-center justify-content-center gap-2">
                <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google" width="20">
                Sign up with Google
              </a>
            </form>

            <div class="text-center mt-3">
              <span class="text-muted">Already have an account?</span>
              <button class="btn btn-link text-danger fw-semibold p-0" onclick="toggleForm()">Sign in</button>
            </div>
          </div>
        </div>
        

        <!-- Right side - Illustration -->
        <div class="col-md-6 d-none d-md-block p-0">
        <img src="{{ asset('images/sbay.png') }}" alt="Illustration" class="img-fluid h-100 w-100" style="object-fit: cover;">

        </div>
      </div>
    </div>
  </div>
</div>

<script>
  function toggleForm() {
    const signInForm = document.getElementById("signInForm");
    const signUpForm = document.getElementById("signUpForm");

    const isSignInVisible = signInForm.style.display !== "none";
    signInForm.style.display = isSignInVisible ? "none" : "block";
    signUpForm.style.display = isSignInVisible ? "block" : "none";
  }
  

   document.addEventListener('DOMContentLoaded', () => {
    const btn = document.getElementById('hotlineBtn');
    const dropdown = document.getElementById('hotlineDropdown');

    btn.addEventListener('click', e => {
      e.stopPropagation();
      const isActive = dropdown.classList.toggle('active');
      btn.setAttribute('aria-expanded', isActive);
    });

    document.addEventListener('click', () => {
      dropdown.classList.remove('active');
      btn.setAttribute('aria-expanded', false);
    });

    dropdown.addEventListener('click', e => e.stopPropagation());
  });
</script>


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

