@extends('web.customer.layout.main')
@push('styles')
<style>
    .accordion-item{
        margin-bottom: 15px;
        border-radius: 0.375rem;
    }
    .accordion-item:first-of-type {
        border-radius: 0.375rem;
    }

    .accordion-item:not(:first-of-type) {
        border-radius: 0.375rem;
        border: var(--bs-accordion-border-width) solid var(--bs-accordion-border-color);
    }

    .accordion-header{
        padding: 1rem 1.23rem;
    }
</style>
@endpush
@section('content')
<div class="page-content-wrapper">
    <div class="product-slide-wrapper">
        <!-- Product Slides-->
        <div class="product-slides owl-carousel">
            <!-- Single Hero Slide-->
            <div class="single-product-slide" style="background-image: url({{$book->cover}})"></div>
        </div>
    </div>
    <div class="product-description pb-3">
        <!-- Product Title & Meta Data-->
        <div class="product-title-meta-data bg-white mb-3 py-3">
            <div class="container d-flex justify-content-between rtl-flex-d-row-r">
                <div class="p-title-price">
                    <h5 class="mb-1">{{$book->title}}</h5>
                    {{-- <p class="sale-price mb-0 lh-1">$38<span>$41</span></p> --}}
                    <span><strong>Author</strong> &minus; {{$book->author}}</span>
                </div>
            </div>
            <!-- Ratings-->
            <div class="product-ratings">
                <div class="container d-flex align-items-center justify-content-between rtl-flex-d-row-r">
                    <div class="ratings">
                        @for ($i = 1; $i <= 5; $i++)
                        @if($i <= floor($book->review_point))
                        <i class="fa-solid fa-star"></i>
                        @elseif ($i == floor($book->review_point) + 1)
                        @if(($book->review_point - floor($book->review_point)) < 0.3)
                        <i class="fa-regular fa-star"></i>
                        @elseif(($book->review_point - floor($book->review_point)) < 0.7)
                        <i class="fa-solid fa-star-half-stroke"></i>
                        @else
                        <i class="fa-solid fa-star"></i>
                        @endif
                        @else
                        <i class="fa-regular fa-star"></i>
                        @endif
                        @endfor
                        <span class="ps-1">{{$book->review_amount}} ratings</span>
                    </div>
                    <div class="total-result-of-ratings"><span>{{$book->review_point}}</span><span>Very Good </span></div>
                </div>
            </div>
        </div>
        <!-- Product Specification-->
        <div class="p-specification bg-white mb-3 py-3">
            <div class="container">
                <h6>Deskripsi</h6>
                {!! $book->desc !!}
            </div>
        </div>
        
        <div class="p-specification bg-white mb-3 py-3">
            <div class="container">
                <h6>Beli Audio Book</h6>
                <div class="accordion" id="accordionExample">
                    @foreach ($products as $product)
                    <div class="accordion-item">
                        <div class="accordion-header" id="heading-{{$product->id}}">
                            <h2 style="margin-bottom: 0;">{{$product->name}}</h2>
                            <span class="text-success"><strong>@money($product->price, 'IDR', true)</strong></span> &minus; <span>{{$product->chapters->count()}} Chapter</span>
                            <div class="d-flex justify-content-end">
                                <button class="btn btn-info" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse-{{$i}}" aria-expanded="true" aria-controls="collapse-{{$i}}">
                                    Detail</button>
                                <form action="{{route('customer.carts.store')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                    <button type="submit" class="btn btn-success ms-1"><i class="fas fa-shopping-cart"></i></button>
                                </form>
                            </div>
                        </div>
                        <div id="collapse-{{$i}}" style="border-top:1px solid #dee2e6" class="accordion-collapse collapse {{$i == 0 ? 'show' : ''}}" aria-labelledby="heading-{{$i}}"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <ul class="list-group list-group-flush">
                                    @foreach ($product->chapters as $chapter)
                                    <li class="list-group-item">{{$chapter->title}}</li>
                                    @endforeach
                                  </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Rating & Review Wrapper -->
        <div class="rating-and-review-wrapper bg-white py-3 mb-3 dir-rtl">
            <div class="container">
                <h6>Rating &amp; Reviews</h6>
                <div class="rating-review-content">
                    <ul class="ps-0">
                        @foreach ($reviews as $key => $reviewChunk)
                        <!-- Single User Review -->

                            <div class="single-user-review" id="each-review-chunk{{ $key }}" style="{{ $key == 0 ? 'display: block;' : 'display: none;' }}">
                                {{-- Each chunked review --}}

                                @foreach ($reviewChunk as $key => $review)
                                <li class="single-user-review d-flex">
                                    <div class="user-thumbnail"><img src="{{asset('dist/img/bg-img/7.jpg')}}" alt=""></div>
                                    <div class="rating-comment">
                                        <span class="name-date"><strong>{{$review->user->name == auth()->user()->name ? 'Review kamu' : $review->user->name}}</strong>, {{$review->created_at->format('d M Y')}}</span>
                                        <div class="rating">
                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($i <= $review->point)
                                                <i class="fa-solid fa-star"></i>
                                                @else
                                                <i class="fa-regular fa-star"></i>
                                                @endif
                                            @endfor
                                        </div>                            
                                        <p id="excerpt{{ $review->id }}" class="comment mb-0" style="display: block">{{ Str::limit($review->comment, 50, '....') }}</p>
                                        <p id="full-text{{ $review->id }}" class="comment mb-0" style="display: none">{{ $review->comment }}</p>
                                      
                                        @if (strlen($review->comment) > 50)
                                          <div onclick="toggleExcerpt({{ $review->id }})">
                                            <a type="button" id="read-more{{ $review->id }}" class=" text-decoration-none">Lebih banyak...</a>
                                            <a type="button" id="read-all{{ $review->id }}" class=" text-decoration-none" style="display:none;">Lebih sedikit...</a>
                                          </div>
                                        @endif
                                        
                                    </div>
                                </li>
                                @endforeach
                            </div>
                       
                        @endforeach

                        {{-- parameter current chunk id to display --}}
                        @php
                            $chunkId = 0;
                        @endphp

                    </ul>
                   
                    <div class="d-flex justify-content-center align-items-center w-100">
                        <button id="load-more" class="btn btn-secondary mt-3 w-75">Show More</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Ratings Submit Form-->
        <div class="ratings-submit-form bg-white py-3 dir-rtl">
            <div class="container">
                <h6>Tulis Review Anda</h6>
                <form action="/customer/comment" method="POST">
                    @csrf
                    <div class="stars mb-3">
                        <input class="star-1" type="radio" name="star" id="star1" value="1">
                        <label class="star-1" for="star1"></label>
                        <input class="star-2" type="radio" name="star" id="star2" value="2">
                        <label class="star-2" for="star2"></label>
                        <input class="star-3" type="radio" name="star" id="star3" value="3">
                        <label class="star-3" for="star3"></label>
                        <input class="star-4" type="radio" name="star" id="star4" value="4">
                        <label class="star-4" for="star4"></label>
                        <input class="star-5" type="radio" name="star" id="star5" value="5">
                        <label class="star-5" for="star5"></label><span></span>
                        <input type="hidden" name="book" value="{{ $book->id }}" readonly>
                    </div>
                    <textarea class="form-control mb-3" id="comments" name="comment" cols="30" rows="10"
                        data-max-length="200" placeholder="Tulis review anda..."></textarea>
                    <button class="btn btn-primary" type="submit">Simpan Review</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@push('scripts')
    <script>

        function addToCart(product_id)
        {
            $.post("{{route('customer.carts.store')}}", {product_id: product_id}, function(data){
                console.log(data);
            })
        }

      // code rizky
    
      //excerpt
    const toggleExcerpt = (reviewId) => {
     
        $(document).ready(function() {
            $('#excerpt' + reviewId + ', #full-text' + reviewId).toggle();
            $('#read-more' + reviewId + ', #read-all' + reviewId).toggle();
        });
    }


    //show more
      let showedChunk = {{ $chunkId }}
    
    $('#load-more').on('click', async function() {
       
        showedChunk += 1;
        for (let i = 1; i <= showedChunk; i++) {
            document.querySelector('#each-review-chunk' + i).style.display = 'block';
        }

        
    });

    </script>
@endpush
