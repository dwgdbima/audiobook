@extends('web.customer.layout.main')
@push('styles')
    
@endpush
@section('content')
<div class="page-content-wrapper">
    <div class="container">
      <!-- Checkout Wrapper-->
      <div class="checkout-wrapper-area py-3">
        <div class="credit-card-info-wrapper"><img class="d-block mb-4" src="{{asset('dist/img/bg-img/ipaymu.png')}}" alt="">
          <div class="bank-ac-info">
            <p>Silahkan lakukan pembayaran melalui ipaymu pament gateway. anda akan di alihkan ke halaman pembayaran.</p>
            <ul class="list-group mb-3">
                @foreach ($order->orderDetails as $orderDetail)
                <li class="list-group-item d-flex justify-content-between align-items-center border-0 border-bottom">{{$orderDetail->product->name}}<span>@money($orderDetail->product->price, 'IDR', true)</span></li>
                @endforeach
              <li class="list-group-item d-flex justify-content-between align-items-center border-0">Total<span>@money($order->orderDetails->sum('product.price'), 'IDR', true)</span></li>
            </ul>
          </div>
          @if ($order->status == 0)
          <a class="btn btn-warning btn-lg w-100" target="_blank" href="{{$order->payment_url}}">Bayar Sekarang</a>
          @elseif ($order->status == 1)
          <a class="btn btn-success btn-lg w-100" target="_blank" href="#">Lunas</a>
          @else
          <a class="btn btn-danger btn-lg w-100" target="_blank" href="#">Batal</a>
          @endif
        </div>
      </div>
    </div>
  </div>
@endsection
@push('scripts')
    
@endpush