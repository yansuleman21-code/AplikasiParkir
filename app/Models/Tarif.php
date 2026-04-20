<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarif extends Model
{
    protected $table = 'tarif';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'jenis_kendaraan',
        'tarif_per_jam',
    ];

    protected $casts = [
        'tarif_per_jam' => 'integer',
    ];
}