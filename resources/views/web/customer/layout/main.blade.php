<!DOCTYPE html>
<html lang="en">

@include('web.customer.layout.head')

<body>
    <!-- Preloader-->
    <div class="preloader" id="preloader">
        <div class="spinner-grow text-secondary" role="status">
            <div class="sr-only"></div>
        </div>
    </div>
    <!-- Header Area -->
    <div class="header-area {{ auth()->user()->hasRole('customer') ? : 'd-none' }}" style="max-width: 480px; margin:auto;" id="headerArea">
        <div class="container h-100 d-flex align-items-center justify-content-between d-flex rtl-flex-d-row-r">
            <!-- Logo Wrapper -->
            <div class="logo-wrapper"><a href="{{route('customer.index')}}"><img src="{{asset('dist/img/core-img/logo-small.png')}}" alt=""></a></div>
            <div class="navbar-logo-container d-flex align-items-center">
                <!-- Cart Icon -->
                <div class="cart-icon-wrap"><a href="{{route('customer.carts.index')}}"><i
                            class="fa-solid fa-bag-shopping"></i><span>{{$cartCount}}</span></a></div>
                <!-- User Profile Icon -->
                <div class="user-profile-icon ms-2"><a href="{{route('customer.profile')}}"><img src="{{ asset(auth()->user()->profile_picture) }}" alt=""></a></div>
                <!-- Navbar Toggler -->
                <div class="suha-navbar-toggler ms-2" data-bs-toggle="offcanvas" data-bs-target="#suhaOffcanvas"
                    aria-controls="suhaOffcanvas">
                    <div><span></span><span></span><span></span></div>
                </div>
            </div>
        </div>
    </div>
   
    <div class="{{ auth()->user()->hasRole('customer') ? : 'd-none' }}">
        @include('web.customer.layout.sidebar')
    </div>
    <!-- PWA Install Alert -->
    <div class="toast pwa-install-alert shadow bg-white" role="alert" aria-live="assertive" aria-atomic="true"
        data-bs-delay="5000" data-bs-autohide="true">
        <div class="toast-body">
            <div class="content d-flex align-items-center mb-2"><img src="{{asset('dist/img/icons/icon-72x72.png')}}" alt="">
                <h6 class="mb-0">Add to Home Screen</h6>
                <button class="btn-close ms-auto" type="button" data-bs-dismiss="toast" aria-label="Close"></button>
            </div><span class="mb-0 d-block">Add Suha on your mobile home screen. Click the<strong class="mx-1">Add to
                    Home Screen</strong>button &amp; enjoy it like a regular app.</span>
        </div>
    </div>
    @yield('content')
    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>

    <div class="{{ auth()->user()->hasRole('customer') ? : 'd-none' }}">
        @include('web.customer.layout.footer')
    </div>

</body>

</html>