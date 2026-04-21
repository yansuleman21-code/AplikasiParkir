<?php
namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalKendaraan = Kendaraan::count();
        $totalArea = \App\Models\AreaParkir::count();
        $totalTransaksi = Transaksi::count();
        $transaksiHariIni = Transaksi::whereDate('created_at', today())->count();

        $kendaraanMasihParkir = Transaksi::whereNull('waktu_keluar')->count();

        $totalPemasukan = Transaksi::whereNotNull('biaya')->sum('biaya');

        return view('dashboard', compact(
            'totalKendaraan',
            'totalArea',
            'totalTransaksi',
            'transaksiHariIni',
            'kendaraanMasihParkir',
            'totalPemasukan'
        ));
    }
}