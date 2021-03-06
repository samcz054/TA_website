<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login',[App\Http\Controllers\API\Auth\AuthController::class,'login']);

Route::post('/peminjaman/pinjam',[App\Http\Controllers\API\PeminjamanController::class, 'pinjam']);
Route::post('/peminjaman/kembali',[App\Http\Controllers\API\PeminjamanController::class, 'pengembalian']);

Route::get('/detail/{kode_barang}',[App\Http\Controllers\API\PeminjamanController::class, 'detailBarang']);
Route::get('/checkKode/{kode_barang}',[App\Http\Controllers\API\PeminjamanController::class, 'cekKodeBarang']);
