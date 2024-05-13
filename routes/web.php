<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/berita', [DashboardController::class, 'berita'])->name('lihat_berita');
Route::get('/berita/detail/{id}', [BeritaController::class, 'show'])->name('detail_berita');
Route::get('/berita/kategori/{id}', [BeritaController::class, 'show_by_category'])->name('kategori_berita');

Route::middleware(['is_admin'])->group(function () {
    Route::get('/home/kategori', [KategoriController::class,'index'])->name('index_kategori');
    Route::get('/kategori/buat', [KategoriController::class,'create'])->name('buat_kategori');
    Route::post('/kategori/buat', [KategoriController::class,'store'])->name('simpan_kategori');
    Route::get('/kategori/edit/{id}', [KategoriController::class,'edit'])->name('edit_kategori');
    Route::post('/kategori/edit/{id}', [KategoriController::class,'update'])->name('perbaharui_kategori');
    Route::get('/kategori/hapus/{id}', [KategoriController::class,'destroy'])->name('hapus_kategori');
});

Route::middleware(['is_partner'])->group(function () {
    // 
});

Route::middleware(['is_admin_or_partner'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/home/berita', [BeritaController::class,'index'])->name('index_berita');
    Route::get('/berita/buat', [BeritaController::class,'create'])->name('buat_berita');
    Route::post('/berita/buat', [BeritaController::class,'store'])->name('simpan_berita');
    Route::get('/berita/edit/{id}', [BeritaController::class,'edit'])->name('edit_berita');
    Route::post('/berita/edit/{id}', [BeritaController::class,'update'])->name('perbaharui_berita');
    Route::get('/berita/hapus/{id}', [BeritaController::class,'destroy'])->name('hapus_berita');
});