@extends('web.admin.layouts.app')

@section('title', 'Lihat data pesanan')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Data seluruh pesanan</h1>
               
            </div>

            <div class="section-body">
               
               
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Berikut data-data order belum lunas...... </h4>
                                <div class="card-header-form">
                                    <form action="/admin/orders/unpaid" id="search-form" method="GET" class="d-flex">
                                        <div class="btn-group mr-2" role="group" aria-label="Basic example">
                                            <a href="{{ request('product_select') && request('product_select') != 'default' ? '/admin/order-product/export?mimeType=xlsx&status=0&product=' . request('product_select') : '/admin/order/export?mimeType=xlsx&status=0' }}" class="btn btn-primary"  data-mdb-ripple-init>XLSX</a>
    
                                            <a href="{{ request('product_select') && request('product_select') != 'default' ? '/admin/order-product/export?mimeType=csv&status=0&product=' . request('product_select') : '/admin/order/export?mimeType=csv&status=0' }}" class="btn btn-success"  data-mdb-ripple-init>CSV</a>
                                          </div>


                                        <div class="w-50 mr-2">
                                            <select style="height: 30px; padding:5px" name="product_select" id="product-select" class="form-control" >
                                                 <option value="default" style="font-size: 12px">Pilih Paket</option>
                                                @foreach ($products as $product)
                                                    <option value="{{ $product->id }}" {{ $product->id != request('product_select') ? : 'selected' }} style="font-size: 12px">{{ $product->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="input-group">
                                            <input type="text"
                                                class="form-control"
                                                name="ord_code"
                                                placeholder="Cari berdasarkan kode order...">
                                            <div class="input-group-btn">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card-body p-0">
                            
                                @if ($soldProduct !== null)
                                <div class="sold-product text-center">
                                    <h5 style="color:gray">Total paket {{ request('product_select') }} belum dibayar sebanyak {{ $soldProduct }}</h5>
                                </div>
                                @endif

                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <tr>
                                            <th>
                                                No
                                            </th>
                                            <th>Kode</th>
                                            <th>Nama Pemesan</th>
                                            <th>Email</th>
                                            <th>No.Handphone</th>
                                            <th>Detail Pesanan</th>
                                        </tr>
                                        @foreach ($orders as $data)
                                        <tr>
                                            <td class="p-0 text-center">
                                               {{ $loop->iteration }}
                                            </td>
                                            <td>{{ $data->code }}</td>
                                            <td class="align-middle">
                                                {{ $data->user->name }}
                                            </td>
                                            <td>
                                               {{ $data->user->email }} 
                                            </td>
                                            <td>
                                                {{ $data->user->phone }}
                                            </td>
                                            <td><a type="button"
                                                    data-toggle="modal"
                                                    data-target="#orderModal{{ $data->id }}"
                                                    class="btn btn-secondary">Detail</a></td>
                                        </tr>
                                        @endforeach
                                    </table>

                                    <div class="p-4">
                                        {{ $orders->links() }}
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
@foreach ($orders as $orderDetail)
<div class="modal fade"
tabindex="-1"
role="dialog"
id="orderModal{{ $orderDetail->id }}">
<div class="modal-dialog"
    role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Detail Order ({{ $orderDetail->code }})</h5>
            <button type="button"
                class="close"
                data-dismiss="modal"
                aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            @foreach ($orderDetail->orderDetails as $detail)
            <div class="card">
                <div class="card-header">
                    <h4>Informasi Order {{ $loop->iteration }}</h4>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">

                        <li class="list-group-item d-flex justify-content-between">
                            <strong>Produk</strong>
                            <span>{{ $detail->product->name }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                           <strong>Judul</strong>
                            <span>{{ $detail->product->book->title }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                           <strong>Harga</strong>
                            <span>@money($detail->product->price , 'IDR' , true)</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <strong>Status</strong>
                             <span>{{ $orderDetail->status ? 'Terbayar' : 'Belum Terbayar' }}</span>
                         </li>
                    </ul>
                </div>
            </div>
            @endforeach
        </div>
        <div class="modal-footer bg-whitesmoke br">
            <button type="button"
                class="btn btn-secondary"
                data-dismiss="modal">Close</button>
           
        </div>
    </div>
</div>
</div>
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
            $('#product-select').change(function() {
                var selectedOption = $(this).val();
                console.log('Nilai opsi yang dipilih: ' + selectedOption);
                $('#search-form').submit(); // Ganti 'form-id' dengan ID formulir yang sesuai
            });
        });
    </script>

@endpush
