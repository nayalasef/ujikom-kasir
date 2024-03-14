<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Session;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::controller(AuthController::class)->group(function () {
    Route::get('/', 'index')->name('auth');
    Route::get('/login', 'login')->name('auth.login');
    Route::post('/loginPost', 'loginPost')->name('auth.post');
    // Route::get('/register', 'register');
    // Route::get('/registerPost', 'registerPost');
    Route::get('/logout', 'logout')->name('auth.logout');
});

Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

Route::controller(ProdukController::class)->group(function () {
    Route::get('produk', 'index')->name('produk');
    Route::get('produk-cetak-pdf', 'reportPDF')->name('produk.pdf');
    Route::get('produk/tambah', 'create')->name('produk.tambah');
    Route::post('produk/store', 'store')->name('produk.store');
    Route::get('produk/{id}', 'show')->name('produk.show');
    Route::get('produk/{id}/edit', 'edit')->name('produk.edit');
    Route::put('produk/{id}/update', 'update')->name('produk.update');
    Route::delete('produk/{id}', 'destroy')->name('produk.hapus');

});

Route::controller(TransaksiController::class)->group(function () {
    Route::get('transaksi', 'index')->name('transaksi');
    Route::get('transaksi/tambah', 'create')->name('transaksi.tambah');
    Route::post('transaksi/store', 'store')->name('transaksi.store');
    Route::get('transaksi/{id}', 'show')->name('transaksi.show');
    Route::get('transaksi/{id}/edit', 'edit')->name('transaksi.edit');
    Route::put('transaksi/{id}/update', 'update')->name('transaksi.update');
    Route::delete('transaksi/{id}', 'destroy')->name('transaksi.hapus');
});

// Route::get('/transaksi', function () { return view('index'); })->name('transaksi');

Route::get('/laporan', function () { return view('index'); })->name('laporan');

Route::controller(LaporanController::class)->group(function () {
    Route::get('laporan', 'index')->name('laporan');
    Route::get('laporan-kotor', 'labaKotor')->name('laporan.kotor');
    Route::get('laporan-bersih', 'labaBersih')->name('laporan.bersih');
});

