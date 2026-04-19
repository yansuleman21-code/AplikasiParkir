<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    // Tampilkan semua data
    public function index()
    {
        $data = Kendaraan::all();
        return view('kendaraan.index', compact('data'));
    }

    // Form tambah
    public function create()
    {
        return view('kendaraan.create');
    }

    // Simpan data
    public function store(Request $request)
    {
        $request->validate([
            'no_polisi' => 'required|unique:kendaraans,no_polisi',
            'jenis' => 'required|in:motor,mobil',
            'warna' => 'required'
        ]);

        Kendaraan::create([
            'no_polisi' => $request->no_polisi,
            'jenis' => $request->jenis,
            'warna' => $request->warna,
        ]);

        return redirect()->route('kendaraan.index')->with('success', 'Data berhasil ditambahkan');
    }

    // (Optional nanti)
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = Kendaraan::findOrFail($id);
        return view('kendaraan.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Kendaraan::findOrFail($id);

        $request->validate([
            'no_polisi' => 'required|unique:kendaraans,no_polisi,' . $id,
            'jenis' => 'required|in:motor,mobil',
            'warna' => 'required'
        ]);

        $data->update($request->all());

        return redirect()->route('kendaraan.index')->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $data = Kendaraan::findOrFail($id);
        $data->delete();

        return redirect()->route('kendaraan.index')->with('success', 'Data berhasil dihapus');
    }
}