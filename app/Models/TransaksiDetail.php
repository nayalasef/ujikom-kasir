<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiDetail extends Model
{
    protected $table = "transaksi_detail";
    use HasFactory;

    public function barang() {
        return $this->belongsTo(Produk::class, 'id_produk', 'id');
    }

    public function transaksi() {
        return $this->belongsTo(Transaksi::class, 'id_transaksi', 'id');
    }
}
