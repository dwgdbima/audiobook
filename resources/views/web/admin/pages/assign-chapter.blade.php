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
            <select name="book_id" class="form-control" required>
                <option disabled selected class="text-mute">Pilih Buku</option>
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
                <div class="card-header d-flex justify-content-between">
                    <div>
                        <h4>Posting Chapters</h4>
                        <p class="text-muted">Silahkan masukkan judul chapter secara langsung, chapter otomatis diurutkan dari urutan form</p>
                    </div>
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
                                    placeholder="Cara Untuk Ternak Uang"
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
                    <button class="btn btn-primary">Posting</button>
                    <p class="text-muted" style="font-style: italic">File besar memakan lebih banyak waktu</p>
                </div>
            
        </div>
       
    </div>
</form>
</div>
    </section>
</div>

@push('scripts')
<script>
    let maximumForm = 1
    $(document).ready(function () {
        // Menangani penambahan elemen
        $('#addChapter').click(function () {

            if (maximumForm >= 5) {
                return false
            }

           let html = ''
           html += `  <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Judul Chapter</label>
                                <input type="text"
                                    class="form-control"
                                    name="chapters[][title]"
                                    placeholder="Cara Untuk Ternak Uang"
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
            maximumForm += 1
        });

        // Menangani pengurangan elemen
        $(document).on('click', '.removeChapter', function() {
            if (maximumForm == 1) {
                return false
            }

            $(this).closest('.row').remove();
            maximumForm -= 1
        });
    });
</script>
@endpush

@endsection