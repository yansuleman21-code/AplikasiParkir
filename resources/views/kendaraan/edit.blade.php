<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h2>Edit Kendaraan</h2>
<form method ="POST"action="{{ route('kendaraan.update',$data->id) }}">
    @csrf
    @method('PUT')

    <label>No Polisi</label><br>
    <input type="text" name="no_polisi" value="{{ $data->no_polisi }}"><br><br>

    <label>Jenis</label><br>
    <select name="Jenis">
        <option value="motor"{{ $data->jenis == 'motor' ? 'selected' : ''
        }}>Motor</option>
        <option value="mobil"{{ $data->jenis == 'mobil' ? 'selected' : ''
        }}>Mobil</option>
            </select><br><br>

            <label>Warna</label>
            <input type="text" name="warna" value="{{ $data->warna }}"><br><br>
            
            <buton class="submit">Update</buton>
            </form>


</body>
</html>