<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class LogAktivitas extends Model
{
    protected $fillable = [
        'user_id',
        'aktivitas',
    ];

    // setiap log dimiliki oleh 1 user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}