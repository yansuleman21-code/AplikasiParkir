@extends('layouts.app')

@section('content')

<div class="page-header">
    <h2>💰 Edit Tarif Parkir</h2>
</div>

<div class="form-card">
    <form method="POST" action="{{ route('tarif.update', $tarif->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label class="form-label">Jenis Kendaraan</label>
            <select name="jenis_kendaraan" class="form-control" required>
                <option value="motor" {{ $tarif->jenis_kendaraan == 'motor' ? 'selected' : '' }}>Motor</option>
                <option value="mobil" {{ $tarif->jenis_kendaraan == 'mobil' ? 'selected' : '' }}>Mobil</option>
            </select>
        </div>

        <div class="form-group">
            <label class="form-label">Tarif Per Jam (Rp)</label>
            <input type="number" name="tarif_per_jam" value="{{ $tarif->tarif_per_jam }}" class="form-control" required>
        </div>

        <div style="display: flex; gap: 10px; margin-top: 2rem;">
            <button type="submit" class="btn btn-primary">Update Tarif</button>
            <a href="{{ route('tarif.index') }}" class="btn btn-sm" style="color: var(--text-muted);">Batal</a>
        </div>
    </form>
</div>

@endsection
