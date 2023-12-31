@extends('web.admin.layouts.app')

@section('title', 'Lihat semua affiliator')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Data seluruh affiliator</h1>
               
            </div>

            <div class="section-body">
               
               
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Berikut data-data affiliator...</h4>
                                <div class="card-header-form d-flex">
                                       
                                    <div class="btn-group mr-2" role="group" aria-label="Basic example">
                                        <a href="/admin/affiliate/export?mimeType=xlsx" class="btn btn-primary"  data-mdb-ripple-init>XLSX</a>

                                        <a href="/admin/affiliate/export?mimeType=csv" class="btn btn-success"  data-mdb-ripple-init>CSV</a>
                                      </div>

                                    <form action="/admin/affiliate" method="GET">
                                        <div class="input-group">
                                            <input type="text"
                                                class="form-control"
                                                name="s_name"
                                                placeholder="Cari berdasarkan nama affiliator...">
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
                                            
                                           
                                        </tr>
                                        @foreach ($affiliators as $data)
                                        <tr>
                                            <td class="p-0 text-center">
                                               {{ $loop->iteration }}
                                            </td>
                                            <td>{{ $data->user->name }}</td>
                                            <td class="align-middle">
                                                {{ $data->user->email }}
                                            </td>
                                            <td>
                                               {{ $data->user->phone }}
                                            </td>
                                           
                                           
                                        </tr>
                                        @endforeach
                                    </table>

                                    <div class="p-4">
                                        {{ $affiliators->links() }}
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
