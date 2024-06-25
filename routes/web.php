<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\KabupatenController;
use App\Http\Controllers\LaporanController;

Route::resource('/provinsi', ProvinsiController::class);
Route::resource('/kabupaten', KabupatenController::class);
Route::get('laporan/provinsi', [LaporanController::class, 'laporanProvinsi'])->name('laporan.provinsi');

Route::get('/', function () {
    return view('welcome');
});
