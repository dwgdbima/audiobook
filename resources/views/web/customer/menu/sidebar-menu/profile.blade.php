@extends('web.customer.layout.main')

@section('content')
<div class="page-content-wrapper">
    <div class="container">
      <!-- Profile Wrapper-->
      <div class="profile-wrapper-area py-3">
        <!-- User Information-->
        <div class="card user-info-card">
          <div class="card-body p-4 d-flex align-items-center">
            <div class="user-profile me-3"><img src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : asset('dist/img/human/default-profile.png') }}" alt="" style="width: 75px; height:75px;"></div>
            <div class="user-info">
              <p class="mb-0 text-dark">@designing-world</p>
              <h5 class="mb-0">{{ $user->name }}</h5>
            </div>
          </div>
        </div>
        <!-- User Meta Data-->
        <div class="card user-data-card">
          <div class="card-body">
            <div class="single-profile-data d-flex align-items-center justify-content-between">
              <div class="title d-flex align-items-center"><i class="fa-solid fa-user"></i><span>Nama kamu</span></div>
              <div class="data-content">{{ $user->name }}</div>
            </div>
            <div class="single-profile-data d-flex align-items-center justify-content-between">
              <div class="title d-flex align-items-center"><i class="fa-solid fa-phone"></i><span>No.Handphone</span></div>
              <div class="data-content">{{ $user->phone }}</div>
            </div>
            <div class="single-profile-data d-flex align-items-center justify-content-between">
              <div class="title d-flex align-items-center"><i class="fa-solid fa-envelope"></i><span>Email</span></div>
              <div class="data-content">{{ $user->email }}                               </div>
            </div>
            <div class="single-profile-data d-flex align-items-center justify-content-between">
              <div class="title d-flex align-items-center"><i class="fa-solid fa-location-dot"></i><span>Alamat</span></div>
              <div class="data-content">{{ $user->address }}</div>
            </div>
            
            <!-- Edit Profile-->
            <div class="edit-profile-btn mt-3"><a class="btn btn-primary w-100" href="/customer/profile/edit"><i class="fa-solid fa-pen me-2"></i>Edit Profile</a></div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection