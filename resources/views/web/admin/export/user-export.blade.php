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