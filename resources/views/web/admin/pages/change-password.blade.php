@extends('web.admin.layouts.app')


@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="page-content-wrapper">
            <div class="container">
              <div class="profile-wrapper-area py-3">
                <!-- User Information-->
                <div class="card user-info-card">
                  <div class="card-body p-4 d-flex align-items-center mx-auto">
                    <div class="user-profile me-3"><img class="object-fit-cover" id="profile-pic" src="{{ auth()->user()->profile_picture }}" alt="" style="height: 75px;"></div>
                   
                  </div>
                </div>
                <!-- User Meta Data-->
                <div class="card user-data-card">
                  <div class="card-body">
                    <form action="/admin/change-password" method="POST">
                        @csrf
                        @method('PUT')
                      <div class="mb-3">
                        <div class="title mb-2"><i class="fa-solid fa-key"></i><span>Password Lama</span></div>
                        <input class="form-control" required type="password" name="old_password">
                      </div>
                      <div class="mb-3">
                        <div class="title mb-2"><i class="fa-solid fa-key"></i><span>Password Baru</span></div>
                        <input class="input-psswd form-control @error('email') is-invalid @enderror" id="registerPassword" type="password" placeholder="Password" name="password" required>
                        @error('password')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                      </div>
                      <div class="mb-3">
                        <div class="title mb-2"><i class="fa-solid fa-key"></i><span>Ulangi Password Baru </span></div>
                        <input class="form-control" required type="password" name="password_confirmation">
                      </div>
                      <button class="btn btn-primary w-100" type="submit">Update Password</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </section>
</div>

@endsection