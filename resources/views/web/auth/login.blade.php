@extends('web.auth.main')

@section('content')
<div class="row justify-content-center">
    <div class="col-10 col-lg-8"><img class="big-logo" src="img/core-img/logo-white.png" alt="">
        <!-- Login Form-->
        <div class="register-form mt-5">
            <form action="{{ route('login') }}" method="POST">
                @csrf
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
                <button class="btn btn-warning btn-lg w-100" type="submit">Login</button>
            </form>
        </div>
        <!-- Login Meta-->
        <div class="login-meta-data">
            <p class="mt-3 mb-0">Belum punya akun?<a class="mx-1"
                    href="{{ route('register') }}">daftar disini</a></p>
        </div>
        <div class="login-meta-data">
            <p class="mb-0"><a class="mx-1"
                    href="{{ route('password.request') }}">Lupa password?</a></p>
        </div>
    </div>
</div>
@endsection
