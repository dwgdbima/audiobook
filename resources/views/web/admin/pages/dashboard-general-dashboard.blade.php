@extends('web.admin.layouts.app')

@section('title', 'General Dashboard')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('dist/admin/library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('dist/admin/library/summernote/dist/summernote-bs4.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Dashboard</h1>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="far fa-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total User</h4>
                            </div>
                            <div class="card-body">
                                {{ $totalCustomer }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="far fa-newspaper"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Transaksi</h4>
                            </div>
                            <div class="card-body">
                                {{ $successOrder }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="far fa-file"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Affiliator</h4>
                            </div>
                            <div class="card-body">
                               {{ $totalAffiliator }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-circle"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>User Aktif</h4>
                            </div>
                            <div class="card-body">
                                {{ $activeUsers }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Statistik Penjualan</h4>
                            <div class="card-header-action">
                                <div class="btn-group">
                                    <a onclick="statistikType('daily')" type="button"
                                        id="daily-chart"
                                        class="btn">Daily</a>
                                    <a onclick="statistikType('month')" type="button"
                                        id="month-chart"
                                        class="btn">Month</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="myChart"
                                height="182"></canvas>
                            <div class="statistic-details mt-sm-4">
                                <div class="statistic-details-item">
                                    <span class="text-muted"><span class=""><i
                                                class="{{ $selling['daily']['percentage'] > 0 ? 'fas fa-caret-up text-primary' : 'fas fa-caret-down text-danger' }}"></i></span> {{ $selling['daily']['percentage'] }}%</span>
                                    <div class="detail-value">@money($selling['daily']['range'][1] , 'IDR' , true)</div>
                                    <div class="detail-name">Today's Sales</div>
                                </div>
                        
                                <div class="statistic-details-item">
                                    <span class="text-muted"><span class=""><i
                                                class="{{ $selling['monthly']['percentage'] > 0 ? 'fas fa-caret-up text-primary' : 'fas fa-caret-down text-danger' }}"></i></span>{{ $selling['monthly']['percentage'] }}%</span>
                                    <div class="detail-value">@money($selling['monthly']['range'][1] , 'IDR' , true)</div>
                                    <div class="detail-name">This Month's Sales</div>
                                </div>
                              
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Transaksi Terbaru</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled list-unstyled-border">
                              @foreach ($fiveOrders as $order)
                                <li class="media">
                                    <img class="rounded-circle mr-3"
                                        width="50"
                                        src="{{ asset('dist/img/human/default-profile.png') }}"
                                        alt="avatar">
                                    <div class="media-body">
                                        <div class="text-primary float-right">{{ $order['created_at']->diffForHumans() }}</div>
                                        <div class="media-title">{{ $order['name'] }}</div>
                                        @foreach ($order['data'] as $book => $item)
                                        <span class="text-muted text-small">
                                            {{ $book }} - {{ $item['product'] }} - (@money($item['price'] , 'IDR', true ))
                                        </span>
                                        <br>
                                    @endforeach
                                     
                                    </div>
                                </li>
                              @endforeach
                               
                            </ul>
                            {{-- <div class="pt-1 pb-1 text-center">
                                <a href="#"
                                    class="btn btn-primary btn-lg btn-round">
                                    View All
                                </a>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
          

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Penjualan</h4>
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

        </section>
    </div>


    {{-- Order Modal --}}
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
    <script src="{{ asset('dist/admin/library/simpleweather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('dist/admin/library/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('dist/admin/library/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('dist/admin/library/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('dist/admin/library/summernote/dist/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('dist/admin/library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('dist/admin/js/page/index-0.js') }}"></script>


    <script src="{{ asset('dist/admin/library/jquery-ui-dist/jquery-ui.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('dist/admin/js/page/components-table.js') }}"></script>

    {{-- modal --}}
    <script src="{{ asset('dist/admin/library/prismjs/prism.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('dist/admin/js/page/bootstrap-modal.js') }}"></script>


    <script>

        $(document).ready(function() {
            statistikType('daily')
        })

        const statistikType = (type) => {
            let labelsData = []
            let range = []
           if(type == 'daily'){
            document.querySelector('#daily-chart').classList.add('btn-primary')
            document.querySelector('#month-chart').classList.remove('btn-primary')

            labelsData = ["{{ $selling['daily']['labels'][0] }}", "{{ $selling['daily']['labels'][1] }}"];
            range = [{{ $selling['daily']['range'][0] }} , {{ $selling['daily']['range'][1] }}]
            setTimeout(() => {
                chart(labelsData, range)
            }, 50);
           } else {
            document.querySelector('#month-chart').classList.add('btn-primary')
            document.querySelector('#daily-chart').classList.remove('btn-primary')

            labelsData = ["{{ $selling['monthly']['labels'][0] }}", "{{ $selling['monthly']['labels'][1] }}"];
            range = [{{ $selling['monthly']['range'][0] }} , {{ $selling['monthly']['range'][1] }}]
            setTimeout(() => {
                chart(labelsData, range)
            }, 50);
           }
        }

    let myChart = null

   const chart = (labelsData, range) => {
    "use strict";

        if(myChart instanceof Chart){
            myChart.destroy()
        }

        const statistics_chart = document.getElementById("myChart").getContext('2d');
        
        myChart = new Chart(statistics_chart, {
        type: 'line',
        data: {
            //["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"]
            labels: [labelsData[0] , labelsData[1]],
            datasets: [{
            label: 'Statistics',
            data: [range[0], range[1]],
            borderWidth: 5,
            borderColor: '#6777ef',
            backgroundColor: 'transparent',
            pointBackgroundColor: '#fff',
            pointBorderColor: '#6777ef',
            pointRadius: 4
            }]
        },
        options: {
            legend: {
            display: false
            },
            scales: {
            yAxes: [{
                gridLines: {
                display: false,
                drawBorder: false,
                },
                ticks: {
                stepSize: 150000
                }
            }],
            xAxes: [{
                gridLines: {
                color: '#fbfbfb',
                lineWidth: 2
                }
            }]
            },
        }
        });

      
        

   }
    </script>
@endpush
