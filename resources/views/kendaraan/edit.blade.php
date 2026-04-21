@extends('layouts.app')

@section('content')

<div class="page-header">
    <h2>✏ Edit Kendaraan</h2>
</div>

<div class="form-card">
    <form method="POST" action="{{ route('kendaraan.update', $data->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label class="form-label">No Polisi</label>
            <input type="text" name="no_polisi" value="{{ $data->no_polisi }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label class="form-label">Jenis Kendaraan</label>
            <select name="jenis" class="form-control" required>
                <option value="motor" {{ $data->jenis == 'motor' ? 'selected' : '' }}>Motor</option>
                <option value="mobil" {{ $data->jenis == 'mobil' ? 'selected' : '' }}>Mobil</option>
            </select>
        </div>

        <div class="form-group">
            <label class="form-label">Warna</label>
            <input type="text" name="warna" value="{{ $data->warna }}" class="form-control" required>
        </div>

        <div style="display: flex; gap: 10px; margin-top: 2rem;">
            <button type="submit" class="btn btn-primary">Update Kendaraan</button>
            <a href="{{ route('kendaraan.index') }}" class="btn btn-sm" style="color: var(--text-muted);">Batal</a>
        </div>
    </form>
</div>

@endsection