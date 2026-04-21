@extends('layouts.app')

@section('content')

<div class="page-header">
    <h2>📍 Tambah Area Parkir Baru</h2>
</div>

<div class="form-card">
    <form method="POST" action="{{ route('area-parkir.store') }}">
        @csrf

        <div class="form-group">
            <label class="form-label">Nama Area</label>
            <input type="text" name="nama_area" class="form-control" placeholder="Area A" required>
        </div>

        <div class="form-group">
            <label class="form-label">Kapasitas</label>
            <input type="number" name="kapasitas" class="form-control" placeholder="50" required>
        </div>

        <div class="form-group">
            <label class="form-label">Keterangan (Opsional)</label>
            <textarea name="keterangan" class="form-control" rows="3" placeholder="Informasi tambahan..."></textarea>
        </div>

        <div style="display: flex; gap: 10px; margin-top: 2rem;">
            <button type="submit" class="btn btn-primary">💾 Simpan Area</button>
            <a href="{{ route('area-parkir.index') }}" class="btn btn-sm" style="color: var(--text-muted);">Batal</a>
        </div>
    </form>
</div>

@endsection