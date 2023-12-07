<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PengajuanController;

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
// Route::get('/barang', function (){
//     return view('barang');
// });
Route::get('/barang', [BarangController::class, 'index']);
Route::get('/qrcode/{id}', [BarangController::class, 'qrcode']);
Route::get('/barang/{id}', [BarangController::class, 'edit']);
Route::patch('/edit-barang/{id}', [BarangController::class, 'update']);
Route::get('/download-qrcode/{id}', [YourController::class, 'downloadQrCode'])->name('download.qrcode');
Route::delete('/barang', [BarangController::class, 'index']);
Route::get('/add-barang', [BarangController::class, 'create']);
Route::post('/add-barang', [BarangController::class, 'store']);


Route::get('/pengajuan', [PengajuanController::class, 'index']);
Route::get('/pengajuan/{id}', [PengajuanController::class, 'show']);
Route::patch('/pengajuan/{id}', [PengajuanController::class, 'update']);
// Route::get('/', function () {
//     return view('home');
// });
Route::get('/home', function () {
    return view('home');
});
Route::get('/', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LoginController::class, 'store']);

// Route::get('/pengajuan', function () {
//     return view('pengajuan.index');
// });
// Route::get('/pengajuan/isi', function () {
//     return view('pengajuan.isiPengajuan');
// });
