<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use App\Models\Produk;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use PDF;
class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!Session::get('login')){
            return redirect('login')->with('alert','Anda belum login, silahkan login terlebih dahulu');
        }
        else{
            $data = TransaksiDetail::orderBy('id', 'asc')->get();
            return view('transaksi/index',compact(['data']));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(!Session::get('login')){
            return redirect('login')->with('alert','Anda belum login, silahkan login terlebih dahulu');
        }
        else{
            if(Session::get('akses') == 'Admin'){
                $barang = Produk::orderBy('id', 'asc')->get();
                return view('transaksi/tambah',compact(['barang']));
            }else{
                return redirect('/transaksi');
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $transaksi = new Transaksi();
        $transaksi->tgl_transaksi = Carbon::now();
        $transaksi->total_transaksi = $request->total_harga_hidden;
        $transaksi->created_by = Session::get('id');
        $transaksi->save();
        
        $transaksiDetail = new TransaksiDetail();
        $transaksiDetail->id_transaksi = $transaksi->id;
        $transaksiDetail->id_produk = $request->id_produk;
        $transaksiDetail->jumlah_barang = $request->jumlah_pembelian;
        $transaksiDetail->total_pembelian = $request->total_harga_hidden;
        $transaksiDetail->save();

        $produk = Produk::find($request->id_produk);
        $produk->stok = $produk->stok - $request->jumlah_pembelian;
        $produk->save();

        $struk = TransaksiDetail::where('id',$transaksiDetail->id)->get();
        $pdf = PDF::loadView('transaksi.struk', ['nama'=>Session::get('nama'),'struk'=>$struk])->setPaper('a4', 'potrait');
        return $pdf->download('struk-'. time() .'.pdf');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
