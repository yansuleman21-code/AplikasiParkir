@extends('layouts.app')

@section('content')
<div class="container">

    <h3 class="mb-3">💰 Data Tarif Parkir</h3>

    <a href="{{ route('tarif.create') }}" class="btn btn-primary mb-3">
        ➕ Tambah Tarif
    </a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Jenis Kendaraan</th>
                <th>Tarif / Jam</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tarif as $t)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $t->jenis_kendaraan }}</td>
                <td>Rp {{ number_format($t->tarif_per_jam) }}</td>
                <td>
                    <a href="{{ route('tarif.edit', $t->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('tarif.destroy', $t->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection