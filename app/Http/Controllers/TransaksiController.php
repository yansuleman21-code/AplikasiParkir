<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Kendaraan;
use App\Models\Tarif;
use App\Models\AreaParkir;
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
        Transaksi::create([
            'kendaraan_id'=> $request->kendaraan_id,
            'tarif_id'=> $request->tarif_id,
            'area_parkir_id'=> $request->area_parkir_id,
            'waktu_masuk'=> now(),
            'user_id'=> auth()->id()
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
        $durasi = ceil((strtotime($waktu_keluar) - strtotime($transaksi->waktu_masuk)) / 3600);

        $biaya = $durasi * $transaksi->tarif->tarif_per_jam;

        $transaksi->update([
            'waktu_keluar'=>$waktu_keluar,
            'durasi'=>$durasi,
            'biaya'=>$biaya
        ]);

        return redirect()->route('transaksi.index')
            ->with('success','Kendaraan keluar & biaya dihitung');
    }
    public function destroy($id)
    {
        Transaksi::destroy($id);
        return back()->with('success','Data dihapus');
    }
}