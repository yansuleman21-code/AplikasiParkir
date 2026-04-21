<!DOCTYPE html>
<html>
<head>
    <title>Login Sistem Parkir</title>

    <style>
        body {
            margin: 0;
            font-family: Arial;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;

            background: linear-gradient(135deg, #ea66e3, #6fa4e0);
        }

        .card {
            background: white;
            padding: 30px;
            width: 320px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #7179e4;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
        }

        button:hover {
            background: #3730a3;
        }

        .error {
            color: red;
            text-align: center;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>

<div class="card">
    <h2>🚗 Login Parkir</h2>

    @if(session('error'))
        <div class="error">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <input type="email" name="email" placeholder="Email" required>

        <input type="password" name="password" placeholder="Password" required>

        <button type="submit">Login</button>
        <a href="/" style="display: block; text-align: center; margin-top: 15px; color: #6366f1; text-decoration: none; font-size: 14px; font-weight: 500;">← Kembali ke Beranda</a>
    </form>
</div>

<div style="position: absolute; bottom: 20px; color: white; font-size: 0.9rem; opacity: 0.8; text-align: center; width: 100%;">
    &copy; {{ date('Y') }} Sistem Informasi Manajemen Parkir. By 3FFF.
</div>

</body>
</html>