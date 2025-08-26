<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PesananController;


// Route default (halaman awal)
Route::get('/', function () {
    return view('welcome');
});

// Halaman beranda
Route::get('/beranda', [BerandaController::class, 'index'])->name('beranda');


// Route untuk Barang (Menu)
Route::get('/data-barang', [BarangController::class, 'index'])->name('data-barang');       // Tampilkan data barang
Route::get('/create-barang', [BarangController::class, 'create'])->name('barang-create');  // Form tambah barang
Route::post('/barang', [BarangController::class, 'store'])->name('barang-store');          // Simpan barang baru
Route::get('/barang/{id}/edit', [BarangController::class, 'edit'])->name('barang-edit');   // Form edit barang
Route::put('/barang/{id}', [BarangController::class, 'update'])->name('barang-update');    // Update data barang
Route::delete('/barang/{id}', [BarangController::class, 'destroy'])->name('barang-destroy'); // Hapus barang


// Route untuk Kategori
Route::get('/data-kategori', [KategoriController::class, 'index'])->name('data-kategori');       // Tampilkan data kategori
Route::get('/create-kategori', [KategoriController::class, 'create'])->name('create-kategori');  // Form tambah kategori
Route::post('/kategori', [KategoriController::class, 'store'])->name('simpan-kategori');         // Simpan kategori baru
Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit'])->name('edit-kategori');   // Form edit kategori
Route::put('/kategori/{id}', [KategoriController::class, 'update'])->name('update-kategori');    // Update kategori
Route::delete('/kategori/{id}', [KategoriController::class, 'destroy'])->name('delete-kategori');// Hapus kategori


// Route untuk Pesanan
Route::get('/data-pesanan', [PesananController::class, 'index'])->name('data-pesanan');             // Tampilkan daftar pesanan
Route::post('/pesanan/update-status/{id}', [PesananController::class, 'updateStatus'])->name('pesanan-update-status'); // Update status pesanan
Route::delete('/pesanan/{id}', [PesananController::class, 'destroy'])->name('pesanan-destroy');     // Hapus pesanan