@extends('web.auth.main')

@section('content')
<div class="row justify-content-center">
    <div class="col-10 col-lg-8"><img class="big-logo" src="{{asset('dist/img/core-img/logo-white.png')}}" alt="">
        <!-- Login Form-->
        <div class="register-form mt-5">
            <form action="{{ route('password.email') }}" method="POST">
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
                <button class="btn btn-warning btn-lg w-100" type="submit">Kirim link reset password</button>
            </form>
        </div>
        <!-- Login Meta-->
        <div class="login-meta-data">
            <p class="mt-3 mb-0">Balik ke halaman <a class="mx-1"
                    href="{{ route('login') }}">login</a></p>
        </div>
    </div>
</div>
@endsection
