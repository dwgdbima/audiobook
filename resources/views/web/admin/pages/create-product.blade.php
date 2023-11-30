@extends('web.admin.layouts.app')

@push('style')

@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4>Pilih Buku Yang Ingin di Assign</h4>
            </div>
            <form action="/admin/product" method="POST">
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
                                <h4>Buat Product</h4>
    
                            </div>
                            <button type="button" class="btn btn-success" id="addProduct">Tambah Product</button>
                        </div>
                        <div class="card-body" id="productsContainer">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Product</label>
                                        <input type="text"
                                            class="form-control"
                                            name="products[0][name]"
                                            placeholder="Bundle X"
                                            required="">
                            
                                        @error('products.*.name')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    </div>
                                </div>
                            
                                <div class="col-md-6">
                                    <div class="form-group mb-0">
                                        <label>Harga</label>
                                        <div class="input-group">
                                            <input type="number"
                                                class="form-control"
                                                name="products[0][price]"
                                                required>
                                            <button type="button" id="remove" class="btn btn-danger">-</button>
                                        </div>
                                    
                                        @error('products.*.price')
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
        let index = 1
        // Menangani penambahan elemen
        $('#addProduct').click(function () {

           let html = ''
           html += ` <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Product</label>
                                        <input type="text"
                                            class="form-control"
                                            name="products[${index}][name]"
                                            placeholder="Bundle X"
                                            required="">
                            
                                        @error('products.*.name')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    </div>
                                </div>
                            
                                <div class="col-md-6">
                                    <div class="form-group mb-0">
                                        <label>Harga</label>
                                        <div class="input-group">
                                            <input type="number"
                                                class="form-control"
                                                name="products[${index}][price]"
                                                required>
                                            <button type="button" id="remove" class="btn btn-danger removeProduct">-</button>
                                        </div>
                                    
                                        @error('products.*.price')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            
                               
                            </div>`
            $('#productsContainer').append(html)
            index += 1
            
        });

        // Menangani pengurangan elemen
        $(document).on('click', '.removeProduct', function() {
        
            $(this).closest('.row').remove();
            index -= 1
        });
    });
</script>
@endpush
@endsection