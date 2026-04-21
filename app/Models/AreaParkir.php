<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AreaParkir extends Model
{
    protected $fillable = [
        'nama_area',
        'kapasitas',
        'keterangan'
    ];
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}