<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    // Nama tabel yang digunakan
    protected $table = 'kategori'; // Sesuaikan dengan nama tabel di database

    // Tentukan atribut yang dapat diisi (mass assignment)
    protected $fillable = [
        'nama',
    ];
}
