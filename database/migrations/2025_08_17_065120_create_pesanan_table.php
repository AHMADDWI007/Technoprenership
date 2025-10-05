<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pembeli')->nullable();
            
            // ⭐ TAMBAHAN UNTUK INFORMASI USER DAN PEMBAYARAN ⭐
            $table->string('nomor_hp')->nullable(); // Dari input checkout
            $table->string('metode_bayar')->nullable(); // Dari pilihan metode bayar
            $table->text('catatan_opsional')->nullable(); // Untuk menyimpan catatan tambahan jika ada

            $table->decimal('total_harga', 12, 2)->default(0);
            $table->enum('status', ['menunggu', 'selesai'])->default('menunggu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan');
    }
};