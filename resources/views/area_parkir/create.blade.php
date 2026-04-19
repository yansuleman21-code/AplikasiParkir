<h2>Tambah Area Parkir</h2>

<form method="POST" action="{{ route('area-parkir.store') }}">
    @csrf

    <label>Nama Area</label><br>
    <input type="text" name="nama_area"><br><br>

    <button type="submit">Simpan</button>
</form>