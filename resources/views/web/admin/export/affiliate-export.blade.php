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