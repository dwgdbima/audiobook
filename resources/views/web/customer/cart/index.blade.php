@extends('web.customer.layout.main')
@push('styles')

@endpush
@section('content')
<div class="page-content-wrapper">
    <div class="container">
        <!-- Cart Wrapper-->
        <div class="cart-wrapper-area py-3">
            <div class="cart-table card mb-3">
                <div class="table-responsive card-body">
                    <table class="table mb-0">
                        <tbody>
                            @foreach ($carts as $cart)
                            <tr>
                                <td><a href="#">{{$cart->product->name}}<span>@money($cart->product->price, 'IDR', true)</span></a></td>
                                <th scope="row">
                                    <a class="remove-product" href="#" onclick="event.preventDefault();
                                    document.getElementById('delete-{{$cart->id}}').submit();"><i class="fa-solid fa-xmark"></i></a>
                                    <form id="delete-{{$cart->id}}" action="{{route('customer.carts.destroy', $cart->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Coupon Area-->
            {{-- <div class="card coupon-card mb-3">
                <div class="card-body">
                    <div class="apply-coupon">
                        <h6 class="mb-0">Have a coupon?</h6>
                        <p class="mb-2">Enter your coupon code here &amp; get awesome discounts!</p>
                        <div class="coupon-form">
                            <form action="#">
                                <input class="form-control" type="text" placeholder="SUHA30">
                                <button class="btn btn-primary" type="submit">Apply</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!-- Cart Amount Area-->
            <div class="card cart-amount-area">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <h5 class="total-price mb-0">@money($carts->sum('product.price'), 'IDR', true)</h5><a class="btn btn-warning"
                        href="checkout.html">Checkout Now</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')

@endpush