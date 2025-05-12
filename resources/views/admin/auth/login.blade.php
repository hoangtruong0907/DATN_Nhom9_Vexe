<!doctype html>
<!--
* Bootstrap Simple Admin Template
* Version: 2.1
* Author: Alexis Luna
* Website: https://github.com/alexis-luna/bootstrap-simple-admin-template
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ $title ?? 'Vé xe giá rẻ' }} | SbayVeXe</title>
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/admin/auth.css" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <div class="auth-content">
            <div class="card">
                <div class="card-body text-center">
                    <div class="mb-4 d-flex justify-content-center align-items-center overflow-hidden">
                        <img class="brand" src="/images/bootstraper-logo.png" alt="bootstraper logo" style="margin-top: -1px">
                    </div>
                    <h6 class="mb-4 text-muted">Đăng nhập vào tài khoản của bạn</h6>
                    <form action="{{ route('admin.doLogin') }}" method="post">
                        @csrf
                        <div class="mb-3 text-start">
                            <label for="email" class="form-label">Địa chỉ Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Nhập Email">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 text-start">
                            <label for="password" class="form-label">Mật khẩu</label>
                            <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu">
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 text-start">
                            <div class="form-check">
                                <input class="form-check-input" name="remember" id="remember" type="checkbox" value=""
                                    id="check1">
                                <label class="form-check-label" for="check1">
                                    Ghi nhớ tôi trên thiết bị này
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary shadow-2 mb-4">Đăng nhập</button>
                    </form>
                    <p class="mb-2 text-muted">Quên mật khẩu? <a href="#">Khôi phục</a></p>
                    <p class="mb-0 text-muted">Bạn chưa có tài khoản? <a href="signup.html">....</a></p>
                </div>
            </div>
        </div>
    </div>
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
