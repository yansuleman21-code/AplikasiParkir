<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @extends('layouts.app')

    @section('content')

    <h2>Detail Transaksi</h2>

    <p>No Polisi:{{ $data->kendaraan->no_polisi }}</p>
    <p>No Area:{{ $data->areaParkir->nama_area }}</p>
    <p>No Masuk:{{ $data->waktu_masuk}}</p>
    <p>No Polisi:{{ $data->durasi ??'-'}}</p>
    <p>No Biaya:{{ $data->Biaya ?? '-'}}</p>

    

    @endsection
</body>
</html>