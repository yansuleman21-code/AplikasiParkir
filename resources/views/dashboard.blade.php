@extends('layouts.app')

@section('content')

<h2>📊 Dashboard Parkir</h2>
<p>Selamat datang di aplikasi parkir 🚗✨</p>

<hr>

@php
$card = "padding:20px;border-radius:15px;color:#fff;width:200px;box-shadow:0 8px 20px rgba(0,0,0,0.2);";
$menu = "padding:20px;border-radius:15px;text-align:center;width:180px;color:white;box-shadow:0 6px 15px rgba(0,0,0,0.2);transition:0.3s;";
@endphp

<div style="display:flex; gap:20px; flex-wrap:wrap;">

    <div style="{{ $card }}background:linear-gradient(135deg,#4f46e5,#6366f1);">
        🚗 <h3>Kendaraan</h3>
        <b>{{ \App\Models\Kendaraan::count() }}</b>
    </div>

    <div style="{{ $card }}background:linear-gradient(135deg,#10b981,#34d399);">
        🅿 <h3>Area Parkir</h3>
        <b>{{ \App\Models\AreaParkir::count() }}</b>
    </div>

    <div style="{{ $card }}background:linear-gradient(135deg,#f59e0b,#fbbf24);">
        🎫 <h3>Transaksi</h3>
        <b>{{ \App\Models\Transaksi::count() }}</b>
    </div>

</div>

<hr>

<h4>⚡ Menu Cepat</h4>

<div style="display:flex; gap:15px; flex-wrap:wrap;">

    <a href="{{ route('kendaraan.index') }}" style="text-decoration:none;">
        <div style="{{ $menu }}background:linear-gradient(135deg,#6366f1,#4f46e5);"
             onmouseover="this.style.transform='scale(1.05)'"
             onmouseout="this.style.transform='scale(1)'">
            🚗 <br><b>Kendaraan</b>
        </div>
    </a>

    <a href="{{ route('area-parkir.index') }}" style="text-decoration:none;">
        <div style="{{ $menu }}background:linear-gradient(135deg,#10b981,#34d399);"
             onmouseover="this.style.transform='scale(1.05)'"
             onmouseout="this.style.transform='scale(1)'">
            🅿 <br><b>Area Parkir</b>
        </div>
    </a>

    <a href="{{ route('transaksi.index') }}" style="text-decoration:none;">
        <div style="{{ $menu }}background:linear-gradient(135deg,#f59e0b,#fbbf24);"
             onmouseover="this.style.transform='scale(1.05)'"
             onmouseout="this.style.transform='scale(1)'">
            🎫 <br><b>Transaksi</b>
        </div>
    </a>

</div>

@endsection