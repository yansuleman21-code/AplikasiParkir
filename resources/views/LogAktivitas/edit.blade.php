<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Area Parkir</title>
</head>
<body>

<h2>Edit Area Parkir</h2>

{{-- VALIDATION ERROR --}}
@if ($errors->any())
    <div style="color:red; margin-bottom:10px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('area-parkir.update', $data->id) }}">
    @csrf
    @method('PUT')

    <label>Nama Area</label><br>
    <input type="text"
           name="nama_area"
           value="{{ old('nama_area', $data->nama_area) }}"
           required>
    <br><br>

    <label>Kapasitas</label><br>
    <input type="number"
           name="kapasitas"
           value="{{ old('kapasitas', $data->kapasitas) }}"
           min="1"
           required>
    <br><br>

    <button type="submit">Update</button>
</form>

</body>
</html>