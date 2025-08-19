<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Barang extends Model
{
    use HasFactory;

    /**
     * Nama tabel yang digunakan
     */
    protected $table = 'barang';

    /**
     * Kolom yang bisa diisi secara massal
     */
    protected $fillable = [
        'nama_produk',
        'harga',
        'deskripsi',
        'kategori_id',
        'stok',
        'gambar'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}
