<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Kendaraan;
use App\Models\Tarif;
use App\Models\AreaParkir;
use App\Models\LogAktivitas;
use Carbon\Carbon;

class TransaksiController extends Controller
{
    public function index()
    {
        $data = Transaksi::with(['kendaraan','tarif','areaParkir'])->get();
        return view('transaksi.index', compact('data'));
    }

    public function create()
{
    $kendaraan = Kendaraan::all();
    $tarif = Tarif::all();
    $area = AreaParkir::all();

    return view('transaksi.create', compact('kendaraan', 'tarif', 'area'));
}

    public function store(Request $request)
    {
        $transaksi = Transaksi::create([
            'kendaraan_id'=> $request->kendaraan_id,
            'tarif_id'=> $request->tarif_id,
            'area_parkir_id'=> $request->area_parkir_id,
            'waktu_masuk'=> now(),
            'user_id'=> auth()->id()
        ]);

        $kendaraan = \App\Models\Kendaraan::find($request->kendaraan_id);

        LogAktivitas::create([
            'user_id' => auth()->id(),
            'aktivitas' => 'Kendaraan Masuk: ' . ($kendaraan->no_polisi ?? 'N/A') . ' di area ' . ($transaksi->areaParkir->nama_area ?? 'N/A')
        ]);

        return redirect()->route('transaksi.index')
            ->with('success','Kendaraan masuk berhasil');
    }

    public function show($id)
    {
        $data = Transaksi::with(['kendaraan','tarif','areaParkir'])->findOrFail($id);
        return view('transaksi.detail', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $transaksi = Transaksi::findOrFail($id);

        $waktu_keluar = now();
        $waktu_masuk = Carbon::parse($transaksi->waktu_masuk);
        
        // Hitung selisih jam, minimal 1 jam
        $durasi = max(1, ceil($waktu_masuk->diffInMinutes($waktu_keluar) / 60));

        $biaya = $durasi * ($transaksi->tarif->tarif_per_jam ?? 0);

        $transaksi->update([
            'waktu_keluar' => $waktu_keluar,
            'durasi' => $durasi,
            'biaya' => $biaya
        ]);

        LogAktivitas::create([
            'user_id' => auth()->id(),
            'aktivitas' => 'Kendaraan Keluar: ' . ($transaksi->kendaraan->no_polisi ?? 'N/A') . ' - Biaya: Rp ' . number_format($biaya)
        ]);

        return redirect()->route('transaksi.index')
            ->with('success','Kendaraan keluar & biaya dihitung');
    }
    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $nopol = $transaksi->kendaraan->no_polisi ?? 'N/A';
        $transaksi->delete();

        LogAktivitas::create([
            'user_id' => auth()->id(),
            'aktivitas' => 'Menghapus riwayat transaksi kendaraan: ' . $nopol
        ]);

        return back()->with('success','Data transaksi berhasil dihapus');
    }
}