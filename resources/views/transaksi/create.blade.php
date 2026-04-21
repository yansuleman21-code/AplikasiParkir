@extends('layouts.app')

@section('content')

<div class="page-header">
    <h2>🚗 Input Kendaraan Masuk</h2>
</div>

<div class="form-card">
    <form method="POST" action="{{ route('transaksi.store') }}">
        @csrf

        <div class="form-group">
            <label class="form-label">Pilih Kendaraan</label>
            <select name="kendaraan_id" class="form-control" required>
                <option value="">-- Pilih Kendaraan --</option>
                @foreach ($kendaraan as $k)
                    <option value="{{ $k->id }}">{{ $k->no_polisi }} ({{ $k->jenis }})</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label class="form-label">Pilih Area Parkir</label>
            <select name="area_parkir_id" class="form-control" required>
                <option value="">-- Pilih Area --</option>
                @foreach ($area as $a)
                    <option value="{{ $a->id }}">{{ $a->nama_area }} (Kapasitas: {{ $a->kapasitas }})</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label class="form-label">Pilih Jenis Tarif</label>
            <select name="tarif_id" class="form-control" required>
                <option value="">-- Pilih Tarif --</option>
                @foreach ($tarif as $t)
                    <option value="{{ $t->id }}">{{ strtoupper($t->jenis_kendaraan) }} - Rp {{ number_format($t->tarif_per_jam) }}/jam</option>
                @endforeach
            </select>
        </div>

        <div style="display: flex; gap: 10px; margin-top: 2rem;">
            <button type="submit" class="btn btn-primary">💾 Simpan Transaksi</button>
            <a href="{{ route('transaksi.index') }}" class="btn btn-sm" style="color: var(--text-muted);">Batal</a>
        </div>
    </form>
</div>

@endsection
