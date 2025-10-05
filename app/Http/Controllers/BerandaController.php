<?php

namespace App\Http\Controllers;

use App\Models\Barang; // WAJIB: Import model Barang
use App\Models\Pesanan;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    // Fungsi index() asli, mungkin untuk dasbor Admin atau halaman Depan utama
    public function index()
    {
        // Hitung total barang
        $totalBarang = Barang::count();

        // Hitung total pesanan
        $totalPesanan = Pesanan::count();

        // Hitung total kategori
        $totalKategori = Kategori::count();

        // Arahkan ke view beranda Admin/Depan (Asumsi: HalamanDepan.beranda)
        return view('HalamanDepan.beranda', compact(
            'totalBarang',
            'totalPesanan',
            'totalKategori'
        ));
    }

    // ⭐ FUNGSI BARU UNTUK HALAMAN PENGGUNA (beranda-user) ⭐
    public function indexUser() 
    {
        // 1. Ambil data produk (misalnya 6 produk terbaru)
        // Pastikan model Barang sudah diimport di atas (use App\Models\Barang;)
        $produk = Barang::latest()->take(3)->get();

        // 2. Kirimkan variabel $produk ke view
        // Pastikan nama view sesuai dengan lokasi file Anda.
        return view('HalamanUser.beranda-user', compact('produk')); 
    }
}