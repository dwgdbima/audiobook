@extends('web.customer.layout.main')

@section('content')
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
@endsection