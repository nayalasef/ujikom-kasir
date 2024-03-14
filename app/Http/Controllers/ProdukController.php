<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PDF;

class ProdukController extends Controller
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
            if(Session::get('akses') == 'Admin'){
                $data = Produk::orderBy('id', 'asc')->get();
                return view('produk/index',compact(['data']));        
            }else{
                return redirect('/transaksi');
            }
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
                return view('produk/tambah');
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
        $file = $request->file('file');
        $nama_file = time()."_".$file->getClientOriginalName();
 
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'assets/produk';
        $file->move($tujuan_upload,$nama_file);

        $produk = new Produk();
        $produk->nama = $request->nama;
        $produk->kategori = $request->kategori;
        $produk->hpp = $request->hpp;
        $produk->harga_jual = $request->harga_jual;
        $produk->gambar = $nama_file;
        $produk->stok = $request->stok;
        $produk->save();

        return redirect()->route('produk')->with('success','Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $produk = Produk::find($id);
        return $produk;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Produk::find($id)->delete();
        return redirect()->route('produk')->with('success', 'Post deleted successfully');
    }

    public function reportPDF()
    {
        $produk = Produk::orderBy('id', 'asc')->get();

        $pdf = PDF::loadView('pdf.produk-pdf', ['produk'=>$produk])->setPaper('a4', 'potrait');
        return $pdf->download('stok-produk-'. time() .'.pdf');
    }
}
