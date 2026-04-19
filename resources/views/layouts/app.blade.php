<!DOCTYPE html>
<html>
<head>
    <title>Parkir App</title>
    <style>
        body { font-family: Arial; margin: 0; }

        .navbar {
            background: #333;
            color: white;
            padding: 10px;
            display: flex;
            justify-content: space-between;
        }

        .menu {
            padding: 15px;
            background: #f4f4f4;
            width: 200px;
            height: 100vh;
            float: left;
        }

        .content {
            margin-left: 220px;
            padding: 20px;
        }

        a {
            display: block;
            padding: 8px;
            color: black;
            text-decoration: none;
        }

        a:hover {
            background: #ddd;
        }
    </style>
</head>
<body>

<div class="navbar">
    <div>🚗 Sistem Parkir</div>
    <div>
        {{ auth()->user()->name ?? '' }}
    </div>
</div>

<div class="menu">
    <a href="/dashboard">Dashboard</a>
    <a href="/kendaraan">Kendaraan</a>
    <a href="/area-parkir">Area Parkir</a>
    <a href="/tarif">Tarif</a>
    <a href="/transaksi">Transaksi</a>
</div>

<div class="content">
    @yield('content')
</div>

</body>
</html>