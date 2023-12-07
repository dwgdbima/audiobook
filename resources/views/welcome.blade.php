@extends('web.auth.main')

@section('content')
 <!-- Preloader-->
 <div class="intro-wrapper-2 d-flex align-items-center justify-content-center text-center" style="margin-bottom: 5rem;">
    <div class="container"><img class="big-logo rounded" src="{{ asset('dist/img/human/subiakto-intro.jpg') }}" alt="subiakto-image"></div>
  </div>
  <div class="get-started-btn"><a class="btn btn-warning btn-lg w-100" href="{{route('login')}}">Beli Audiobook Sekarang</a></div>
  
@endsection
