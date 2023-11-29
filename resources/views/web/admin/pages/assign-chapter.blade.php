@extends('web.admin.layouts.app')


@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
<div class="main-content">
    <section class="section">
     
<div class="card">
    <div class="card-header">
        <h4>Pilih Buku Untuk Ditambahkan Chapter</h4>
    </div>
    <form action="/admin/chapter" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card-body">
        <div class="section-title mt-0">Buku Tersedia</div>
        <div class="form-group">
            <label>Pilih salah satu</label>
            <select name="book_id" class="form-control">
                <option disabled selected>Buku tersedia</option>
                @foreach ($books as $book)
                    <option value="{{ $book->id }}">{{ $book->title }}</option>
                @endforeach
            </select>
            @error('book_id')
             <div class="text-danger">
                {{ $message }}    
            </div>   
            @enderror
        </div>
        

        {{-- Assign Chapter --}}
        <div class="card">
                <div class="card-header">
                    <h4>Posting Chapters</h4>
                    <button type="button" class="btn btn-success" id="addChapter">Tambah Chapter</button>
                </div>
                <div class="card-body" id="chaptersContainer">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Judul Chapter</label>
                                <input type="text"
                                    class="form-control"
                                    name="chapters[][title]"
                                    required="">
                    
                                @error('chapters.*.title')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                            </div>
                        </div>
                    
                        <div class="col-md-6">
                            <div class="form-group mb-0">
                                <label>Audio</label>
                                <div class="input-group">
                                    <input type="file"
                                        class="form-control"
                                        name="chapters[][audio]"
                                        required>
                                    <button type="button" id="remove" class="btn btn-danger">-</button>
                                </div>
                            
                                @error('chapters.*.audio')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    
                       
                    </div>
                    
                </div>
                
                <div class="card-footer text-right">
                    <button class="btn btn-primary">Submit</button>
                </div>
            
        </div>
       
    </div>
</form>
</div>
    </section>
</div>

@push('scripts')
<script>
    $(document).ready(function () {
        // Menangani penambahan elemen
        $('#addChapter').click(function () {
           let html = ''
           html += `  <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Judul Chapter</label>
                                <input type="text"
                                    class="form-control"
                                    name="chapters[][title]"
                                    required="">
                    
                                @error('chapters.*.title')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                            </div>
                        </div>
                    
                        <div class="col-md-6">
                            <div class="form-group mb-0">
                                <label>Audio</label>
                                <div class="input-group">
                                    <input type="file"
                                        class="form-control"
                                        name="chapters[][audio]"
                                        required>
                                    <button type="button" id="remove" class="btn btn-danger removeChapter">-</button>
                                </div>
                            
                                @error('chapters.*.audio')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    
                       
                    </div>`
            $('#chaptersContainer').append(html)
        });

        // Menangani pengurangan elemen
        $(document).on('click', '.removeChapter', function() {
            $(this).closest('.row').remove();
        });
    });
</script>
@endpush

@endsection