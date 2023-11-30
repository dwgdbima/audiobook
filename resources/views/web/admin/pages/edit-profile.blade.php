@extends('web.admin.layouts.app')

@section('title', 'Edit Profile')

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
                <form action="/admin/profile/edit" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                <!-- User Information-->
                <div class="card user-info-card">
                    <div class="card-body p-4 d-flex align-items-center mx-auto">
                     <div class="user-profile me-3 position-relative">
                      <img id="profile-pic" src="{{ auth()->user()->profile_picture }}" class="rounded-circle" alt="" style="height: 75px;">
                      
                      <div class="change-user-thumb position-absolute " style="margin-top: -20px; z-index:10">
                        <label for="prof-pic" class="rounded-circle border p-1 px-2 shadow-lg bg-secondary"><i class="fa-solid fa-pen"></i></label>
                        <input id="prof-pic" class="form-control-file d-none" type="file" onchange="uploadPicture(event)" name="profile_picture">
                    </div>
                      </div>
                    
                    </div>
                    @error('profile_picture')
                    <div class="text-danger mx-auto">
                        {{ $message }}
                    </div>
                @enderror
                  </div>
              
                <!-- User Meta Data-->
                <div class="card user-data-card">
                  <div class="card-body">
                  
                      <div class="mb-3">
                        <div class="title mb-2"><i class="fa-solid fa-user"></i><span class="ml-3">Nama Anda</span></div>
                        <input class="form-control" type="text" value="{{ $user->name }}" name="name">
                        @error('name')
                            <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <div class="title mb-2"><i class="fa-solid fa-phone"></i><span class="ml-3">No.Handphone</span></div>
                        <input class="form-control" type="text" value="{{ $user->phone }}" name="phone">
                        @error('phone')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <div class="title mb-2"><i class="fa-solid fa-envelope"></i><span class="ml-3">Email</span></div>
                        <input class="form-control" type="email" value="{{ $user->email }}" disabled>
                      </div>
                      <div class="mb-3">
                        <div class="title mb-2"><i class="fa-solid fa-location-arrow"></i><span class="ml-3">Alamat</span></div>
                        <input class="form-control" type="text" value="{{ $user->address }}" name="address">
                        @error('address')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                       
                        @enderror
        
                      </div>
                      <button class="btn btn-primary w-100" type="submit">Simpan Perubahan</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>

    </section>
</div>
        
@push('scripts')
<script>
    const uploadPicture = (event) => {
        const blob = event.target.files[0]
        
        document.querySelector('#profile-pic').src = URL.createObjectURL(blob)

    }
</script>
@endpush
@endsection