<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BerandaController; 
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PesananController; // Controller Pesanan yang baru dimodifikasi
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserPesananController;


// Route default (halaman awal)
// Route default langsung ke beranda-user
Route::get('/', function () {
    return redirect()->route('beranda-user');
});

// Halaman beranda Admin/Dasbor
Route::get('/beranda', [BerandaController::class, 'index'])->name('beranda');


// Route untuk halaman user
Route::get('/beranda-user', [BerandaController::class, 'indexUser'])->name('beranda-user');

Route::get('/about-user', function(){
    return view('HalamanUser.about-user');
})->name('about-user');

// Route Pesanan User (Halaman User untuk cek status, masih menggunakan Closure/View sederhana)
Route::get('/pesanan-user', function(){
    // Jika Anda ingin menampilkan riwayat pesanan user, fungsi ini perlu diubah
    // untuk memanggil Controller yang mengirimkan data riwayat pesanan ke view ini.
    return view('HalamanUser.pesanan-user');
})->name('pesanan-user'); 


// Route Shop User
Route::get('/shop-user', [ShopController::class, 'index'])->name('shop-user');
Route::get('/shop/filter', [ShopController::class, 'filter'])->name('shop.filter');
Route::get('/pesanan-user', [UserPesananController::class, 'index'])->name('pesanan-user');


// Route Checkout dan Konfirmasi
Route::get('/checkout-user', [CartController::class, 'checkout'])->name('checkout-user');

// Route POST untuk memicu penyimpanan pesanan ke database
// Menggunakan PesananController::processCheckout()
Route::post('/proses-pesanan-baru', [PesananController::class, 'processCheckout'])->name('proses-pesanan-baru');

// Route Konfirmasi Pembayaran (Halaman sukses/info pembayaran)
Route::get('/konfirmasi-pembayaran', function () {
    // View ini akan menampilkan informasi pembayaran (Dana/BRI/QRIS) dan status sukses
    return view('HalamanUser.konfirmasi-pembayaran');
})->name('konfirmasi-pembayaran');


// Route untuk Barang (Menu) - CRUD Admin
Route::get('/data-barang', [BarangController::class, 'index'])->name('data-barang');
Route::get('/create-barang', [BarangController::class, 'create'])->name('barang-create');
Route::post('/barang', [BarangController::class, 'store'])->name('barang-store');
Route::get('/barang/{id}/edit', [BarangController::class, 'edit'])->name('barang-edit');
Route::put('/barang/{id}', [BarangController::class, 'update'])->name('barang-update');
Route::delete('/barang/{id}', [BarangController::class, 'destroy'])->name('barang-destroy');


// Route untuk Kategori - CRUD Admin
Route::get('/data-kategori', [KategoriController::class, 'index'])->name('data-kategori');
Route::get('/create-kategori', [KategoriController::class, 'create'])->name('create-kategori');
Route::post('/kategori', [KategoriController::class, 'store'])->name('simpan-kategori');
Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit'])->name('edit-kategori');
Route::put('/kategori/{id}', [KategoriController::class, 'update'])->name('update-kategori');
Route::delete('/kategori/{id}', [KategoriController::class, 'destroy'])->name('delete-kategori'); 


// Route untuk Pesanan - Manajemen Admin dan Status
// Rute untuk menampilkan semua pesanan (Admin Index)
Route::get('/data-pesanan', [PesananController::class, 'index'])->name('data-pesanan'); 
// Rute untuk update status pesanan (Admin)
Route::put('/pesanan/{id}/status', [PesananController::class, 'updateStatus'])->name('pesanan-update-status'); 
// Route lama '/checkout' dan '/pesanan/{id}' (destroy lama) yang dihapus karena tidak digunakan di Controller baru ini.

// Cart routes
Route::get('/cart-user', [CartController::class, 'index'])->name('cart-user');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');