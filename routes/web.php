<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/beranda', [BerandaController::class, 'index'])->name('beranda');

//halaman menu
Route::get('/data-barang', [BarangController::class, 'index'])->name('data-barang');
Route::get('/create-barang', [BarangController::class, 'create'])->name('barang-create');
Route::post('/barang', [BarangController::class, 'store'])->name('barang-store');
Route::get('/barang/{id}/edit', [BarangController::class, 'edit'])->name('barang-edit'); // menampilkan form edit
Route::put('/barang/{id}', [BarangController::class, 'update'])->name('barang-update'); // menyimpan update
Route::delete('/barang/{id}', [BarangController::class, 'destroy'])->name('barang-destroy');
Route::get('/data-kategori', [KategoriController::class, 'index'])->name('data-kategori');
Route::get('/create-kategori', [KategoriController::class, 'create'])->name('create-kategori');
Route::post('/kategori', [KategoriController::class, 'store'])->name('simpan-kategori');
Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit'])->name('edit-kategori');
Route::put('/kategori/{id}', [KategoriController::class, 'update'])->name('update-kategori');
Route::delete('/kategori/{id}', [KategoriController::class, 'destroy'])->name('delete-kategori');



Route::get('/data-pesanan', [PesananController::class, 'index'])->name('data-pesanan');
Route::put('/pesanan/{id}/status', [PesananController::class, 'updateStatus'])->name('pesanan-update-status');
Route::delete('/pesanan/{id}', [PesananController::class, 'destroy'])->name('pesanan-destroy');

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
