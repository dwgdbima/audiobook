@extends('web.admin.layouts.app')

@section('title', 'Profile')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="page-content-wrapper">
            <div class="container">
              <!-- Profile Wrapper-->
              <div class="profile-wrapper-area py-3">
                <!-- User Information-->
                <div class="card user-info-card">
                    <div class="card-body p-4 d-flex align-items-end mx-auto position-relative" style="height: 100px;">
                        <div class="user-profile me-3 ">
                            <img id="profile-pic"  src="{{ auth()->user()->profile_picture }}" alt="" class="border border-dark rounded-circle" style="width: 75px; height: 75px;">
                           
                        </div>
                    
                    </div>
                  
                </div>
                <!-- User Meta Data-->
                <div class="card user-data-card ">
                  <div class="card-body" style="font-size: 1 rem;">
                    <div class="single-profile-data d-flex align-items-center justify-content-between mb-4">
                      <div class="title d-flex align-items-center"><i class="fa-solid fa-user"></i><span >Nama Anda</span></div>
                      <div class="data-content">{{ $user->name }}</div>
                    </div>
                    <div class="single-profile-data d-flex align-items-center justify-content-between mb-4">
                      <div class="title d-flex align-items-center"><i class="fa-solid fa-phone"></i><span >No.Handphone</span></div>
                      <div class="data-content">{{ $user->phone }}</div>
                    </div>
                    <div class="single-profile-data d-flex align-items-center justify-content-between mb-4">
                      <div class="title d-flex align-items-center"><i class="fa-solid fa-envelope"></i><span >Email</span></div>
                      <div class="data-content">{{ $user->email }}                               </div>
                    </div>
                    <div class="single-profile-data d-flex align-items-center justify-content-between">
                      <div class="title d-flex align-items-center"><i class="fa-solid fa-location-dot"></i><span >Alamat</span></div>
                      <div class="data-content">{{ $user->address }}</div>
                    </div>
                    
                    <!-- Edit Profile-->
                    <div class="edit-profile-btn mt-3"><a class="btn btn-primary w-100" href="/admin/profile/edit"><i class="fa-solid fa-pen me-2"></i><span class="ml-1">Edit Profile</span></a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </section>
</div>
@endsection