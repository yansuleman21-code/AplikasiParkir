@extends('layouts.app')

@section('content')

<div class="container py-4">

    <h3>🚗 Tambah Kendaraan</h3>

    <div class="card shadow-sm mt-3">
        <div class="card-body">

            <form method="POST" action="{{ route('kendaraan.store') }}">
                @csrf

                {{-- No Polisi --}}
                <div class="mb-3">
                    <label class="form-label">🚘 No Polisi</label>
                    <input type="text"
                           name="no_polisi"
                           value="{{ old('no_polisi') }}"
                           class="form-control @error('no_polisi') is-invalid @enderror"
                           placeholder="Contoh: B 1234 ABC">

                    @error('no_polisi')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Jenis --}}
                <div class="mb-3">
                    <label class="form-label">🛵 Jenis</label>
                    <select name="jenis"
                            class="form-select @error('jenis') is-invalid @enderror">

                        <option value="">-- Pilih Jenis --</option>
                        <option value="motor" {{ old('jenis') == 'motor' ? 'selected' : '' }}>
                            🏍 Motor
                        </option>
                        <option value="mobil" {{ old('jenis') == 'mobil' ? 'selected' : '' }}>
                            🚗 Mobil
                        </option>
                    </select>

                    @error('jenis')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Warna --}}
                <div class="mb-3">
                    <label class="form-label">🎨 Warna</label>
                    <input type="text"
                           name="warna"
                           value="{{ old('warna') }}"
                           class="form-control @error('warna') is-invalid @enderror"
                           placeholder="Contoh: Hitam">

                    @error('warna')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Tombol --}}
                <button class="btn btn-success">
                    💾 Simpan
                </button>

                <a href="{{ route('kendaraan.index') }}" class="btn btn-secondary">
                    ↩ Batal
                </a>

            </form>

        </div>
    </div>

</div>

@endsection