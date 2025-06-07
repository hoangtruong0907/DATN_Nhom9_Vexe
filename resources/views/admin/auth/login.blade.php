<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ $title ?? 'Vé xe giá rẻ' }} | VeXe</title>
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/admin/auth.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <div class="wrapper">
        <div class="auth-content">
            <div class="card login-card">
                <div class="row g-0">
                    <div class="col-md-6 d-flex justify-content-center align-items-center left-panel">
                        <div class="laptop-illustration-container">
                            <img src="{{ asset('images/logodolphin.png') }}" alt="bootstraper logo" width="200px" height="200px">

                            <div class="shape circle-outline-1"></div>
                            <div class="shape triangle-1"></div>
                            <div class="shape circle-1"></div>
                            <div class="shape triangle-outline-1"></div>
                        </div>
                    </div>
                    <div class="col-md-6 right-panel">
                        <div class="card-body">
                            <h4 class="member-login-title">Member Login</h4>
                            <form action="{{ route('admin.doLogin') }}" method="post">
                                @csrf
                                <div class="mb-3 input-group custom-input-group">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                                    @error('email')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 input-group custom-input-group">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                                    @error('password')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-login mb-3">LOGIN</button>
                                <p class="forgot-link text-center"><a href="#">Forgot Username / Password?</a></p>
                            </form>
                            <p class="create-account-link text-center mt-4 mb-0">Create your Account &rarr;</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>