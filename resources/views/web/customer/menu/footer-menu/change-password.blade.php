@extends('web.customer.layout.main')

@section('content')
<div class="page-content-wrapper">
  <div class="container">
    <div class="profile-wrapper-area py-3">
      <!-- User Information-->
      <div class="card user-info-card">
        <div class="card-body p-4 d-flex align-items-center">
          <div class="user-profile me-3"><img class="object-fit-cover" id="profile-pic" src="{{ auth()->user()->profile_picture ? asset('storage/' . auth()->user()->profile_picture) : asset('dist/img/human/default-profile.png') }}" alt="" style="height: 75px; width:75px"></div>
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
              <div class="text-danger">
                {{ $message }}
              </div>
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
@endsection