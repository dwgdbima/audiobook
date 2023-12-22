<div class="card-body p-0">
                            
  {{--   @if ($soldProduct !== null)
    <div class="sold-product text-center">
        <h5 style="color:gray">Total paket {{ request('product_select') }} belum dibayar sebanyak {{ $soldProduct }}</h5>
    </div>
    @endif --}}

    <div class="table-responsive">
        <h3 style="text-align:center">Daftar Pesanan {{ $status }}</h3>
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
                @foreach ($data->orderDetails as $item)
                <td>
                    {{ $item->product->name }} , @money($item->product->price, 'IDR' , true).
            
                </td>
            @endforeach
            </tr>
            @endforeach
        </table>

    </div>
</div>