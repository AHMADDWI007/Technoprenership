<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pesanan extends Model
{
    use HasFactory;

    // Nama tabel (karena default Laravel pakai jamak 'pesanans')
    protected $table = 'pesanan';

    // Kolom yang bisa diisi
    protected $fillable = [
        'nama_pembeli',
        'total_harga',
        'status',
    ];

    // Relasi ke DetailPesanan (satu pesanan punya banyak detail)
    public function detail()
    {
        return $this->hasMany(DetailPesanan::class, 'pesanan_id');
    }
}
