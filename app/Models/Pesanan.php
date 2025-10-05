<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    // Pastikan nama tabel benar
    protected $table = 'pesanan';

    // ⭐ Pastikan semua kolom yang diisi di Controller ada di sini ⭐
    protected $fillable = [
        'nama_pembeli',
        'nomor_hp',       // Kolom baru
        'metode_bayar',   // Kolom baru
        'catatan_opsional', // Kolom baru
        'total_harga',
        'status',
    ];

    // ... (Definisi relasi, jika ada)

    public function detail()
    {
        return $this->hasMany(DetailPesanan::class, 'pesanan_id');
    }
}