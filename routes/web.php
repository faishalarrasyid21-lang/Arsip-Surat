<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\AboutController;

Route::get('/', [SuratController::class, 'index'])->name('home');
Route::resource('surat', SuratController::class);
Route::get('surat/{surat}/download', [SuratController::class, 'download'])->name('surat.download');

Route::resource('kategori', KategoriController::class);
Route::get('/about', [AboutController::class, 'index'])->name('about');
