
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

    @section('content')

    <h2>Data Transaksi</h2>

    <a href="{{ route('transaksi.create') }}">Kendaraan Masuk</a>

    <table border="1">
        <tr>
            <th>No</th>
            <th>No Polisi</th>
            <th>Areea</th>
            <th>Masuk</th>
            <th>Keluar</th>
            <th>Biaya</th>
            <th>Aksi</th>
        </tr>

        @foreach ($data as $item )
        <tr>
            <td>{{ $sloop->interation }}</td>
            <td>{{ $item->kendaraan->no_polisi }}</td>
            <td>{{ $item->areaParkir->nama_area}}</td>
            <td>{{ $item->waktu_masuk}}</td>
            <td>{{ $item->waktu_keluar ?? '-' }}</td>
            <td>

                <a href="{{ route('transaksi.show', $item->id) }}">Detail</a>
                
                @if(!$item->waktu_keluar)
                <form merhod="POST" action="{{ route('transaksi.update',$item->id) }}">
                    @csrf
                    @method('POST')
                    <button type="submit">Keluar</button>
                    </form>
                @endif
            </td>
        </tr>
        @endforeach
</table>
</body>
</html>