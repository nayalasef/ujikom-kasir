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
        Schema::create('transaksi_detail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_transaksi');
            $table->foreignId('id_produk');
            $table->BigInteger('jumlah_barang');
            $table->BigInteger('total_pembelian');
            $table->timestamps();

            $table->foreign('id_transaksi')->references('id')->on('transaksi')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_produk')->references('id')->on('produk');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_detail');
    }
};
