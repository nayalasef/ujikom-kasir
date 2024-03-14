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
        Schema::create('produk', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->enum('kategori',['Makanan','Minuman'])->nullable();
            $table->bigInteger('hpp')->nullable();
            $table->bigInteger('harga_jual')->nullable();
            $table->string('gambar')->nullable();
            $table->bigInteger('stok')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};
