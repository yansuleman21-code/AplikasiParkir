@extends('layouts.app')

@section('content')

<div class="page-header">
    <h2>🧾 Riwayat Transaksi Parkir</h2>
    <a href="{{ route('transaksi.create') }}" class="btn btn-primary">
        <span>➕</span> Kendaraan Masuk
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
                <th style="width: 60px;">No</th>
                <th>No Polisi</th>
                <th>Area</th>
                <th>Waktu Masuk</th>
                <th>Waktu Keluar</th>
                <th>Total Biaya</th>
                <th style="width: 180px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td><span class="badge badge-blue">{{ $item->kendaraan->no_polisi }}</span></td>
                <td><strong>{{ $item->areaParkir->nama_area }}</strong></td>
                <td><small>{{ \Carbon\Carbon::parse($item->waktu_masuk)->format('d/m/Y H:i') }}</small></td>
                <td>
                    @if($item->waktu_keluar)
                        <small>{{ \Carbon\Carbon::parse($item->waktu_keluar)->format('d/m/Y H:i') }}</small>
                    @else
                        <span class="badge" style="background: rgba(245, 158, 11, 0.1); color: #f59e0b;">Parkir...</span>
                    @endif
                </td>
                <td>
                    <strong>Rp {{ number_format($item->biaya ?? 0, 0, ',', '.') }}</strong>
                </td>
                <td>
                    <div style="display: flex; gap: 10px; align-items: center;">
                        <a href="{{ route('transaksi.show', $item->id) }}" class="btn btn-sm btn-primary" style="background: #64748b;">
                            👁 Detail
                        </a>

                        @if(!$item->waktu_keluar)
                        <form method="POST" action="{{ route('transaksi.update', $item->id) }}" style="display:inline;">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-sm btn-success">
                                🚪 Keluar
                            </button>
                        </form>
                        @endif
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" style="text-align: center; padding: 3rem; color: var(--text-muted);">
                    🚫 Belum ada riwayat transaksi
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection