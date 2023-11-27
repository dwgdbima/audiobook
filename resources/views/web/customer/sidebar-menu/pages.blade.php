@extends('web.customer.layout.main')

@section('content')
 <!-- Preloader-->
  <div class="header-area" id="headerArea">
    <div class="container h-100 d-flex align-items-center justify-content-between d-flex rtl-flex-d-row-r">
      <!-- Logo Wrapper -->
      <div class="logo-wrapper"><a href="home.html"><img src="img/core-img/logo-small.png" alt=""></a></div>
      <div class="navbar-logo-container d-flex align-items-center">
        <!-- Cart Icon -->
        <div class="cart-icon-wrap"><a href="cart.html"><i class="fa-solid fa-bag-shopping"></i><span>2</span></a></div>
        <!-- User Profile Icon -->
        <div class="user-profile-icon ms-2"><a href="profile.html"><img src="img/bg-img/9.jpg" alt=""></a></div>
        <!-- Navbar Toggler -->
        <div class="suha-navbar-toggler ms-2" data-bs-toggle="offcanvas" data-bs-target="#suhaOffcanvas" aria-controls="suhaOffcanvas">
          <div><span></span><span></span><span></span></div>
        </div>
      </div>
    </div>
  </div>
  <div class="offcanvas offcanvas-start suha-offcanvas-wrap" tabindex="-1" id="suhaOffcanvas" aria-labelledby="suhaOffcanvasLabel">
    <!-- Close button-->
    <button class="btn-close btn-close-white" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    <!-- Offcanvas body-->
    <div class="offcanvas-body">
      <!-- Sidenav Profile-->
      <div class="sidenav-profile">
        <div class="user-profile"><img src="img/bg-img/9.jpg" alt=""></div>
        <div class="user-info">
          <h5 class="user-name mb-1 text-white">Suha Sarah</h5>
          <p class="available-balance text-white">Available points <span class="counter">499</span></p>
        </div>
      </div>
      <!-- Sidenav Nav-->
      <ul class="sidenav-nav ps-0">
        <li><a href="profile.html"><i class="fa-solid fa-user"></i>My Profile</a></li>
        <li><a href="notifications.html"><i class="fa-solid fa-bell lni-tada-effect"></i>Notifications<span class="ms-1 badge badge-warning">3</span></a></li>
        <li class="suha-dropdown-menu"><a href="#"><i class="fa-solid fa-store"></i>Shop Pages</a>
          <ul>
            <li><a href="shop-grid.html">Shop Grid</a></li>
            <li><a href="shop-list.html">Shop List</a></li>
            <li><a href="single-product.html">Product Details</a></li>
            <li><a href="featured-products.html">Featured Products</a></li>
            <li><a href="flash-sale.html">Flash Sale</a></li>
          </ul>
        </li>
        <li><a href="pages.html"><i class="fa-solid fa-file-code"></i>All Pages</a></li>
        <li class="suha-dropdown-menu"><a href="wishlist-grid.html"><i class="fa-solid fa-heart"></i>My Wishlist</a>
          <ul>
            <li><a href="wishlist-grid.html">Wishlist Grid</a></li>
            <li><a href="wishlist-list.html">Wishlist List</a></li>
          </ul>
        </li>
        <li><a href="settings.html"><i class="fa-solid fa-sliders"></i>Settings</a></li>
        <li><a href="intro.html"><i class="fa-solid fa-toggle-off"></i>Sign Out</a></li>
      </ul>
    </div>
  </div>
  <div class="page-content-wrapper py-3">
    <div class="container">
      <ul class="page-nav ps-0">
        <li><a href="home.html">Home<i class="fa-solid fa-caret-right"></i></a></li>
        <li><a href="/">Intro/Flash Screen<i class="fa-solid fa-caret-right"></i></a></li>
        <li class="nav-title">Shop</li>
        <li><a href="shop-grid.html">Shop Grid<i class="fa-solid fa-caret-right"></i></a></li>
        <li><a href="shop-list.html">Shop List<i class="fa-solid fa-caret-right"></i></a></li>
        <li><a href="single-product.html">Product Details<i class="fa-solid fa-caret-right"></i></a></li>
        <li><a href="catagory.html">Catagory<i class="fa-solid fa-caret-right"></i></a></li>
        <li><a href="sub-catagory.html">Sub Catagory<i class="fa-solid fa-caret-right"></i></a></li>
        <li><a href="wishlist-grid.html">Wishlist Grid<i class="fa-solid fa-caret-right"></i></a></li>
        <li><a href="wishlist-list.html">Wishlist List<i class="fa-solid fa-caret-right"></i></a></li>
        <li><a href="flash-sale.html">Flash Sale<i class="fa-solid fa-caret-right"></i></a></li>
        <li><a href="featured-products.html">Featured Products<i class="fa-solid fa-caret-right"></i></a></li>
        <li><a href="my-order.html">Order Status<i class="fa-solid fa-caret-right"></i></a></li>
        <li class="nav-title">Vendor</li>
        <li><a href="vendors.html">Vendors<i class="fa-solid fa-caret-right"></i></a></li>
        <li><a href="vendor-shop.html">Vendor Shop<i class="fa-solid fa-caret-right"></i></a></li>
        <li><a href="become-vendor.html">Become A Vendor<i class="fa-solid fa-caret-right"></i></a></li>
        <li class="nav-title">Cart &amp; Checkout</li>
        <li><a href="cart.html">Cart<i class="fa-solid fa-caret-right"></i></a></li>
        <li><a href="checkout.html">Checkout<i class="fa-solid fa-caret-right"></i></a></li>
        <li><a href="checkout-bank.html">Checkout Bank<i class="fa-solid fa-caret-right"></i></a></li>
        <li><a href="checkout-cash.html">Checkout Cash<i class="fa-solid fa-caret-right"></i></a></li>
        <li><a href="checkout-credit-card.html">Checkout Credit Card<i class="fa-solid fa-caret-right"></i></a></li>
        <li><a href="checkout-payment.html">Checkout Payment<i class="fa-solid fa-caret-right"></i></a></li>
        <li><a href="checkout-paypal.html">Checkout PayPal<i class="fa-solid fa-caret-right"></i></a></li>
        <li><a href="payment-success.html">Payment Success<i class="fa-solid fa-caret-right"></i></a></li>
        <li class="nav-title">Authentication</li>
        <li><a href="login.html">Login<i class="fa-solid fa-caret-right"></i></a></li>
        <li><a href="register.html">Register<i class="fa-solid fa-caret-right"></i></a></li>
        <li><a href="otp.html">OTP Send<i class="fa-solid fa-caret-right"></i></a></li>
        <li><a href="otp-confirm.html">OTP Confirmation<i class="fa-solid fa-caret-right"></i></a></li>
        <li><a href="forget-password.html">Forget Password<i class="fa-solid fa-caret-right"></i></a></li>
        <li><a href="change-password.html">Change Password<i class="fa-solid fa-caret-right"></i></a></li>
        <li><a href="forget-password-success.html">Forget Password Success<i class="fa-solid fa-caret-right"></i></a></li>
        <li class="nav-title">Blog</li>
        <li><a href="blog-grid.html">Blog Grid<i class="fa-solid fa-caret-right"></i></a></li>
        <li><a href="blog-list.html">Blog List<i class="fa-solid fa-caret-right"></i></a></li>
        <li><a href="blog-details.html">Blog Details<i class="fa-solid fa-caret-right"></i></a></li>
        <li class="nav-title">Chat &amp; Notifications</li>
        <li><a href="message.html">Message/Chat<i class="fa-solid fa-caret-right"></i></a></li>
        <li><a href="notifications.html">Notifications<i class="fa-solid fa-caret-right"></i></a></li>
        <li><a href="notification-details.html">Notifications Details<i class="fa-solid fa-caret-right"></i></a></li>
        <li class="nav-title">Miscellaneous</li>
        <li><a href="profile.html">Profile<i class="fa-solid fa-caret-right"></i></a></li>
        <li><a href="edit-profile.html">Edit Profile<i class="fa-solid fa-caret-right"></i></a></li>
        <li><a href="about-us.html">About Us<i class="fa-solid fa-caret-right"></i></a></li>
        <li><a href="contact.html">Contact Us<i class="fa-solid fa-caret-right"></i></a></li>
        <li><a href="offline.html">Offline<i class="fa-solid fa-caret-right"></i></a></li>
        <li><a href="language.html">Select Language<i class="fa-solid fa-caret-right"></i></a></li>
        <li><a href="privacy-policy.html">Privacy Policy<i class="fa-solid fa-caret-right"></i></a></li>
        <li><a href="settings.html">Settings<i class="fa-solid fa-caret-right"></i></a></li>
        <li><a href="support.html">Support<i class="fa-solid fa-caret-right"></i></a></li>
      </ul>
    </div>
  </div>
  <!-- Internet Connection Status-->
  <div class="internet-connection-status" id="internetStatus"></div>
  <!-- Footer Nav-->
  <div class="footer-nav-area" id="footerNav">
    <div class="suha-footer-nav">
      <ul class="h-100 d-flex align-items-center justify-content-between ps-0 d-flex rtl-flex-d-row-r">
        <li><a href="home.html"><i class="fa-solid fa-house"></i>Home</a></li>
        <li><a href="message.html"><i class="fa-solid fa-comment-dots"></i>Chat</a></li>
        <li><a href="cart.html"><i class="fa-solid fa-bag-shopping"></i>Basket</a></li>
        <li><a href="settings.html"><i class="fa-solid fa-gear"></i>Settings</a></li>
        <li><a href="pages.html"><i class="fa-solid fa-heart"></i>Pages</a></li>
      </ul>
    </div>
  </div>
@endsection