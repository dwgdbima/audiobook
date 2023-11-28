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
                    <h5 class="mb-0">Riwayat Transaksi</h5>
                    {{-- <p class="mb-2">Enter your coupon code here &amp; get awesome discounts!</p> --}}
                    <table class="table mb-0">
                        <tbody>
                            @foreach ($orders as $order)
                            <tr>
                                <td><a href="#">#{{$order->code}}</a></td>
                                <td>@money($order->orderDetails->sum('product.price'), 'IDR', true)</td>
                                <td>
                                    @if ($order->status == 0)
                                    <span class="badge badge-warning">pending</span>
                                    @elseif ($order->status == 1)
                                    <span class="badge badge-success">sukses</span>
                                    @else
                                    <span class="badge badge-danger">batal</span>
                                    @endif
                                </td>
                                <td scope="row"><a class="btn btn-primary btn-sm" style="color: #fff" href="{{route('customer.orders.show', $order->id)}}">detail</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')

@endpush