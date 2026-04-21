@extends('layouts.app')

@section('content')

<div class="page-header">
    <h2>🚗 Data Kendaraan</h2>
    <a href="{{ route('kendaraan.create') }}" class="btn btn-primary">
        <span>➕</span> Tambah Kendaraan
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
                <th>No Polisi</th>
                <th>Jenis</th>
                <th>Warna</th>
                <th style="width: 200px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($data as $k)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    <span class="badge badge-blue">{{ $k->no_polisi }}</span>
                </td>
                <td>
                    @if($k->jenis == 'motor')
                        <span class="badge badge-green">🏍 Motor</span>
                    @else
                        <span class="badge badge-blue">🚗 Mobil</span>
                    @endif
                </td>
                <td>{{ $k->warna }}</td>
                <td>
                    <div style="display: flex; gap: 10px;">
                        <a href="{{ route('kendaraan.edit', $k->id) }}" class="btn btn-sm btn-primary" style="background: #f59e0b;">
                            ✏ Edit
                        </a>
                        <form action="{{ route('kendaraan.destroy', $k->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">
                                🗑 Hapus
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" style="text-align: center; padding: 3rem; color: var(--text-muted);">
                    🚫 Belum ada data kendaraan
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection