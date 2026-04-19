<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Area Parkir</title>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            margin: 0;
            height: 100vh;
            background: linear-gradient(135deg, #667eea, #764ba2);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            background: #fff;
            padding: 35px;
            width: 380px;
            border-radius: 16px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
            animation: fadeIn 0.5s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(25px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }

        label {
            font-size: 13px;
            color: #666;
            font-weight: 500;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-top: 6px;
            margin-bottom: 18px;
            border-radius: 10px;
            border: 1px solid #ddd;
            transition: 0.3s;
            font-size: 14px;
        }

        input:focus {
            border-color: #667eea;
            box-shadow: 0 0 8px rgba(102,126,234,0.4);
            outline: none;
        }

        button {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border: none;
            color: white;
            border-radius: 10px;
            cursor: pointer;
            font-size: 15px;
            font-weight: 600;
            transition: 0.3s;
        }

        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 15px rgba(0,0,0,0.2);
        }

        .error-box {
            background: #ffe5e5;
            color: #d8000c;
            padding: 12px;
            border-radius: 10px;
            margin-bottom: 15px;
            font-size: 13px;
        }

        .error-box ul {
            margin: 0;
            padding-left: 18px;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 15px;
            font-size: 13px;
            color: #667eea;
            text-decoration: none;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="card">
    <h2>Tambah Area Parkir 🚗</h2>

    {{-- VALIDATION ERROR --}}
    @if ($errors->any())
        <div class="error-box">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('area-parkir.store') }}">
        @csrf

        <label>Nama Area</label>
        <input type="text"
               name="nama_area"
               value="{{ old('nama_area') }}"
               placeholder="Contoh: Area A"
               required>

        <label>Kapasitas</label>
        <input type="number"
               name="kapasitas"
               value="{{ old('kapasitas') }}"
               placeholder="Contoh: 50"
               min="1"
               required>

        <button type="submit">Simpan</button>
    </form>

    <a href="{{ route('area-parkir.index') }}" class="back-link">← Kembali</a>
</div>

</body>
</html>