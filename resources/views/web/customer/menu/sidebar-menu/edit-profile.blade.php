@extends('web.customer.layout.main')

@section('content')
<div class="page-content-wrapper">
    <div class="container">
      <!-- Profile Wrapper-->
      <div class="profile-wrapper-area py-3">
        <form action="/customer/profile/edit" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
        <!-- User Information-->
        <div class="card user-info-card">
          <div class="card-body p-4 d-flex align-items-center">
           <div class="user-profile me-3">
            <img id="profile-pic" src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : asset('dist/img/human/default-profile.png') }}" alt="" style="height: 75px; width:75px">
            
              <div class="change-user-thumb">
                
                  <input class="form-control-file" type="file" onchange="uploadPicture(event)" name="profile_picture">
                  <button><i class="fa-solid fa-pen"></i></button>
               
              </div>
            </div>
            <div class="user-info">
              <p class="mb-0 text-dark">@designing-world</p>
              <h5 class="mb-0">Suha Jannat</h5>
            </div>
            @error('profile_picture')
           
          </div>
          <div class="text-danger mx-auto">
            {{ $message }}
          </div>
      @enderror
        </div>
        <!-- User Meta Data-->
        <div class="card user-data-card">
          <div class="card-body">
          
              <div class="mb-3">
                <div class="title mb-2"><i class="fa-solid fa-user"></i><span>Nama Kamu</span></div>
                <input class="form-control" type="text" value="{{ $user->name }}" name="name">
                @error('name')
                    <div class="text-danger">
                      {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="mb-3">
                <div class="title mb-2"><i class="fa-solid fa-phone"></i><span>No.Handphone</span></div>
                <input class="form-control" type="text" value="{{ $user->phone }}" name="phone">
                @error('phone')
                <div class="text-danger">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="mb-3">
                <div class="title mb-2"><i class="fa-solid fa-envelope"></i><span>Email</span></div>
                <input class="form-control" type="email" value="{{ $user->email }}" disabled>
              </div>
              <div class="mb-3">
                <div class="title mb-2"><i class="fa-solid fa-location-arrow"></i><span>Alamat</span></div>
                <input class="form-control" type="text" value="{{ $user->address }}" name="address">
                @error('address')
                <div class="text-danger">
                  {{ $message }}
                </div>
               
                @enderror

             
              </div>
              <button class="btn btn-success w-100" type="submit">Simpan Perubahan</button>
            </form>
          </div>
        </div>
      </div>
    </div>
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