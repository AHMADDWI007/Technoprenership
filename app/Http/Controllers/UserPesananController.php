<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;

class UserPesananController extends Controller
{
    public function index()
    {
        // Ambil semua pesanan, urut terbaru
        // (Kalau nanti login sudah aktif, bisa pakai where('user_id', auth()->id()))
        $pesanan = Pesanan::with('detail.barang')
            ->orderBy('created_at', 'desc')
            ->get();

        // Kirim ke view
        return view('HalamanUser.pesanan-user', compact('pesanan'));
    }
}
