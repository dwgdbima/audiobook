<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, viewport-fit=cover, shrink-to-fit=no">
    <meta name="description" content="Audio Book - Subiakto Priosoedarsono">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#100DD1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <!-- The above tags *must* come first in the head, any other head content must come *after* these tags -->
    <!-- Title -->
    <title>Audio Book - Subiakto Priosoedarsono</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">
    <!-- Favicon -->
    <link rel="icon" href="{{asset('dist/img/icons/icon-72x72.png')}}">
    <!-- Apple Touch Icon -->
    <link rel="apple-touch-icon" href="{{asset('dist/img/icons/icon-96x96.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('dist/img/icons/icon-152x152.png')}}">
    <link rel="apple-touch-icon" sizes="167x167" href="{{asset('dist/img/icons/icon-167x167.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('dist/img/icons/icon-180x180.png')}}">
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/brands.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/solid.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/nice-select.css') }}">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{asset('dist/style.css')}}">
    <!-- Web App Manifest -->
    {{-- <link rel="manifest" href="{{asset('dist/manifest.json')}}"> --}}
  </head>
  <body>
    <!-- Preloader-->
    <div class="preloader" id="preloader">
      <div class="spinner-grow text-secondary" role="status">
        <div class="sr-only"></div>
      </div>
    </div>
    <!-- Login Wrapper Area-->
    <div class="login-wrapper d-flex align-items-center justify-content-center text-center">
      <!-- Background Shape-->
      <div class="background-shape"></div>
      <div class="container">
        @yield('content')
      </div>
    </div>
    <!-- All JavaScript Files-->
    <script src="{{asset('dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('dist/js/jquery.min.js')}}"></script>
    <script src="{{asset('dist/js/waypoints.min.js')}}"></script>
    <script src="{{asset('dist/js/jquery.easing.min.js')}}"></script>
    <script src="{{asset('dist/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('dist/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('dist/js/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('dist/js/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('dist/js/jquery.passwordstrength.js')}}"></script>
    <script src="{{asset('dist/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('dist/js/theme-switching.js')}}"></script>
    <script src="{{asset('dist/js/active.js')}}"></script>
    {{-- <script src="{{asset('dist/js/pwa.js')}}"></script> --}}
    @include('sweetalert::alert')
  </body>
</html>