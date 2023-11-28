@extends('web.customer.layout.main')

@section('content')
  <!-- Header Area-->
  <div class="header-area" id="headerArea">
    <div class="container h-100 d-flex align-items-center justify-content-between rtl-flex-d-row-r">
      <!-- Back Button-->
      <div class="back-button me-2"><a href="/setting"><i class="fa-solid fa-arrow-left-long"></i></a></div>
      <!-- Page Title-->
      <div class="page-heading">
        <h6 class="mb-0">Change Password</h6>
      </div>

      <!-- Navbar Toggler-->
      <div class="suha-navbar-toggler ms-2" data-bs-toggle="offcanvas" data-bs-target="#suhaOffcanvas" aria-controls="suhaOffcanvas">
        <div><span></span><span></span><span></span></div>
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
  <div class="page-content-wrapper">
    <div class="container">
      <div class="profile-wrapper-area py-3">
        <!-- User Information-->
        <div class="card user-info-card">
          <div class="card-body p-4 d-flex align-items-center">
            <div class="user-profile me-3"><img src="img/bg-img/9.jpg" alt=""></div>
            <div class="user-info">
              <p class="mb-0 text-dark">@designing-world</p>
              <h5 class="mb-0">Suha Jannat</h5>
            </div>
          </div>
        </div>
        <!-- User Meta Data-->
        <div class="card user-data-card">
          <div class="card-body">
            <form action="/customer/change-password" method="POST">
                @csrf
                @method('PUT')
              <div class="mb-3">
                <div class="title mb-2"><i class="fa-solid fa-key"></i><span>Old Password</span></div>
                <input class="form-control" type="password" name="old_password">
              </div>
              <div class="mb-3">
                <div class="title mb-2"><i class="fa-solid fa-key"></i><span>New Password</span></div>
                <input class="input-psswd form-control @error('email') is-invalid @enderror" id="registerPassword" type="password" placeholder="Password" name="password">
                @error('password')
                {{ $message }}
            @enderror
              </div>
              <div class="mb-3">
                <div class="title mb-2"><i class="fa-solid fa-key"></i><span>Repeat New Password</span></div>
                <input class="form-control" type="password" name="password_confirmation">
              </div>
              <button class="btn btn-success w-100" type="submit">Update Password</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Internet Connection Status-->
  <div class="internet-connection-status" id="internetStatus"></div>
  <!-- Footer Nav-->
 
@endsection