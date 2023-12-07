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
            <form action="/admin/product/chapter" method="POST">
            @csrf
            <div class="card-body">
                <div class="section-title mt-0">Product Tersedia</div>
                <div class="form-group">
                    <label>Pilih salah satu</label>
                    <select name="related_book" class="form-control" required>
                        <option disabled selected class="text-mute">Pilih Product</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}"><span style="font-weight: bold">{{ $product->name }}</span> / {{ $product->book->title }}</option>
                        @endforeach
                    </select>
                 
                </div>
                
        
                {{-- Assign Chapter --}}
                <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div>
                                <h4>Pilih Chapters</h4>
    
                            </div>
                        </div>
                        <div class="card-body" id="productsContainer">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Chapter yang berkaitan dengan buku</label>
                                        <div class="selectgroup selectgroup-pills" id="checkboxContainer">
                                            {{-- All chapters goes here --}}
                                            
                                        </div>
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
    $(document).ready(function() {
        // Tangani perubahan pada elemen <select>
        $('select[name="related_book"]').change(function() {
            var productId = $(this).val();

            //Kirim permintaan AJAX untuk mendapatkan data terkait
            $.ajax({
                url: '/admin/get-related-chapter', //sesuaikan dengan url
                method: 'GET',
                data: { product_id: productId },
                success: function(data) {
                 
                    // Hapus checkbox yang ada sebelumnya
                    $('#checkboxContainer').empty();

                    // Tambahkan checkbox berdasarkan data yang diterima
                    data.forEach(function(item) {
                      
                        var checkboxHtml = `
                            <label class="selectgroup-item">
                                    <input type="checkbox"
                                        name="selected_chapters[]"
                                        value="${item.id}"
                                        class="selectgroup-input"
                                       >
                                    <span class="selectgroup-button">${item.title}</span>
                                </label>`;

                        $('#checkboxContainer').append(checkboxHtml);
                    });
                },
                error: function(error) {
                    console.error('Error fetching related data:', error);
                }
            });
        });
    });
</script>
@endpush
@endsection