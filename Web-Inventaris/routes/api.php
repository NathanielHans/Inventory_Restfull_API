<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use \Illuminate\Http\Middleware\HandleCors;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Models\Maintenance;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
// Route::group(['middleware' => ['cors']], function () {
//     // Rute-rute yang membutuhkan CORS
// });

Route::group(['middleware' => [HandleCors::class]], function () {
    // Define your API routes here
    Route::get('/qrcode/{id}', [BarangController::class, 'qrcode']);
    Route::get('/barang', [BarangController::class, 'index']);
    Route::get('/barang/{id}', [BarangController::class, 'show']);
    Route::post('/barang', [BarangController::class, 'store']);
    Route::patch('/barang/{id}', [BarangController::class, 'update']);
    Route::delete('/barang/{id}', [BarangController::class, 'destroy']);
    
    Route::get('/pengajuan', [PengajuanController::class, 'index']);
    Route::get('/pengajuan/{id}', [PengajuanController::class, 'show']);
    Route::post('/pengajuan', [PengajuanController::class, 'store']);
    Route::patch('/pengajuan/{id}', [PengajuanController::class, 'update']);
    Route::delete('/pengajuan/{id}', [PengajuanController::class, 'destroy']);
    Route::patch('/konfirmasi/{id}', [PengajuanController::class, 'Confirm']);

    Route::get('/maintenance', [MaintenanceController::class, 'index']);
    Route::get('/maintenance/{id}', [MaintenanceController::class, 'show']);
    Route::post('/maintenance', [MaintenanceController::class, 'store']);
    Route::patch('/maintenance/{id}', [MaintenanceController::class, 'update']);
    Route::delete('/maintenance/{id}', [MaintenanceController::class, 'destroy']);

    Route::post('/register', [RegisterController::class, 'store']);
    Route::post('/login', [LoginController::class, 'authenticate']);
    Route::post('/logout', [LoginController::class, 'logout']);

    // ...
});

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
