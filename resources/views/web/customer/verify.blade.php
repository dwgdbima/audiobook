@extends('web.customer.layout.main')

@section('content')
<div class="page-content-wrapper">
    <div class="container">
        <!-- Profile Wrapper-->
        <div class="profile-wrapper-area py-3">
            <!-- User Information-->
            <div class="card user-info-card">
                <div class="card-body p-4 d-flex align-items-center">
                    <div class="user-info">
                        <h5 class="mb-0">Hi, {{auth()->user()->name}}</h5>
                    </div>
                </div>
            </div>
            <!-- User Meta Data-->
            <div class="card user-data-card">
                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            Link verifikasi baru telah dikirim ke email anda.
                        </div>
                    @endif
                    <p>sebelum beraktifitas, silahkan cek email anda untuk melakukan verifikasi.</p>
                    <p>Jika belum mendapatkan email verifikasi <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('klik disini untuk mengirim ulang') }}</button>.
                    </form></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection