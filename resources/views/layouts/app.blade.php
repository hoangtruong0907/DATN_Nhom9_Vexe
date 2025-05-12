<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SbayVeXe | @yield('title', 'Trang chủ')</title>

    <meta name="title" content="tieu de" />
    <meta name="description" content="mo ta" />
    <meta name="keywords" content="tu khoa tim kiem 1, tu khoa tim kiem 2,... " />

    <meta property="og:title" content="tieu de">
    <meta property="og:description" content="mo ta" />
    <meta property="og:keywords" content="tu khoa tim kiem 1, tu khoa tim kiem 2,... ">
    <meta property="og:url" content="url san pham">
    <meta property="og:image" content="hinh anh">
    <meta property="og:type" content="website" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/stylesmobile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/lightbox.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        crossorigin="anonymous" />

    {{-- icon --}}
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    {{-- slim select --}}
    <script src="https://unpkg.com/slim-select@latest/dist/slimselect.min.js"></script>
    <link href="https://unpkg.com/slim-select@latest/dist/slimselect.css" rel="stylesheet">
    </link>
    @yield('styles')
</head>

<body>
    @include('layouts.header')

    <div class="content" id="main-content">
        @yield('content')
    </div>

    @include('layouts.footer')
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/lightbox.min.js')}}"></script>
    @stack('page-scripts')
    {{-- user account --}}
    <script src="{{ asset('js/frontend/user.js') }}"></script>
    {{-- login with google  --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @auth
            var userPhone = '{{ Auth::user()->phone ?? 'null' }}';

            if (userPhone === 'null') {
                var myModal = new bootstrap.Modal(document.getElementById('addPhonenumberModal'));
                myModal.show();
            }
        @endauth
        });
    </script>

</body>

</html>
