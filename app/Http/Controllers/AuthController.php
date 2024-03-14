<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index(){
        if(!Session::get('login')){
            return redirect('login')->with('alert','Anda belum login, silahkan login terlebih dahulu');
        }
        else{
            return view('welcome');
        }
    }
    
    public function login(){
        return view('welcome');
    }
    
    public function loginPost(Request $request){
        $username = $request->username;
        $password = $request->password;
        $data = User::where('username',$username)->first();
        if($data){
            if(Hash::check($password,$data->password)){
                Session::put('id',$data->id);
                Session::put('nama',$data->nama);
                Session::put('akses',$data->akses);
                Session::put('login',TRUE);
                if($data->akses == 'Admin'){
                    return redirect('/dashboard');
                }else{
                    return redirect('/transaksi');
                }
            }
            else{
                return redirect('login')->with('alert','Email atau Password anda salah!');
            }
        }
        else{
            return redirect('login')->with('alert','Email atau Password anda salah!');
        }
    }
    
    public function logout(){
        Session::flush();
        return redirect('login')->with('alert','Anda telah logout');
    }
    
    public function register(Request $request){
        return view('register');
    }
    
    public function registerPost(){
        $data =  new User();
        $data->nama = 'Nayla';
        $data->akses = 'Admin';
        $data->username = 'NaylaSe';
        $data->password = bcrypt('login');
        $data->save();
        return redirect('login')->with('alert-success','Anda berhasil register');
    }
}