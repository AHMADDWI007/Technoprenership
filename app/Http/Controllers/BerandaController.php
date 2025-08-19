<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pesanan;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    /**
     * Menampilkan halaman beranda
     */
    public function index()
    {
        // Hitung total barang
        $totalBarang = Barang::count();

        // Hitung total pesanan
        $totalPesanan = Pesanan::count();

        // Hitung total kategori
        $totalKategori = Kategori::count();

        // Arahkan ke view beranda
        return view('HalamanDepan.beranda', compact(
            'totalBarang',
            'totalPesanan',
            'totalKategori'
        ));
    }
}
