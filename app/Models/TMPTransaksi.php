<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TMPTransaksi extends Model
{
    protected $table = "produk";
    use HasFactory;

    protected $fillable = [
        'id_produk',
        'jumlah_pembelian',
    ];

    public function barang() {
        return $this->belongsTo(Produk::class, 'id_produk', 'id');
    }
}
