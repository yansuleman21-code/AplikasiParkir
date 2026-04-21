<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AreaParkir;
use App\Models\LogAktivitas;

class AreaParkirController extends Controller
{
    public function index()
    {
        $data = AreaParkir::all();
        return view('area_parkir.index', compact('data'));
    }

    public function create()
    {
        return view('area_parkir.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_area' => 'required',
            'kapasitas' => 'required|integer',
        ]);

        AreaParkir::create($request->all());

        LogAktivitas::create([
            'user_id' => auth()->id(),
            'aktivitas' => 'Menambahkan area parkir baru: ' . $request->nama_area
        ]);

        return redirect()->route('area-parkir.index')->with('success', 'Area parkir berhasil ditambahkan');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = AreaParkir::findOrFail($id);
        return view('area_parkir.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = AreaParkir::findOrFail($id);

        $request->validate([
            'nama_area' => 'required',
            'kapasitas' => 'required|integer',
        ]);

        $data->update($request->all());

        LogAktivitas::create([
            'user_id' => auth()->id(),
            'aktivitas' => 'Mengupdate area parkir: ' . $data->nama_area
        ]);

        return redirect()->route('area-parkir.index')->with('success', 'Area parkir berhasil diupdate');
    }

    public function destroy($id)
    {
        $data = AreaParkir::findOrFail($id);
        $nama = $data->nama_area;
        $data->delete();

        LogAktivitas::create([
            'user_id' => auth()->id(),
            'aktivitas' => 'Menghapus area parkir: ' . $nama
        ]);

        return redirect()->route('area-parkir.index')->with('success', 'Area parkir berhasil dihapus');
    }
}