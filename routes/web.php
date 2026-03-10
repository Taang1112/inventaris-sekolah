<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| RESOURCE ROUTES
|--------------------------------------------------------------------------
*/

Route::resource('barang', BarangController::class);
Route::get('export/barang/excel', [BarangController::class, 'exportExcel'])->name('barang.export.excel');
Route::get('export/barang/pdf', [BarangController::class, 'exportPdf'])->name('barang.export.pdf');

Route::resource('guru', GuruController::class);
Route::get('export/guru/excel', [GuruController::class, 'exportExcel'])->name('guru.export.excel');
Route::get('export/guru/pdf', [GuruController::class, 'exportPdf'])->name('guru.export.pdf');

Route::resource('kelas', KelasController::class);
Route::get('export/kelas/excel', [KelasController::class, 'exportExcel'])->name('kelas.export.excel');
Route::get('export/kelas/pdf', [KelasController::class, 'exportPdf'])->name('kelas.export.pdf');

Route::resource('peminjaman', PeminjamanController::class);
Route::get('export/peminjaman/excel', [PeminjamanController::class, 'exportExcel'])->name('peminjaman.export.excel');
Route::get('export/peminjaman/pdf', [PeminjamanController::class, 'exportPdf'])->name('peminjaman.export.pdf');

Route::resource('pengembalian', PengembalianController::class);
Route::get('export/pengembalian/excel', [PengembalianController::class, 'exportExcel'])->name('pengembalian.export.excel');
Route::get('export/pengembalian/pdf', [PengembalianController::class, 'exportPdf'])->name('pengembalian.export.pdf');