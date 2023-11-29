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
                                <h4>Any description goes here...</h4>
                                <div class="card-header-form">
                                    <form action="/admin/orders" method="GET">
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
                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <tr>
                                            <th>
                                                No
                                            </th>
                                            <th>Kode</th>
                                            <th>Nama Pemesan</th>
                                            <th>Email/No.Handphone</th>
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
                                               {{ $data->user->email }} / {{ $data->user->phone }}
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

@endpush
