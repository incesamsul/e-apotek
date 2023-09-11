<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\General;
use App\Http\Controllers\Home;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LupaKataSandiController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PosController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::post('/postlogin', [LoginController::class, 'postLogin']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::get('/', [Home::class, 'home']);


Route::get('/tentang_aplikasi', [Home::class, 'tentangAplikasi']);


Route::group(['middleware' => ['guest']], function () {
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::get('/register', [LoginController::class, 'register']);
});

// GENERAL CONTROLLER ROUTE
Route::group(['middleware' => ['auth', 'ceklevel:Administrator,owner,kasir']], function () {

    Route::get('/dashboard', [General::class, 'dashboard']);
    Route::get('/profile', [General::class, 'profile']);
    Route::get('/bantuan', [General::class, 'bantuan']);
    Route::post('/ganti_kata_sandi', [General::class, 'gantiKataSandi']);

    Route::post('/ubah_foto_profile', [General::class, 'ubahFotoProfile']);
    Route::post('/ubah_role', [General::class, 'ubahRole']);
});

// ADMIN ROUTE
Route::group(['middleware' => ['auth', 'ceklevel:user']], function () {
});


// ADMIN ROUTE
Route::group(['middleware' => ['auth', 'ceklevel:Administrator,owner,kasir']], function () {
    Route::group(['prefix' => 'admin'], function () {
        // GET REQUEST
        Route::get('/pengguna', [Admin::class, 'pengguna']);
        Route::get('/fetch_data', [Admin::class, 'fetchData']);
        Route::get('/kategori', [KategoriController::class, 'kategori']);
        Route::get('/kategori/{id_kategori}', [KategoriController::class, 'kategori']);
        Route::get('/barang/main', [BarangController::class, 'main']);
        Route::get('/barang', [BarangController::class, 'barang']);
        Route::get('/stok_barang', [BarangController::class, 'stokBarang']);
        Route::get('/barang/{id_barang}', [BarangController::class, 'barang']);


        // CRUD MENU
        Route::post('/tambah_barang', [BarangController::class, 'tambahBarang']);
        Route::post('/ubah_barang', [BarangController::class, 'ubahBarang']);
        Route::get('/hapus_barang/{id_kategori}', [BarangController::class, 'hapusBarang']);

        // CRUD KATEGORI
        Route::post('/tambah_kategori', [KategoriController::class, 'tambahKategori']);
        Route::post('/ubah_kategori', [KategoriController::class, 'ubahKategori']);
        Route::get('/hapus_kategori/{id_kategori}', [KategoriController::class, 'hapusKategori']);

        // CRUD PENGGUNA
        Route::post('/create_pengguna', [Admin::class, 'createPengguna']);
        Route::post('/update_pengguna', [Admin::class, 'updatePengguna']);
        Route::post('/delete_pengguna', [Admin::class, 'deletePengguna']);
    });
});



// KASIR ROUTE
Route::group(['middleware' => ['auth', 'ceklevel:Administrator,kasir,owner']], function () {
    Route::group(['prefix' => 'kasir'], function () {
        // GET REQUEST

        Route::get('/pos', [PosController::class, 'pos']);
        Route::get('/pos/kategori/{kategori}', [PosController::class, 'posKategori']);
        Route::get('/pos/cetak', [PosController::class, 'cetakPos']);
        Route::get('/pos/cetak/{id_transaksi_pos}', [PosController::class, 'cetakPos']);
        Route::post('/pos/cari', [PosController::class, 'posCari']);
        Route::get('/transaksi_pos', [PosController::class, 'transaksiPos']);
        Route::get('/transaksi_pos/{id_transaksi_pos}', [PosController::class, 'detailTransaksiPos']);
        Route::post('/create_pos', [PosController::class, 'createPos']);
    });
});

// OWNER ROUTE
Route::group(['middleware' => ['auth', 'ceklevel:owner']], function () {
    Route::group(['prefix' => 'owner'], function () {
        // GET REQUEST

    });
});


// ROUTE LUPA KATA SANDI

Route::get("/lupa-kata-sandi", [LupaKataSandiController::class, "index"])->name("lupa-kata-sandi");
Route::get("/lupa-kata-sandi/{response}", [LupaKataSandiController::class, "index"]);
Route::post("/kirim-konfirmasi-wa", [LupaKataSandiController::class, "kirimKonfirmasiWa"])->name("kirim-konfirmasi-wa");
Route::get('/reset-password/{kode_reset}', [LupaKataSandiController::class, "getResetPassword"])->name('getResetPassword');
Route::post('/post-reset-password/{kode_reset}', [LupaKataSandiController::class, "resetPassword"])->name('post-reset-password');
