@extends('layouts.app')

@section('content')

<div class="page-header">
    <h2>🚗 Tambah Kendaraan Baru</h2>
</div>

<div class="form-card">
    <form method="POST" action="{{ route('kendaraan.store') }}">
        @csrf

        <div class="form-group">
            <label class="form-label">🚘 No Polisi</label>
            <input type="text" name="no_polisi" value="{{ old('no_polisi') }}" class="form-control" placeholder="B 1234 ABC" required>
            @error('no_polisi') <small style="color: #ef4444;">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label class="form-label">🛵 Jenis Kendaraan</label>
            <select name="jenis" class="form-control" required>
                <option value="">-- Pilih Jenis --</option>
                <option value="motor" {{ old('jenis') == 'motor' ? 'selected' : '' }}>Motor</option>
                <option value="mobil" {{ old('jenis') == 'mobil' ? 'selected' : '' }}>Mobil</option>
            </select>
            @error('jenis') <small style="color: #ef4444;">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label class="form-label">🎨 Warna</label>
            <input type="text" name="warna" value="{{ old('warna') }}" class="form-control" placeholder="Hitam" required>
            @error('warna') <small style="color: #ef4444;">{{ $message }}</small> @enderror
        </div>

        <div style="display: flex; gap: 10px; margin-top: 2rem;">
            <button type="submit" class="btn btn-primary">💾 Simpan Kendaraan</button>
            <a href="{{ route('kendaraan.index') }}" class="btn btn-sm" style="color: var(--text-muted);">Batal</a>
        </div>
    </form>
</div>

@endsection