<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ShopController; // Pastikan ini ada
use App\Http\Controllers\CartController; // Pastikan ini ada


// Route default (halaman awal)
Route::get('/', function () {
    return view('welcome');
});

// Halaman beranda
Route::get('/beranda', [BerandaController::class, 'index'])->name('beranda');


// Route untuk Barang (Menu)
Route::get('/data-barang', [BarangController::class, 'index'])->name('data-barang');         // Tampilkan data barang
Route::get('/create-barang', [BarangController::class, 'create'])->name('barang-create');    // Form tambah barang
Route::post('/barang', [BarangController::class, 'store'])->name('barang-store');            // Simpan barang baru
Route::get('/barang/{id}/edit', [BarangController::class, 'edit'])->name('barang-edit');    // Form edit barang
Route::put('/barang/{id}', [BarangController::class, 'update'])->name('barang-update');        // Update data barang
Route::delete('/barang/{id}', [BarangController::class, 'destroy'])->name('barang-destroy'); // Hapus barang


// Route untuk Kategori
Route::get('/data-kategori', [KategoriController::class, 'index'])->name('data-kategori');         // Tampilkan data kategori
Route::get('/create-kategori', [KategoriController::class, 'create'])->name('create-kategori');    // Form tambah kategori
Route::post('/kategori', [KategoriController::class, 'store'])->name('simpan-kategori');            // Simpan kategori baru
Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit'])->name('edit-kategori');    // Form edit kategori
Route::put('/kategori/{id}', [KategoriController::class, 'update'])->name('update-kategori');        // Update kategori
Route::delete('/kategori/{id}', [KategoriController::class, 'destroy'])->name('delete-kategori'); // Hapus kategori

// Route untuk Pesanan
Route::get('/data-pesanan', [PesananController::class, 'index'])->name('data-pesanan');
Route::put('/pesanan/{id}/status', [PesananController::class, 'updateStatus'])->name('pesanan-update-status'); // Menggunakan versi PUT dari teman Anda
Route::delete('/pesanan/{id}', [PesananController::class, 'destroy'])->name('pesanan-destroy');
Route::post('/checkout', [PesananController::class, 'checkout'])->name('checkout');

// Route untuk halaman user
Route::get('/beranda-user', function(){
    return view('HalamanUser.beranda-user');
})->name('beranda-user');

Route::get('/shop-user', [ShopController::class, 'index'])->name('shop-user');
Route::get('/shop/filter', [ShopController::class, 'filter'])->name('shop.filter');

Route::get('/about-user', function(){
    return view('HalamanUser.about-user');
})->name('about-user');

// Cart routes
Route::get('/cart-user', [CartController::class, 'index'])->name('cart-user');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');