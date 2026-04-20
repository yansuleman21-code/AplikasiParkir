
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

    @extends('layouts.app')

@section('content')

<h2>Data Transaksi</h2>

<a href="{{ route('transaksi.create') }}">Kendaraan Masuk</a>

<br><br>

<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>No</th>
        <th>No Polisi</th>
        <th>Area</th>
        <th>Masuk</th>
        <th>Keluar</th>
        <th>Biaya</th>
        <th>Aksi</th>
    </tr>

    @forelse ($data as $item)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $item->kendaraan->no_polisi }}</td>
        <td>{{ $item->areaParkir->nama_area }}</td>
        <td>{{ $item->waktu_masuk }}</td>
        <td>{{ $item->waktu_keluar ?? '-' }}</td>
        <td>
            Rp {{ number_format($item->biaya ?? 0, 0, ',', '.') }}
        </td>
        <td>
            <a href="{{ route('transaksi.show', $item->id) }}">Detail</a>

            @if(!$item->waktu_keluar)
            <form method="POST" action="{{ route('transaksi.update', $item->id) }}" style="display:inline;">
                @csrf
                @method('PUT')
                <button type="submit">Keluar</button>
            </form>
            @endif
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="7">Data tidak ada</td>
    </tr>
    @endforelse

</table>

@endsection