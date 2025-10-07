<?php

use App\Http\Controllers\AuthManualController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PenerbitController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('kategori', KategoriController::class);
Route::resource('penerbit', PenerbitController::class);
Route::resource('buku', BukuController::class);
//route untuk login & logout
Route::get('/login/',[AuthManualController::class,'index'])->name('login');
Route::post('/login/',[AuthManualController::class,'loginProses'])->name('loginProses');
Route::post('/logout/',[AuthManualController::class,'logout'])->name('logout');

