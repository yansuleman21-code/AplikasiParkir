<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarif;
use App\Models\LogAktivitas;

class TarifController extends Controller
{
    public function index()
    {
        $tarif = Tarif::all();
        return view('tarif.index', compact('tarif'));
    }

    public function create()
    {
        return view('tarif.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_kendaraan' => 'required',
            'tarif_per_jam' => 'required|numeric',
        ]);

        Tarif::create($request->all());

        LogAktivitas::create([
            'user_id' => auth()->id(),
            'aktivitas' => 'Menambahkan tarif baru untuk: ' . $request->jenis_kendaraan
        ]);

        return redirect()->route('tarif.index')->with('success', 'Tarif berhasil ditambahkan');
    }

    public function edit($id)
    {
        $tarif = Tarif::findOrFail($id);
        return view('tarif.edit', compact('tarif'));
    }

    public function update(Request $request, $id)
    {
        $tarif = Tarif::findOrFail($id);

        $request->validate([
            'jenis_kendaraan' => 'required',
            'tarif_per_jam' => 'required|numeric',
        ]);

        $tarif->update($request->all());

        LogAktivitas::create([
            'user_id' => auth()->id(),
            'aktivitas' => 'Mengupdate tarif untuk: ' . $tarif->jenis_kendaraan
        ]);

        return redirect()->route('tarif.index')->with('success', 'Tarif berhasil diupdate');
    }

    public function destroy($id)
    {
        $tarif = Tarif::findOrFail($id);
        $jenis = $tarif->jenis_kendaraan;
        $tarif->delete();

        LogAktivitas::create([
            'user_id' => auth()->id(),
            'aktivitas' => 'Menghapus tarif untuk: ' . $jenis
        ]);

        return redirect()->route('tarif.index')->with('success', 'Tarif berhasil dihapus');
    }
}