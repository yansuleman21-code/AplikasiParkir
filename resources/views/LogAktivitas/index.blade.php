@extends('layouts.app')

@section('content')

<style>
    .container {
        padding: 20px;
        font-family: 'Poppins', sans-serif;
    }

    h2 {
        margin-bottom: 15px;
        color: #333;
    }

    .top-bar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .btn {
        padding: 8px 14px;
        border-radius: 8px;
        text-decoration: none;
        font-size: 13px;
        font-weight: 500;
        transition: 0.3s;
    }

    .btn-add {
        background: #667eea;
        color: white;
    }

    .btn-add:hover {
        background: #5a67d8;
    }

    .btn-edit {
        background: #38a169;
        color: white;
        border: none;
        cursor: pointer;
    }

    .btn-delete {
        background: #e53e3e;
        color: white;
        border: none;
        cursor: pointer;
    }

    .btn-edit:hover {
        background: #2f855a;
    }

    .btn-delete:hover {
        background: #c53030;
    }

    .alert-success {
        background: #e6fffa;
        color: #2c7a7b;
        padding: 10px;
        border-radius: 8px;
        margin-bottom: 15px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }

    th {
        background: #667eea;
        color: white;
        padding: 12px;
        text-align: left;
        font-size: 14px;
    }

    td {
        padding: 12px;
        border-bottom: 1px solid #eee;
        font-size: 14px;
    }

    tr:hover {
        background: #f7fafc;
    }

    .empty {
        text-align: center;
        color: #999;
        padding: 20px;
    }

    .aksi {
        display: flex;
        gap: 8px;
    }
</style>

<div class="container">

    <div class="top-bar">
        <h2>🚗 Data Area Parkir</h2>
        <a href="{{ route('area-parkir.create') }}" class="btn btn-add">+ Tambah</a>
    </div>

    @if (session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Area</th>
                <th>Kapasitas</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama_area }}</td>
                <td>{{ $item->kapasitas }}</td>
                <td>
                    <div class="aksi">
                        <a href="{{ route('area-parkir.edit', $item->id) }}" class="btn btn-edit">Edit</a>

                        <form action="{{ route('area-parkir.destroy', $item->id) }}"
                              method="POST"
                              onsubmit="return confirm('Yakin ingin hapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete">Hapus</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="empty">Data Belum Tersedia</td>
            </tr>
            @endforelse
        </tbody>
    </table>

</div>

@endsection