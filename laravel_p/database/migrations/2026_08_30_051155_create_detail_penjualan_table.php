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
    Schema::create('detail_penjualans', function (Blueprint $table) {
        $table->id('id_detail'); // Primary Key
        $table->unsignedBigInteger('id_penjualan'); // Foreign Key ke penjualan
        $table->unsignedBigInteger('id_barang'); // Foreign Key ke barang
        
        $table->integer('jumlah');
        $table->integer('harga_satuan');
        $table->integer('subtotal');
        $table->timestamps();

        // Aturan Relasi
        $table->foreign('id_penjualan')->references('id_penjualan')->on('penjualans')->onDelete('cascade');
        $table->foreign('id_barang')->references('id_barang')->on('barangs')->onDelete('restrict');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_penjualan');
    }
};
