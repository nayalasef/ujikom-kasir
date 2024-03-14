<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function index(){
        $produk = Produk::all()->count();
        $transaksi = Transaksi::latest()->count();
        $admin = User::where('akses','Admin')->count();
        $kasir = User::where('akses','Kasir')->count();
        // return $produk;
        return view('index',compact('produk','transaksi','admin','kasir'));
    }
}
