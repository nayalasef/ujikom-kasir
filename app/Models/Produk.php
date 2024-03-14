<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = "produk";
    use HasFactory;

    protected $fillable = [
        'nama',
        'kategori',
        'hpp',
        'harga_jual',
        'gambar',
        'stok',
    ];
}
