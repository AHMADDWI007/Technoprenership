<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailPesanan extends Model
{
    use HasFactory;

    // Nama tabel yang digunakan
    protected $table = 'detail_pesanan';

    // Kolom yang bisa diisi secara massal
    protected $fillable = [
        'pesanan_id',
        'barang_id',
        'jumlah',
        'harga_satuan',
        'subtotal',
        'deskripsi_request',
        'foto_request',
    ];

    // Relasi ke Pesanan (detail pesanan milik satu pesanan)
    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'pesanan_id');
    }

    // Relasi ke Barang (detail pesanan terkait dengan satu barang)
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
}
