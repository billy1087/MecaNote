<?php

// use App\Http\Controllers\DashboardAdminController;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\PiutangController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\HutangController;
use App\Http\Controllers\PanduanController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\RekaptransaksiController;
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

Route::get('/', function () {
    return view('home');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'cekLogin']);
Route::post('/logout', [LoginController::class, 'logout']);


Route::get('/registrasi', [RegistrasiController::class, 'create']);
Route::post('/registrasi', [RegistrasiController::class, 'store']);


Route::resource('/dashboard', DashboardController::class)->middleware('auth');
Route::resource('/pemasukan', PemasukanController::class)->middleware('auth');
Route::resource('/piutang', PiutangController::class)->middleware('auth');
Route::resource('/pengeluaran', PengeluaranController::class)->middleware('auth');
Route::resource('/hutang', HutangController::class)->middleware('auth');
Route::resource('/rekaptransaksi', RekapTransaksiController::class)->middleware('auth');
Route::resource('/admin', AdminController::class)->middleware('auth');
Route::resource('/panduan', PanduanController::class)->middleware('auth');
Route::resource('/profil', ProfilController::class)->middleware('auth');