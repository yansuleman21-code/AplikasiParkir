@extends('layouts.app')

@section('content')
<div class="container">

    <h3>➕ Tambah Tarif</h3>

    <form action="{{ route('tarif.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Jenis Kendaraan</label>
            <select name="jenis_kendaraan" class="form-control">
                <option value="motor">Motor</option>
                <option value="mobil">Mobil</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Tarif per Jam</label>
            <input type="number" name="tarif_per_jam" class="form-control">
        </div>

        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('tarif.index') }}" class="btn btn-secondary">Kembali</a>
    </form>

</div>
@endsection