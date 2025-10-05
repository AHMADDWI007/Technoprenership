<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPesanan extends Model
{
    use HasFactory;
    
    // Pastikan nama tabel benar
    protected $table = 'detail_pesanan';

    // ⭐ Pastikan semua kolom diisi di Controller ada di sini ⭐
    protected $fillable = [
        'pesanan_id',
        'barang_id',
        'jumlah',
        'harga_satuan',
        'subtotal',
        'deskripsi_request',
        'foto_request',
    ];

    // ... (Definisi relasi, jika ada)

    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'pesanan_id');
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
}