<?php

namespace App\Http\Controllers;

use App\Models\LogAktivitas;
use Illuminate\Http\Request;

class LogAktivitasController extends Controller
{
    public function index()
    {
        $data = LogAktivitas::with('user')->get();
        return view('LogAktivitas.index', compact('data'));
    }

    public function create()
    {
        return view('LogAktivitas.create');
    }
    public function store(Request $request)
{
    $request->validate([
        'aktivitas' => 'required'
    ]);

    LogAktivitas::create([
        'user_id' => auth()->id(),
        'aktivitas' => $request->aktivitas,
    ]);

    return redirect()->route('logAktivitas.index')
        ->with('success', 'Log berhasil ditambahkan');
}

    public function destroy($log_aktivitas)
{
    $data = LogAktivitas::findOrFail($log_aktivitas);
    $data->delete();

    return redirect()->route('logAktivitas.index')
        ->with('success', 'Log berhasil dihapus');
}
}