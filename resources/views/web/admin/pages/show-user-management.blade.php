@extends('web.admin.layouts.app')

@section('title', 'Lihat semua pelanggan')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Data seluruh pengguna Suha</h1>
               
            </div>

            <div class="section-body">
               
               
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Any description goes here...</h4>
                                <div class="card-header-form">
                                    <form action="/admin/users" method="GET">
                                        <div class="input-group">
                                            <input type="text"
                                                class="form-control"
                                                name="s_name"
                                                placeholder="Cari berdasarkan nama...">
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
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>No.Handphone</th>
                                            <th>Total Review</th>
                                            <th>Total Order</th>
                                           
                                        </tr>
                                        @foreach ($customers as $data)
                                        <tr>
                                            <td class="p-0 text-center">
                                               {{ $loop->iteration }}
                                            </td>
                                            <td>{{ $data->name }}</td>
                                            <td class="align-middle">
                                                {{ $data->email }}
                                            </td>
                                            <td>
                                               {{ $data->phone }}
                                            </td>
                                            <td>
                                                {{ $data->total_reviews }}
                                            
                                            </td>
                                            <td>
                                                {{ $data->total_orders }}
                                            </td>
                                           
                                        </tr>
                                        @endforeach
                                    </table>

                                    <div class="p-4">
                                        {{ $customers->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
             
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('dist/admin/library/jquery-ui-dist/jquery-ui.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('dist/admin/js/page/components-table.js') }}"></script>
@endpush
