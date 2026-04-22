@extends('layouts.app')

@section('content')

<div class="page-header">
    <h2>📋 Log Aktivitas Sistem</h2>
    @if($data->count() > 0)
    <form action="{{ route('log-aktivitas.clear') }}" method="POST" onsubmit="return confirm('⚠️ PERINGATAN: Ini akan menghapus SELURUH riwayat aktivitas. Lanjutkan?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">
            🗑️ Kosongkan Semua Log
        </button>
    </form>
    @endif
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
                <th>Waktu</th>
                <th>User</th>
                <th>Aktivitas</th>
                <th style="width: 150px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td><span class="badge badge-blue">{{ $item->created_at->format('d M Y H:i') }}</span></td>
                <td><strong>{{ $item->user->name ?? 'System' }}</strong></td>
                <td>{{ $item->aktivitas }}</td>
                <td>
                    <form action="{{ route('log-aktivitas.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus data ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">
                            🗑 Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" style="text-align: center; padding: 3rem; color: var(--text-muted);">
                    🚫 Belum ada aktivitas tercatat
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection