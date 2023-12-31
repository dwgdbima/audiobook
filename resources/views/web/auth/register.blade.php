@extends('web.auth.main')

@section('content')
<div class="row justify-content-center">
    <div class="col-10 col-lg-8"><img class="big-logo" src="img/core-img/logo-white.png" alt="">
        <!-- Register Form-->
        <div class="register-form mt-5">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <input type="hidden" name="referral" value="{{request()->input('ref')}}">
                <div class="form-group text-start mb-4"><span>Nama</span>
                    <label for="name"><i class="fa-solid fa-user"></i></label>
                    <input class="form-control @error('name') is-invalid @enderror" id="name" name="name" type="text"
                        placeholder="Masukan Nama Lengkap">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group text-start mb-4"><span>Email</span>
                    <label for="email"><i class="fa-solid fa-at"></i></label>
                    <input class="form-control @error('email') is-invalid @enderror" id="email" type="email"
                        name="email" placeholder="Masukan Email">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group text-start mb-4"><span>No. Telepon</span>
                    <label for="phone"><i class="fa-solid fa-phone"></i></label>
                    <input class="form-control @error('phone') is-invalid @enderror" id="phone" type="text" name="phone"
                        placeholder="Masukan nomor telepon">
                    @error('phone')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group text-start mb-4"><span>Password</span>
                    <label for="password"><i class="fa-solid fa-key"></i></label>
                    <input class="form-control @error('password') is-invalid @enderror" id="password" type="password"
                        name="password" placeholder="Password">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group text-start mb-4"><span>Konfirmasi Password</span>
                    <label for="password_confirmation"><i class="fa-solid fa-key"></i></label>
                    <input class="form-control" id="password_confirmation" type="password" name="password_confirmation"
                        placeholder="Konfirmasi Password">
                </div>
                <button class="btn btn-success btn-lg w-100" style="background-color: #146c43;" type="submit">Daftar</button>
            </form>
        </div>
        <!-- Login Meta-->
        <div class="login-meta-data" style="font-size: 14px;">
            <p class="mt-3 mb-0">Sudah punya akun?<a class="mx-1"
                    href="{{ route('login') }}">Login</a></p>
        </div>
    </div>
</div>
@endsection
