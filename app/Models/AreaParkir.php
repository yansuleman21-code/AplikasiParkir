<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AreaParkir extends Model
{
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}