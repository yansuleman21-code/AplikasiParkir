@extends('layouts.app')

@section('content')

<div class="page-header">
    <h2>💰 Pengaturan Tarif Parkir</h2>
    <a href="{{ route('tarif.create') }}" class="btn btn-primary">
        <span>➕</span> Tambah Tarif
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
                <th>Jenis Kendaraan</th>
                <th>Tarif / Jam</th>
                <th style="width: 200px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($tarif as $t)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    <span class="badge badge-blue">{{ strtoupper($t->jenis_kendaraan) }}</span>
                </td>
                <td><strong>Rp {{ number_format($t->tarif_per_jam, 0, ',', '.') }}</strong></td>
                <td>
                    <div style="display: flex; gap: 10px;">
                        <a href="{{ route('tarif.edit', $t->id) }}" class="btn btn-sm btn-primary" style="background: #f59e0b;">
                            ✏ Edit
                        </a>
                        <form action="{{ route('tarif.destroy', $t->id) }}" method="POST" style="display:inline;">
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
                <td colspan="4" style="text-align: center; padding: 3rem; color: var(--text-muted);">
                    🚫 Belum ada data tarif
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection