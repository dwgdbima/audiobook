<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no"
        name="viewport">
        <title>Audio Book - Admin - Subiakto Priosoedarsono</title>

    <!-- General CSS Files -->
    <link rel="stylesheet"
        href="{{ asset('dist/admin/library/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer" />
    <link rel="icon" href="{{ asset('dist/img/icons/icon-72x72.png') }}">
    @stack('style')

    <!-- Template CSS -->
    <link rel="stylesheet"
        href="{{ asset('dist/admin/css/style-admin.css') }}">
    <link rel="stylesheet"
        href="{{ asset('dist/admin/css/components.css') }}">
    

       
        <link rel="stylesheet" href="{{ asset('dist/css/animate.css') }}">
       
        <link rel="stylesheet" href="{{ asset('dist/css/brands.min.css') }}">
        <link rel="stylesheet" href="{{ asset('dist/css/solid.min.css') }}">
        <link rel="stylesheet" href="{{ asset('dist/css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('dist/css/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ asset('dist/css/nice-select.css') }}">
        <!-- Stylesheet -->
       {{--  <link rel="stylesheet" href="{{ asset('dist/style.css') }}"> --}}
        <!-- Web App Manifest -->
        <link rel="manifest" href="{{ asset('dist/manifest.json') }}">

    <!-- Start GA -->
    <script async
        src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- END GA -->
</head>
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <!-- Header -->
            @include('web.admin.components.header')

            <!-- Sidebar -->
            @include('web.admin.components.sidebar')

            <!-- Content -->
            @yield('main')

            
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('dist/admin/library/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('dist/admin/library/popper.js/dist/umd/popper.js') }}"></script>
    <script src="{{ asset('dist/admin/library/tooltip.js/dist/umd/tooltip.js') }}"></script>
    <script src="{{ asset('dist/admin/library/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('dist/admin/library/jquery.nicescroll/dist/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('dist/admin/library/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('dist/admin/js/stisla.js') }}"></script>
    
    @include('sweetalert::alert')

    {{-- Pwa --}}
    <script src="{{ asset('dist/js/theme-switching.js') }}"></script>

    <script src="{{ asset('dist/js/pwa.js') }}"></script>
    @stack('scripts')

    <!-- Template JS File -->
    <script src="{{ asset('dist/admin/js/scripts.js') }}"></script>
    <script src="{{ asset('dist/admin/js/custom.js') }}"></script>
</body>

</html>
