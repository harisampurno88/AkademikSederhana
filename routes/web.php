<?php

use App\Http\Controllers\dosenController;
use App\Http\Controllers\mahasiswaController;
use App\Http\Controllers\matakuliahController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('mahasiswa', mahasiswaController::class);

Route::resource('dosen', dosenController::class);

Route::resource('matakuliah', matakuliahController::class);
