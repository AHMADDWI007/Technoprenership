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
        Schema::create('detail_pesanan', function (Blueprint $table) {
            $table->id();
            
            // relasi ke pesanan
            $table->unsignedBigInteger('pesanan_id');
            $table->foreign('pesanan_id')->references('id')->on('pesanan')->onDelete('cascade');
            
            // relasi ke barang
            $table->unsignedBigInteger('barang_id');
            $table->foreign('barang_id')->references('id')->on('barang')->onDelete('cascade');

            $table->integer('jumlah')->default(1);  
            $table->decimal('harga_satuan', 12, 2);  
            $table->decimal('subtotal', 12, 2);  

            // kolom untuk request custom
            $table->text('deskripsi_request')->nullable(); // contoh: nama custom
            $table->string('foto_request')->nullable(); // path foto custom
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_pesanan');
    }
};
