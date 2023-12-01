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
                <form action="/admin/book" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                        <h4>Posting Buku Baru</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Judul Buku</label>
                            <input type="text"
                                class="form-control"
                                name="title"
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
                               
                                required=""></textarea>

                                @error('desc')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                                
                        </div>

                        <div class="w-25">
                            <img id="cover-pic" src="{{ asset('dist/img/human/default-profile.png') }}" class="object-fit-cover mb-2" style="width: 200px; height:200px;" alt="">
                        </div>

                        <div class="form-group mb-0">
                            <label>Foto Sampul</label>
                            <input type="file"
                                class="form-control"
                                name="cover"
                                onchange="uploadPicture(event)"
                                required
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