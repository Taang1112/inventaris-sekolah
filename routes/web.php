<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\PeminjamanController;

Route::get('/', function () {
    return view('welcome');
});

// Route Guru
Route::resource('guru', GuruController::class);

// =========================
// Route Peminjaman
// =========================

// Resource tanpa show & destroy
Route::resource('peminjaman', PeminjamanController::class)
    ->except(['show','destroy']);

// Route khusus untuk kembalikan barang
Route::get('peminjaman/{id}/kembalikan',
    [PeminjamanController::class, 'kembalikan']
)->name('peminjaman.kembalikan');