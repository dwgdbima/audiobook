@extends('web.admin.layouts.app')

@push('style')
<link rel="stylesheet"
href="{{ asset('dist/admin/library/summernote/dist/summernote-bs4.css') }}">
<link rel="stylesheet"
href="{{ asset('dist/admin/library/codemirror/lib/codemirror.css') }}">
<link rel="stylesheet"
href="{{ asset('dist/admin/library/codemirror/theme/duotone-dark.css') }}">
<link rel="stylesheet"
href="{{ asset('dist/admin/library/selectric/public/selectric.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="mx-auto">
            <div class="card">
                <form action="/admin/book/{{$book->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-header">
                        <h4>Manage Buku</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Judul Buku</label>
                            <input type="text"
                                class="form-control"
                                name="title"
                                value="{{ old('title' , $book->title) }}"
                                required="">

                                @error('title')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label>Author</label>
                            <input type="text"
                                class="form-control"
                                name="author"
                                placeholder="Subiakto"
                                value="{{ old('author' , $book->author) }}"
                                required="">

                                @error('author')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>
                
                        <div class="form-group ">
                            <label>Deskripsi Buku</label>
                            <textarea class="summernote-simple"
                            name="desc"
                               
                                required="">{!! old('desc' , $book->desc) !!}</textarea>

                                @error('desc')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                                
                        </div>

                        <div class="w-25">
                            <img id="cover-pic" src="{{ $book->cover ??  asset('dist/img/human/default-profile.png') }}" class="object-fit-cover mb-2" style="width: 200px; height:200px;" alt="">
                        </div>

                        <div class="form-group mb-0">
                            <label>Foto Sampul</label>
                            <input type="file"
                                class="form-control"
                                name="cover"
                                onchange="uploadPicture(event)"
                                
                               >

                                @error('cover')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>


            {{-- Bundle & Chapters --}}
            <div class="card">
               
                    <div class="card-header">
                        <h4>Manage Products & Chapters</h4>
                    </div>
                    <div class="card-body">
                        <div class="col-sm-12">
                            <form action="/admin/book/product/chapter" method="POST">
                                @csrf
                                @method('PUT')
                            @foreach ($book->products as $key => $products)
                            <div class="text-center" style="font-weight:bold">
                                {{ $products->name }}
                            </div>
                           
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Nama Product</label>
                                            <input type="hidden" name="products[{{ $key }}][product_id]" value="{{ $products->id }}" readonly>
                                            <input type="hidden" name="book_id" value="{{ $book->id }}" readonly>
                                            <input type="text"
                                                class="form-control"
                                                name="products[{{ $key }}][name]"
                                                value="{{ $products->name }}"
                                                required="">
                            
                                            @error('products.*.name')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                            
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Harga</label>
                                            <input type="text"
                                                class="form-control"
                                                name="products[{{ $key }}][price]"
                                                value="{{ $products->price }}"
                                                required="">
                            
                                            @error('products.*.price')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                            
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Total Chapters</label>
                                            <input type="text"
                                                class="form-control"
                                                disabled
                                                value="{{ old('title3', $products->chapters->count()) }}"
                                                >
                            
                                            @error('title3')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                               <div class="d-flex flex-wrap">
                                @foreach ($products->chapters as $chapters)
                                <div class="selectgroup selectgroup-pills" id="checkboxContainer">
                                    <label class="selectgroup-item">
                                        <input type="checkbox"
                                            name="products[{{ $key }}][unselect_chapters][]"
                                            value="{{ $chapters->id }}"
                                            class="selectgroup-input"
                                           >
                                        <span class="selectgroup-button">{{ $chapters->title }}</span>
                                    </label>
                                    
                                </div>
                                
                                @endforeach
                               </div>

                               
                            <hr>
                                @endforeach
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                            </div>
                           
                        </div>
                     

                     
                  
            </div>

            {{-- Idle Chapter --}}
            <div class="card">
               
                <div class="card-header">
                    <h4>Manage Idle Chapters</h4>
                </div>
                <div class="card-body">
                    <div class="col-sm-12">
                        <div class="d-flex flex-wrap">
                            @foreach ($idle_chapters->chapters as $chapters)
                            <div class="selectgroup selectgroup-pills" id="checkboxContainer">
                                <label class="selectgroup-item">
                                    <input type="checkbox"
                                        name=""
                                        value="{{ $chapters->id }}"
                                        class="selectgroup-input"
                                       >
                                    <span class="selectgroup-button">{{ $chapters->title }}</span>
                                </label>
                                
                            </div>
                            
                            @endforeach
                           </div>
                        </div>
                       
                    </div>
                 

                 
              
        </div>
        </div>
    </section>
</div>


@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('dist/admin/library/summernote/dist/summernote-bs4.js') }}"></script>
    <script src="{{ asset('dist/admin/library/codemirror/lib/codemirror.js') }}"></script>
    <script src="{{ asset('dist/admin/library/codemirror/mode/javascript/javascript.js') }}"></script>
    <script src="{{ asset('dist/admin/library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->

    <script>
        const uploadPicture = (event) => {
            const blob = event.target.files[0]
            
            document.querySelector('#cover-pic').src = URL.createObjectURL(blob)
    
        }
    </script>
@endpush

@endsection