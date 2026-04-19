<?
namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalKendaraan = Kendaraan::count();
        $totalTransaksi = Transaksi::count();

        $kendaraanMasihParkir = Transaksi::whereNull('jam_keluar')->count();

        $totalPemasukan = Transaksi::whereNotNull('total_bayar')->sum('total_bayar');

        return view('dashboard', compact(
            'totalKendaraan',
            'totalTransaksi',
            'kendaraanMasihParkir',
            'totalPemasukan'
        ));
    }
}