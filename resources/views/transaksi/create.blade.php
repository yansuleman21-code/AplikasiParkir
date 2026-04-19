<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\Tarif;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function create()
    {
        $kendaraan = Kendaraan::all();
        $tarif = Tarif::all();

        return view('transaksi.create', compact('kendaraan', 'tarif'));
    }
}
