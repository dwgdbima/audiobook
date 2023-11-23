@extends('web.customer.layout.main')
@section('content')
<div class="page-content-wrapper">
    <!-- Search Form-->
    <div class="container">
        {{-- <div class="section-heading d-flex align-items-center justify-content-between dir-rtl">
            <h6>Weekly Best Sellers</h6><a class="btn p-0" href="shop-list.html">
               View All<i class="ms-1 fa-solid fa-arrow-right-long"></i></a>
        </div> --}}
        <div class="row g-2" style="margin-top: 60px !important;">
            @foreach ($books as $book)
            <div class="col-12">
                <div class="horizontal-product-card">
                    <div class="d-flex align-items-center">
                        <div class="product-thumbnail-side">
                            <a class="product-thumbnail shadow-sm d-block" style="background-image: url({{$book->cover}})"
                                href="single-product.html"></a>
                        </div>
                        <div class="product-description">
                            <a class="product-title d-block" href="single-product.html">{{$book->title}}</a>
                            <p class="sale-price"><strong>Author:</strong>  {{$book->author}}</p>
                            <div class="product-rating"><i class="fa-solid fa-star"></i>{{$book->review_point}} <span class="ms-1">({{$book->review_amount}}
                                    review)</span></div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection