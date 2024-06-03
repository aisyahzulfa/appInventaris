<?php

use App\Models\jenis;
use App\Http\Controllers\ruang;
use App\Http\Controllers\pegawai;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\jenisController;
use App\Http\Controllers\ruangController;
use App\Http\Controllers\pegawaiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\jenis as ControllersJenis;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\DashboardController;

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
    return view('dashboard');
});
//jenis
Route::get('/dashboard', [DashboardController::class,'index']);
Route::get('/jenis', [jeniscontroller::class,'index']);
Route::get('/jenis/create', [jeniscontroller::class,'create']);
Route::post('/jenis/store', [jenisController::class,'store']);

Route::get('/jenis/hapus/{id}',[jeniscontroller::class,'destroy']);
Route::get('/jenis/editjenis/{id}',[jeniscontroller::class,'edit']);
Route::post('/jenis/updatejenis',[jeniscontroller::class,'update']);

//pegawai
Route::get('/pegawai', [pegawaicontroller::class,'index']);
Route::get('/pegawai/create', [pegawaicontroller::class,'create']);
Route::post('/pegawai/store', [pegawaicontroller::class,'store']);

Route::get('/pegawai/hapus/{id}',[pegawaicontroller::class,'destroy']);
Route::get('/pegawai/edit/{id}',[pegawaicontroller::class,'edit']);
Route::post('/pegawai/update',[pegawaicontroller::class,'update']);


Route::get('/jenis', [JenisController::class,'index']);
Route::get('/tambahjenis', [JenisController::class,'create']);
Route::post('/storejenis', [JenisController::class,'store']);
Route::get('/editjenis{id_jenis}', [JenisController::class,'edit']);
Route::post('/updatejenis', [JenisController::class,'update']);
Route::get('/hapusjenis{id_jenis}', [JenisController::class,'destroy']);

/* RUANG */
Route::get('/ruang',[ruangController::class,'index']);
Route::get('/tambahruang',[ruangController::class,'create']);
Route::post('/storeruang',[ruangController::class,'store']);
Route::get('/hapusruang{id_ruang}',[ruangController::class,'destroy']);
Route::get('/editruang{id_ruang}',[ruangController::class,'edit']);
Route::post('/updateruang',[ruangController::class,'update']);

Route::get('/Peminjaman', [PeminjamanController::class,'index']);
    Route::get('/tambahpeminjaman', [PeminjamanController::class,'create']);
    Route::post('/store', [PeminjamanController::class,'store']);

Route::get('/petugas',[PetugasController::class,'index']);
Route::get('/createpetugas',[PetugasController::class,'create']);
Route::post('/storepetugas',[PetugasController::class,'store']);
Route::get('/hapuspetugas/{id_petugas}',[PetugasController::class,'destroy']);
Route::get('/editpetugas/{id_petugas}',[PetugasController::class,'edit']);
Route::post('/petugas/update',[PetugasController::class,'update']);

Route::get('/Inventaris', [InventarisController::class,'index']);
Route::get('/tambahinventaris', [InventarisController::class,'create']);
Route::post('/storeinventaris', [InventarisController::class,'store']);
Route::get('/editinventaris{id_inventaris}', [InventarisController::class,'edit']);
Route::post('/updateinventaris', [InventarisController::class,'update']);
Route::get('/hapusinventaris{id_inventaris}', [InventarisController::class,'destroy']);