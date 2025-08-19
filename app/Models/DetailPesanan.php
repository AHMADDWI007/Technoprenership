<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailPesanan extends Model
{
    use HasFactory;

    protected $table = 'detail_pesanan';

    protected $fillable = [
        'pesanan_id',
        'barang_id',
        'jumlah',
        'harga_satuan',
        'subtotal',
        'deskripsi_request',
        'foto_request',
    ];

    /**
     * Relasi ke Pesanan (Many to One)
     */
    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'pesanan_id');
    }

    /**
     * Relasi ke Barang (Many to One)
     */
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
}
