<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\AreaParkirController;
use App\Http\Controllers\TarifController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LogAktivitasController;



// redirect ke login
// Landing Page
Route::get('/', function () {
    return view('welcome');
});

// login route
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

});

// semua route yang butuh login
Route::middleware(['auth'])->group(function () {

    Route::resource('kendaraan', KendaraanController::class);
    Route::resource('area-parkir', AreaParkirController::class);
    Route::resource('tarif', TarifController::class);
    Route::resource('transaksi', TransaksiController::class);
    Route::resource('log-aktivitas', LogAktivitasController::class);
    
    Route::middleware(['admin'])->group(function () {
        Route::resource('users', \App\Http\Controllers\UserController::class);
    });
});