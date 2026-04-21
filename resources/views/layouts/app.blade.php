<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Sistem Parkir</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-body: #f1f5f9;
            --sidebar-bg: #1e293b;
            --sidebar-hover: #334155;
            --accent: #3b82f6;
            --accent-hover: #2563eb;
            --text-main: #334155;
            --text-muted: #64748b;
            --card-bg: #ffffff;
            --border-color: #e2e8f0;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Outfit', sans-serif;
        }

        body {
            background-color: var(--bg-body);
            color: var(--text-main);
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar Style */
        .sidebar {
            width: 260px;
            background-color: var(--sidebar-bg);
            color: white;
            display: flex;
            flex-direction: column;
            position: fixed;
            height: 100vh;
            transition: 0.3s;
            z-index: 100;
        }

        .sidebar-header {
            padding: 2rem 1.5rem;
            font-size: 1.25rem;
            font-weight: 700;
            letter-spacing: -0.5px;
            display: flex;
            align-items: center;
            gap: 10px;
            border-bottom: 1px solid rgba(255,255,255,0.05);
        }

        .sidebar-menu {
            padding: 1.5rem 0;
            flex-grow: 1;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0.8rem 1.5rem;
            color: #94a3b8;
            text-decoration: none;
            font-size: 0.95rem;
            font-weight: 500;
            transition: 0.2s;
        }

        .sidebar-menu a:hover {
            background-color: var(--sidebar-hover);
            color: white;
        }

        .sidebar-menu a.active {
            background-color: rgba(59, 130, 246, 0.1);
            color: var(--accent);
            border-left: 4px solid var(--accent);
        }

        .sidebar-footer {
            padding: 1.5rem;
            border-top: 1px solid rgba(255,255,255,0.05);
        }

        /* Main Content */
        .main-wrapper {
            margin-left: 260px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .top-navbar {
            height: 70px;
            background-color: white;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            justify-content: flex-end;
            padding: 0 2rem;
            position: sticky;
            top: 0;
            z-index: 90;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 600;
            color: var(--text-main);
        }

        .user-avatar {
            width: 35px;
            height: 35px;
            background: var(--accent);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
        }

        .content-area {
            padding: 2rem;
        }

        /* Table Styles */
        .table-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid var(--border-color);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
        }

        .data-table th {
            background-color: #f8fafc;
            padding: 1rem;
            text-align: left;
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 1px solid var(--border-color);
        }

        .data-table td {
            padding: 1rem;
            border-bottom: 1px solid var(--border-color);
            font-size: 0.95rem;
            color: var(--text-main);
        }

        .data-table tr:last-child td { border-bottom: none; }
        .data-table tr:hover { background-color: #f1f5f9; }

        /* Button Styles */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.6rem 1.2rem;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.9rem;
            cursor: pointer;
            transition: 0.2s;
            text-decoration: none;
            gap: 8px;
            border: none;
        }

        .btn-primary { background: var(--accent); color: white; }
        .btn-primary:hover { background: var(--accent-hover); }

        .btn-success { background: #10b981; color: white; }
        .btn-success:hover { background: #059669; }

        .btn-danger { background: #ef4444; color: white; }
        .btn-danger:hover { background: #dc2626; }

        .btn-sm { padding: 0.4rem 0.8rem; font-size: 0.8rem; }

        /* Form Styles */
        .form-card {
            max-width: 600px;
            background: white;
            padding: 2rem;
            border-radius: 12px;
            border: 1px solid var(--border-color);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        }

        .form-group { margin-bottom: 1.5rem; }
        .form-label { display: block; margin-bottom: 0.5rem; font-weight: 600; font-size: 0.9rem; color: var(--text-main); }
        .form-control {
            width: 100%;
            padding: 0.75rem 1rem;
            border-radius: 8px;
            border: 1px solid var(--border-color);
            font-size: 0.95rem;
            transition: 0.2s;
        }
        .form-control:focus {
            outline: none;
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        /* Page Header */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .page-header h2 { font-size: 1.5rem; font-weight: 700; color: var(--text-main); }

        .badge {
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
        }
        .badge-blue { background: rgba(59, 130, 246, 0.1); color: #3b82f6; }
        .badge-green { background: rgba(16, 185, 129, 0.1); color: #10b981; }

        @media (max-width: 768px) {
            .sidebar { transform: translateX(-100%); }
            .main-wrapper { margin-left: 0; }
        }
    </style>
</head>
<body>

<aside class="sidebar">
    <div class="sidebar-header">
        <span>🚗</span> PARKIR.PRO
    </div>
    
    <nav class="sidebar-menu">
        <a href="/dashboard" class="{{ request()->is('dashboard') ? 'active' : '' }}">📊 Dashboard</a>
        <a href="/kendaraan" class="{{ request()->is('kendaraan*') ? 'active' : '' }}">🚗 Kendaraan</a>
        <a href="/area-parkir" class="{{ request()->is('area-parkir*') ? 'active' : '' }}">📍 Area Parkir</a>
        <a href="/tarif" class="{{ request()->is('tarif*') ? 'active' : '' }}">💰 Tarif Parkir</a>
        <a href="/transaksi" class="{{ request()->is('transaksi*') ? 'active' : '' }}">🧾 Transaksi</a>
        <a href="/log-aktivitas" class="{{ request()->is('log-aktivitas*') ? 'active' : '' }}">📋 Log Aktivitas</a>
        @if(auth()->user()->role == 'admin')
        <a href="/users" class="{{ request()->is('users*') ? 'active' : '' }}">👥 Manajemen User</a>
        @endif
    </nav>

    <div class="sidebar-footer">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn-logout">🚪 Keluar Sistem</button>
        </form>
    </div>
</aside>

<div class="main-wrapper">
    <header class="top-navbar">
        <div class="user-profile">
            <span>{{ auth()->user()->name ?? 'Petugas' }}</span>
            <div class="user-avatar">
                {{ substr(auth()->user()->name ?? 'P', 0, 1) }}
            </div>
        </div>
    </header>

    <main class="content-area" style="flex-grow: 1;">
        @yield('content')
    </main>

    <footer style="padding: 3rem; text-align: center; color: #64748b; font-size: 0.9rem; border-top: 1px solid var(--border-color); background: white;">
        &copy; {{ date('Y') }} Sistem Informasi Manajemen Parkir. By 3FFF.
    </footer>
</div>

</body>
</html>