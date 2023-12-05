@extends('web.admin.layouts.app')

@section('title', 'Lihat data pesanan')

@push('style')
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

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Data seluruh buku</h1>
               
            </div>

            <div class="section-body">
               
               
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Any description goes here...</h4>
                                <div class="card-header-form">
                                    <form action="/admin/books" method="GET">
                                        <div class="input-group">
                                            <input type="text"
                                                class="form-control"
                                                name="s_name"
                                                placeholder="Cari berdasarkan judul buky...">
                                            <div class="input-group-btn">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <tr>
                                            <th>
                                                No
                                            </th>
                                            <th>Judul</th>
                                            <th>Author</th>
                                            <th>Total Review & Rating</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                        @foreach ($books as $data)
                                        <tr>
                                            <td class="p-0 text-center">
                                               {{ $loop->iteration }}
                                            </td>
                                            <td>{{ $data->title }}</td>
                                            <td class="align-middle">
                                                {{ $data->author }}
                                            </td>
                                            <td>
                                               {{ $data->review_amount }} / {{ $data->review_point }}
                                            </td>
                                            <td class="d-flex justify-content-center" style="height: 30px">
                                                <a type="button"
                                                    data-toggle="modal"
                                                    data-target="#bookModal{{ $data->id }}"
                                                    class="btn btn-secondary mr-2">Detail</a>
                                                <a href="/admin/book/{{ $data->id }}/manage"
                                                    class="btn btn-secondary mr-2">Manage</a>
                                                <a href="/admin/product/{{ $data->id }}"
                                                    class="btn btn-secondary">Show</a>
                                                </td>
                                               
                                        </tr>
                                        @endforeach
                                    </table>

                                    <div class="p-4">
                                        {{ $books->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
             
            </div>
        </section>
    </div>

{{-- Modal --}}
@foreach ($books as $bookDetail)
<div class="modal fade"
tabindex="-1"
role="dialog"
id="bookModal{{ $bookDetail->id }}">
<div class="modal-dialog"
role="document">
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Detail Buku {{ $bookDetail->title }}</h5>
        <button type="button"
            class="close"
            data-dismiss="modal"
            aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="card">
            <div class="card-header">
                <h4>{{ $bookDetail->title }}</h4>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">

                    <li class="list-group-item">
                        <strong>Deskripsi</strong>
                        <span>{!! $bookDetail->desc !!}</span>
                    </li>

                    <li class="list-group-item mx-auto text-center">
                        <strong class="">Cover Buku</strong>
                        <div>
                            <img src="{{ asset($bookDetail->cover) }}" class="rounded-lg object-fit-cover" style="height: 200px; width: 200px" alt="">
                        </div>
                    </li>

                    <li class="list-group-item mx-auto">
                       <div class="text-center">
                        <strong class="text-center">Detail Products & Chapters</strong>
                       </div>
                        <div>
                         
                           @foreach ($bookDetail->products as $prodKey => $product)
                   
                            <div class="accordion-item" id="bundle{{ $bookDetail->id }}{{ $prodKey }}" style="{{ $prodKey < 3 ? 'display:block' : 'display:none' }}">
                                <div class="accordion-header d-flex justify-content-between" id="heading">
                                   <div>
                                    <h2 style="margin-bottom: 0;">{{$product->name}}</h2>
                                    <span class="text-success"><strong>@money($product->price, 'IDR', true)</strong></span> &minus; <span>{{$product->chapters->count()}} Chapter</span>
                                   </div>
                                    <div class="d-flex justify-content-end" style="height: 50%">
                                        <button class="btn btn-info showDetail" type="button">
                                            Detail</button>
                                    </div>
                                </div>
                                <div  style="border-top:1px solid #dee2e6; display:none" class="accordion-collapse chaptersDetail">
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
                       
                        <div class="d-flex justify-content-center align-items-center w-100">
                            <button onclick="showBundles({{ $bookDetail->id }} , {{ $prodKey ?? 0 }})" id="load-more-bundle" class="btn btn-secondary mt-3 w-75">Show More Bundles</button>
                        </div>
                        </div>
                    </li>
                  
                </ul>
            </div>
        </div>
    </div>
    <div class="modal-footer bg-whitesmoke br">
        <button type="button"
            class="btn btn-secondary"
            data-dismiss="modal">Close</button>
        
    </div>
</div>
</div>
</div>

@php
    $eachBundle = 3;
@endphp
@endforeach


@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('dist/admin/library/jquery-ui-dist/jquery-ui.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('dist/admin/js/page/components-table.js') }}"></script>

    {{-- modal --}}
    <script src="{{ asset('dist/admin/library/prismjs/prism.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('dist/admin/js/page/bootstrap-modal.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.showDetail').click(function() {
                $('.chaptersDetail').toggle('fast')
            })
        })

        let eachBundles = {{ $eachBundle }}
        let currentKey = 0
        let currentId = 0
        const showBundles = (id , key) => {
            if(id != currentId && currentKey != key){
                eachBundles = {{ $eachBundle }}
            }

            currentKey = key
            currentId = id
           
            console.log(id , key)
            eachBundles += 3
        
            for (let k = 0; k < eachBundles; k++) {
                setTimeout(() => {
                    document.querySelector('#bundle' + id + k).style.display = 'block';
                },100); //
            }
           
        }
       
    </script>

@endpush
