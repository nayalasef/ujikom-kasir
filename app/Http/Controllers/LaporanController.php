<?php

namespace App\Http\Controllers;

use App\Models\TransaksiDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PDF;

class LaporanController extends Controller
{
    public function index() {
        if(!Session::get('login')){
            return redirect('login')->with('alert','Anda belum login, silahkan login terlebih dahulu');
        }
        else{
            if(Session::get('akses') == 'Admin'){
                return view('laporan/index');
            }else{
                return redirect('/transaksi');
            }
        }
    }

    public function labaKotor () {
        $transaksi = TransaksiDetail::orderBy('id', 'asc')->get();

        $pdf = PDF::loadView('pdf.transaksi-kotor', ['transaksi'=>$transaksi])->setPaper('a4', 'potrait');
        return $pdf->download('laba-kotor-'. time() .'.pdf');
    }

    public function labaBersih () {
        $transaksi = TransaksiDetail::orderBy('id', 'asc')->get();

        $pdf = PDF::loadView('pdf.transaksi-bersih', ['transaksi'=>$transaksi])->setPaper('a4', 'potrait');
        return $pdf->download('laba-bersih-'. time() .'.pdf'); 
    }
}
