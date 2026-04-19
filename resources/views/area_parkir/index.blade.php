<!DOCTYPE html>
<html>
<head>
    <title>Area Parkir</title>
    <style>
        body {
            font-family: Arial;
            background: #f4f6f9;
            padding: 20px;
        }

        h2 {
            margin-bottom: 20px;
        }

        .btn {
            padding: 8px 12px;
            text-decoration: none;
            border-radius: 5px;
            color: white;
        }

        .btn-tambah {
            background: #28a745;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: center;
        }

        th {
            background: #007bff;
            color: white;
        }

        tr:hover {
            background: #f1f1f1;
        }
    </style>
</head>
<body>

    <h2>🚗 Data Area Parkir</h2>

    <a href="{{ route('area-parkir.create') }}" class="btn btn-tambah">
        + Tambah Area
    </a>

    <br><br>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Area</th>
                <th>Kapasitas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            {{-- Data masih kosong --}}
            <tr>
                <td>1</td>
                <td>Area A</td>
                <td>20</td>
                <td>Edit | Hapus</td>
            </tr>
        </tbody>
    </table>

</body>
</html>