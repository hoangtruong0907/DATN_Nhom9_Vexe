<!doctype html>
<html lang="vi" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    {{-- csrf token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}"> 
    <title>SbayVeXe | @yield('title', 'Title page')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('/template/admin/assets/imges/logo.png') }}">
    {{-- font family: Nunito, sans-serif; --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="{{ asset('/template/admin/assets/css/css2?family=Nunito:wght@400;500;600;700;800&display=swap') }}"
        rel="stylesheet">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('/template/admin/assets/css/perfect-scrollbar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/admin/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/template/admin/assets/css/animate.css') }}">
    <script src="{{ asset('/template/admin/assets/js/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('/template/admin/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('/template/admin/assets/js/tippy-bundle.umd.min.js') }}"></script>
    <script src="{{ asset('/template/admin/assets/js/sweetalert.min.js') }}"></script>
     <!-- Toastr CSS -->
     <link rel="stylesheet" href="{{ asset('/vendor/flasher/toastr.min.css') }}">
    @yield('styles')
</head>

<body x-data="main" class="relative overflow-x-hidden font-nunito text-sm font-normal antialiased"
    :class="[$store.app.sidebar ? 'toggle-sidebar' : '', $store.app.theme === 'dark' || $store.app.isDarkMode ? 'dark' : '',
        $store.app.menu, $store.app.layout, $store.app.rtlClass
    ]">
    <!-- sidebar menu overlay -->
    <div x-cloak="" class="fixed inset-0 z-50 bg-[black]/60 lg:hidden" :class="{ 'hidden': !$store.app.sidebar }"
        @click="$store.app.toggleSidebar()"></div>
    </div>
    <!-- scroll to top button -->
    <div class="fixed bottom-6 z-50 ltr:right-6 rtl:left-6" x-data="scrollToTop">
        <template x-if="showTopButton">
            <button type="button"
                class="btn btn-outline-primary animate-pulse rounded-full bg-[#fafafa] p-2 dark:bg-[#060818] dark:hover:bg-primary"
                @click="goToTop">
                <img src="{{ asset('/template/admin/assets/images/icons/ic_gototop.svg') }}"  alt="Icon">
            </button>
        </template> 
    </div>
    <div class="main-container min-h-screen text-black dark:text-white-dark" :class="[$store.app.navbar]">
        @include('admin.layouts.sidebar')
        <div class="main-content flex flex-col min-h-screen">
            @include('admin.layouts.header')
            <div class="animate__animated p-6" :class="[$store.app.animation]">
                @yield('contents')
            </div>
            @include('admin.layouts.footer')
        </div>
    </div>
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/template/admin/assets/js/alpine-collaspe.min.js') }}"></script>
    <script src="{{ asset('/template/admin/assets/js/alpine-persist.min.js') }}"></script>
    <script defer="" src="{{ asset('/template/admin/assets/js/alpine-ui.min.js') }}"></script>
    <script defer="" src="{{ asset('/template/admin/assets/js/alpine-focus.min.js') }}"></script>
    <script defer="" src="{{ asset('/template/admin/assets/js/alpine.min.js') }}"></script>
    <script src="{{ asset('/template/admin/assets/js/custom.js') }}"></script>
    <!-- Toastr JS -->
    <script src="{{ asset('/vendor/flasher/toastr.min.js') }}"></script> 
    <script>
        document.addEventListener('alpine:init', () => {
            // main section
            Alpine.data('scrollToTop', () => ({
                showTopButton: false,
                init() {
                    window.onscroll = () => {
                        this.scrollFunction();
                    };
                },

                scrollFunction() {
                    if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
                        this.showTopButton = true;
                    } else {
                        this.showTopButton = false;
                    }
                },

                goToTop() {
                    document.body.scrollTop = 0;
                    document.documentElement.scrollTop = 0;
                },
            })); 
        });
    </script>
    @yield('scripts')
</body>

</html>
