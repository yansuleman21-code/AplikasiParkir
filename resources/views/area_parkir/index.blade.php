@extends('layouts.app')

@section('content')

<div class="page-header">
    <h2>📍 Data Area Parkir</h2>
    <a href="{{ route('area-parkir.create') }}" class="btn btn-primary">
        <span>➕</span> Tambah Area
    </a>
</div>

@if(session('success'))
    <div class="card" style="margin-bottom: 2rem; background: #ecfdf5; border-color: #10b981; color: #065f46; padding: 1rem;">
        {{ session('success') }}
    </div>
@endif

<div class="table-card">
    <table class="data-table">
        <thead>
            <tr>
                <th style="width: 80px;">No</th>
                <th>Nama Area</th>
                <th>Kapasitas</th>
                <th>Keterangan</th>
                <th style="width: 200px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td><strong>{{ $item->nama_area }}</strong></td>
                <td>{{ $item->kapasitas }}</td>
                <td>{{ $item->keterangan ?? '-' }}</td>
                <td>
                    <div style="display: flex; gap: 10px;">
                        <a href="{{ route('area-parkir.edit', $item->id) }}" class="btn btn-sm btn-primary" style="background: #f59e0b;">
                            ✏ Edit
                        </a>
                        <form action="{{ route('area-parkir.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                                🗑 Hapus
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" style="text-align: center; padding: 3rem; color: var(--text-muted);">
                    🚫 Data Belum Tersedia
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection