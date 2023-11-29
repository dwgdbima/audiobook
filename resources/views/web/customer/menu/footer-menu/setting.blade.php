@extends('web.customer.layout.main')

@section('content')
<div class="page-content-wrapper">
  <div class="container">
    <div class="settings-wrapper py-3">
      <!-- Single Setting Card-->
      <div class="card settings-card">
        <div class="card-body">
          <!-- Single Settings-->
          <div class="single-settings d-flex align-items-center justify-content-between">
            <div class="title"><i class="fa-solid fa-moon"></i><span>Night Mode</span></div>
            <div class="data-content">
              <div class="toggle-button-cover">
                <div class="button r">
                  <input class="checkbox" id="darkSwitch" type="checkbox">
                  <div class="knobs"></div>
                  <div class="layer"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Single Setting Card-->
      <div class="card settings-card">
        <div class="card-body">
          <!-- Single Settings-->
          <div class="single-settings d-flex align-items-center justify-content-between">
            <div class="title"><i class="fa-solid fa-paragraph"></i><span>RTL Mode</span></div>
            <div class="data-content">
              <div class="toggle-button-cover">
                <div class="button r">
                  <input class="checkbox" id="rtlSwitch" type="checkbox">
                  <div class="knobs"></div>
                  <div class="layer"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     
     
      <!-- Single Setting Card-->
      <div class="card settings-card">
        <div class="card-body">
          <!-- Single Settings-->
          <div class="single-settings d-flex align-items-center justify-content-between">
            <div class="title"><i class="fa-solid fa-circle-question"></i><span>Support</span></div>
            <div class="data-content"><a href="/customer/support">Get Help<i class="fa-solid fa-angle-right"></i></a></div>
          </div>
        </div>
      </div>
      <!-- Single Setting Card-->
      <div class="card settings-card">
        <div class="card-body">
          <!-- Single Settings-->
          <div class="single-settings d-flex align-items-center justify-content-between">
            <div class="title"><i class="fa-solid fa-shield"></i><span>Privacy Policy</span></div>
            <div class="data-content"><a href="/customer/privacy-policy">View<i class="fa-solid fa-angle-right"></i></a></div>
          </div>
        </div>
      </div>
      <!-- Single Setting Card-->
      <div class="card settings-card">
        <div class="card-body">
          <!-- Single Settings-->
          <div class="single-settings d-flex align-items-center justify-content-between">
            <div class="title"><i class="fa-solid fa-key"></i><span>Password</span></div>
            <div class="data-content"><a href="/customer/change-password">Change<i class="fa-solid fa-angle-right"></i></a></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection