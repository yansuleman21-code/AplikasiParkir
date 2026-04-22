<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Manajemen Parkir - Modern & Efisien</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #6366f1;
            --secondary: #a855f7;
            --accent: #f43f5e;
            --bg: #0f172a;
            --text: #f8fafc;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Outfit', sans-serif;
        }

        body {
            background-color: var(--bg);
            color: var(--text);
            overflow-x: hidden;
            line-height: 1.6;
        }

        .gradient-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle at 20% 30%, rgba(99, 102, 241, 0.15) 0%, transparent 40%),
                        radial-gradient(circle at 80% 70%, rgba(168, 85, 247, 0.15) 0%, transparent 40%);
            z-index: -1;
        }

        header {
            padding: 2rem 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: absolute;
            width: 100%;
            z-index: 10;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: 800;
            background: linear-gradient(to right, #6366f1, #a855f7);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: -1px;
        }

        .hero {
            height: 100vh;
            display: flex;
            align-items: center;
            padding: 0 5%;
            gap: 4rem;
        }

        .hero-content {
            flex: 1;
            animation: fadeInUp 1s ease-out;
        }

        .hero-content {
            flex: 1;
            animation: fadeInUp 1s ease-out;
        }

        h1 {
            font-size: 4rem;
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 1.5rem;
            background: linear-gradient(to bottom right, #fff 50%, #94a3b8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        p.subtitle {
            font-size: 1.25rem;
            color: #94a3b8;
            margin-bottom: 2.5rem;
            max-width: 600px;
        }

        .cta-buttons {
            display: flex;
            gap: 1rem;
        }

        .btn {
            padding: 1rem 2.5rem;
            border-radius: 12px;
            font-weight: 600;
            text-decoration: none;
            transition: 0.3s;
            display: inline-block;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            box-shadow: 0 10px 20px -5px rgba(99, 102, 241, 0.4);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px -5px rgba(99, 102, 241, 0.6);
        }

        .btn-outline {
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: white;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
        }

        .btn-outline:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        .features {
            padding: 5rem 5%;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            background: rgba(15, 23, 42, 0.8);
        }

        .feature-card {
            background: rgba(30, 41, 59, 0.5);
            padding: 2.5rem;
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.05);
            transition: 0.3s;
        }

        .feature-card:hover {
            border-color: var(--primary);
            transform: translateY(-10px);
        }

        .icon {
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }


        @media (max-width: 968px) {
            .hero {
                flex-direction: column;
                text-align: center;
                justify-content: center;
                padding-top: 5rem;
            }
            h1 { font-size: 3rem; }
            .cta-buttons { justify-content: center; }
        }
    </style>
</head>
<body>
    <div class="gradient-bg"></div>

    <header>
        <div class="logo">PARKIR.3FFF</div>
        <div class="nav-links">
            <a href="{{ route('login') }}" class="btn btn-outline" style="padding: 0.6rem 1.5rem; font-size: 0.9rem;">Login Petugas</a>
        </div>
    </header>

    <main>
        <section class="hero" style="justify-content: center; text-align: center;">
            <div class="hero-content" style="display: flex; flex-direction: column; align-items: center; max-width: 800px;">
                <h1>Kelola Parkir Lebih Cerdas & Cepat.</h1>
                <p class="subtitle">Sistem manajemen parkir terpadu untuk efisiensi maksimal. Pantau kendaraan, atur tarif, dan lihat laporan dalam satu dashboard modern.</p>
                <div class="cta-buttons">
                    <a href="{{ route('login') }}" class="btn btn-primary">Mulai Sekarang</a>
                    <a href="#features" class="btn btn-outline">Lihat Fitur</a>
                </div>
            </div>
        </section>

        <section id="features" class="features">
            <div class="feature-card">
                <div class="icon">🚗</div>
                <h3>Input Kendaraan</h3>
                <p>Pencatatan nomor polisi dan jenis kendaraan secara instan saat masuk area parkir.</p>
            </div>
            <div class="feature-card">
                <div class="icon">💰</div>
                <h3>Tarif Otomatis</h3>
                <p>Penghitungan biaya parkir otomatis berdasarkan durasi waktu yang sangat akurat.</p>
            </div>
            <div class="feature-card">
                <div class="icon">📊</div>
                <h3>Log Aktivitas</h3>
                <p>Audit sistem lengkap untuk memantau setiap aksi yang dilakukan oleh petugas.</p>
            </div>
            <div class="feature-card">
                <div class="icon">🛡️</div>
                <h3>Aman & Terkendali</h3>
                <p>Keamanan data transaksi terjamin dengan sistem autentikasi yang kuat.</p>
            </div>
        </section>
    </main>

    <footer style="padding: 3rem; text-align: center; color: #64748b; font-size: 0.9rem;">
        &copy; {{ date('Y') }} Sistem Informasi Manajemen Parkir. By 3FFF.
    </footer>
</body>
</html>
