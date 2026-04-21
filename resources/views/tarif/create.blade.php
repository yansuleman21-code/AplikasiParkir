@extends('layouts.app')

@section('content')

<div class="page-header">
    <h2>💰 Tambah Tarif Parkir Baru</h2>
</div>

<div class="form-card">
    <form action="{{ route('tarif.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label class="form-label">Jenis Kendaraan</label>
            <select name="jenis_kendaraan" class="form-control" required>
                <option value="motor">Motor</option>
                <option value="mobil">Mobil</option>
            </select>
        </div>

        <div class="form-group">
            <label class="form-label">Tarif per Jam (Rp)</label>
            <input type="number" name="tarif_per_jam" class="form-control" placeholder="1000" required>
        </div>

        <div style="display: flex; gap: 10px; margin-top: 2rem;">
            <button type="submit" class="btn btn-primary">💾 Simpan Tarif</button>
            <a href="{{ route('tarif.index') }}" class="btn btn-sm" style="color: var(--text-muted);">Batal</a>
        </div>
    </form>
</div>

@endsection