<?php

use App\Http\Controllers\fakturController;
use App\Http\Controllers\produkController;
use App\Http\Controllers\transaksiController;
use App\Http\Controllers\usersController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [usersController::class, 'index']);
Route::post('/', [usersController::class, 'login']);
Route::get('home', function () {
    return view('home');
});

Route::resource('produk',produkController::class);
Route::resource('transaksi',transaksiController::class);
Route::resource('faktur',fakturController::class);