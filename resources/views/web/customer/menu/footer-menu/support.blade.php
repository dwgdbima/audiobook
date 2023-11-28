@extends('web.customer.layout.main')

@section('content')
  <!-- Header Area-->
  <div class="header-area" id="headerArea">
    <div class="container h-100 d-flex align-items-center justify-content-between rtl-flex-d-row-r">
      <!-- Back Button-->
      <div class="back-button me-2"><a href="/setting"><i class="fa-solid fa-arrow-left-long"></i></a></div>
      <!-- Page Title-->
      <div class="page-heading">
        <h6 class="mb-0">Support</h6>
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
      <!-- Support Wrapper-->
      <div class="support-wrapper py-3">
        <div class="card">
          <div class="card-body">
            <h4 class="faq-heading text-center">How can we help you with?</h4>
            <!-- Search Form-->
            <form class="faq-search-form" action="#" method="">
              <input class="form-control" type="search" name="search" placeholder="Search">
              <button type="submit"><i class="fa fa-search"></i></button>
            </form>
          </div>
        </div>
        <!-- Accordian Area Wrapper-->
        <div class="accordian-area-wrapper mt-3">
          <!-- Accordian Card-->
          <div class="card accordian-card">
            <div class="card-body">
              <h5 class="accordian-title">For Buyers</h5>
              <div class="accordion" id="accordion1">
                <!-- Single Accordian-->
                <div class="accordian-header" id="headingOne">
                  <button class="d-flex align-items-center justify-content-between w-100 collapsed btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne"><span><i class="fa-solid fa-bicycle"></i>How to get started?</span><i class="fa-solid fa-angle-right"></i></button>
                </div>
                <div class="collapse" id="collapseOne" aria-labelledby="headingOne" data-bs-parent="#accordion1">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero excepturi tempore exercitationem porro dignissimos.</p>
                </div>
                <!-- Single Accordian-->
                <div class="accordian-header" id="headingTwo">
                  <button class="d-flex align-items-center justify-content-between w-100 collapsed btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><span><i class="fa-solid fa-cart-shopping"></i>How to buy a product?</span><i class="fa-solid fa-angle-right"></i></button>
                </div>
                <div class="collapse" id="collapseTwo" aria-labelledby="headingTwo" data-bs-parent="#accordion1">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero excepturi tempore exercitationem porro dignissimos.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Accordian Area Wrapper-->
        <div class="accordian-area-wrapper mt-3">
          <!-- Accordian Card-->
          <div class="card accordian-card seller-card">
            <div class="card-body">
              <h5 class="accordian-title">For Authors</h5>
              <div class="accordion" id="accordion2">
                <!-- Single Accordian-->
                <div class="accordian-header" id="headingThree">
                  <button class="d-flex align-items-center justify-content-between w-100 collapsed btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"><span><i class="fa-solid fa-cloud-arrow-down"></i>How can upload a product?</span><i class="fa-solid fa-angle-right"></i></button>
                </div>
                <div class="collapse" id="collapseThree" aria-labelledby="headingThree" data-bs-parent="#accordion2">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero excepturi tempore exercitationem porro dignissimos.</p>
                </div>
                <!-- Single Accordian-->
                <div class="accordian-header" id="headingFour">
                  <button class="d-flex align-items-center justify-content-between w-100 collapsed btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour"><span><i class="fa-solid fa-dollar-sign"></i>Commission structure</span><i class="fa-solid fa-angle-right"></i></button>
                </div>
                <div class="collapse" id="collapseFour" aria-labelledby="headingFour" data-bs-parent="#accordion2">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero excepturi tempore exercitationem porro dignissimos.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Accordian Area Wrapper-->
        <div class="accordian-area-wrapper mt-3">
          <!-- Accordian Card-->
          <div class="card accordian-card others-card">
            <div class="card-body">
              <h5 class="accordian-title">Others</h5>
              <div class="accordion" id="accordion3">
                <!-- Single Accordian-->
                <div class="accordian-header" id="headingFive">
                  <button class="d-flex align-items-center justify-content-between w-100 collapsed btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive"><span><i class="fa-solid fa-arrow-right-from-bracket"></i>How to return a product?</span><i class="fa-solid fa-angle-right"></i></button>
                </div>
                <div class="collapse" id="collapseFive" aria-labelledby="headingFive" data-bs-parent="#accordion3">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero excepturi tempore exercitationem porro dignissimos.</p>
                </div>
                <!-- Single Accordian-->
                <div class="accordian-header" id="headingSix">
                  <button class="d-flex align-items-center justify-content-between w-100 collapsed btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix"><span><i class="fa-solid fa-face-frown"></i>My product is misleading?</span><i class="fa-solid fa-angle-right"></i></button>
                </div>
                <div class="collapse" id="collapseSix" aria-labelledby="headingSix" data-bs-parent="#accordion3">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero excepturi tempore exercitationem porro dignissimos.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Internet Connection Status-->
  <div class="internet-connection-status" id="internetStatus"></div>
  <!-- Footer Nav-->
 
@endsection