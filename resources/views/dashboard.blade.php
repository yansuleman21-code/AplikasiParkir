@extends('layouts.app')

@section('content')

<style>
    .welcome-banner {
        margin-bottom: 2rem;
    }
    .welcome-banner h2 {
        font-size: 1.8rem;
        color: var(--text-main);
        margin-bottom: 0.5rem;
    }
    .welcome-banner p {
        color: var(--text-muted);
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 1.5rem;
        margin-bottom: 3rem;
    }

    .stat-card {
        background: white;
        padding: 1.5rem;
        border-radius: 16px;
        border: 1px solid var(--border-color);
        display: flex;
        align-items: center;
        gap: 1rem;
        transition: 0.3s;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.05);
    }

    .stat-icon {
        width: 50px;
        height: 50px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
    }

    .icon-blue { background: rgba(59, 130, 246, 0.1); color: #3b82f6; }
    .icon-green { background: rgba(16, 185, 129, 0.1); color: #10b981; }
    .icon-orange { background: rgba(245, 158, 11, 0.1); color: #f59e0b; }

    .stat-info h4 {
        font-size: 0.9rem;
        color: var(--text-muted);
        margin-bottom: 2px;
    }
    .stat-info .count {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--text-main);
    }

    .section-title {
        font-size: 1.1rem;
        font-weight: 700;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 10px;
    }
</style>

<div class="welcome-banner">
    <h2>📊 Dashboard Parkir</h2>
    <p>Selamat datang kembali di sistem manajemen parkir cerdas.</p>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-icon icon-blue">🚗</div>
        <div class="stat-info">
            <h4>Total Kendaraan</h4>
            <div class="count">{{ \App\Models\Kendaraan::count() }}</div>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon icon-green">📍</div>
        <div class="stat-info">
            <h4>Area Parkir</h4>
            <div class="count">{{ \App\Models\AreaParkir::count() }}</div>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon icon-orange">🎫</div>
        <div class="stat-info">
            <h4>Transaksi Hari Ini</h4>
            <div class="count">{{ \App\Models\Transaksi::whereDate('created_at', today())->count() }}</div>
        </div>
    </div>
</div>

<div class="section-title">⚡ Menu Cepat</div>

<div class="stats-grid" style="grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));">
    <a href="{{ route('kendaraan.index') }}" style="text-decoration: none;">
        <div class="stat-card" style="justify-content: center; flex-direction: column; text-align: center;">
            <div class="stat-icon icon-blue">🚗</div>
            <div class="stat-info">
                <h4 style="color: var(--text-main); font-weight: 600;">Kendaraan</h4>
            </div>
        </div>
    </a>

    <a href="{{ route('area-parkir.index') }}" style="text-decoration: none;">
        <div class="stat-card" style="justify-content: center; flex-direction: column; text-align: center;">
            <div class="stat-icon icon-green">📍</div>
            <div class="stat-info">
                <h4 style="color: var(--text-main); font-weight: 600;">Area Parkir</h4>
            </div>
        </div>
    </a>

    <a href="{{ route('transaksi.index') }}" style="text-decoration: none;">
        <div class="stat-card" style="justify-content: center; flex-direction: column; text-align: center;">
            <div class="stat-icon icon-orange">🎫</div>
            <div class="stat-info">
                <h4 style="color: var(--text-main); font-weight: 600;">Transaksi</h4>
            </div>
        </div>
    </a>
</div>

@endsection