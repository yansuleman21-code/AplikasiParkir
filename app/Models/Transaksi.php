<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model

{

    protected $fillable =[
        'kendaraan_id',
        'tarif_id',
        'area_parkir_id',
        'waktu_masuk_id',
        'waktu_keluar_id',
        'durasi_id',
        'biaya_id',
        'user_id',
    ];

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class);
    }
    public function tarif()
    {
        return $this->belongsTo(Tarif::class);
    }
    public function areaParkir()
    {
         return $this->belongsTo(AreaParkir::class);
    }
    public function user()
    {
         return $this->belongsTo(User::class);
    }
}

