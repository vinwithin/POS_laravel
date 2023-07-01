<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\profilController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\trasactionController;
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

Route::get('/', function () {
    return redirect('login');
});
Route::get('login', [LoginController::class, 'index']);
Route::get('signin', [RegisterController::class, 'index']);
Route::get('logout', [LoginController::class, 'logout']);
Route::post('login/proses', [LoginController::class, 'login']);
Route::post('signin/proses', [RegisterController::class, 'register']);
Route::get('dashboard', [dashboardController::class, 'index'])->middleware('isLogin');
Route::resource('manage', BarangController::class)->middleware('isLogin');
Route::resource('riwayat', RiwayatController::class)->middleware('isLogin');
Route::get('about', function(){
    return view('about/index');
})->middleware('isLogin');
Route::get('transaksi', [trasactionController::class, 'index']);
Route::get('profil', [profilController::class, 'index']);
Route::post('/transaksi/submit', [trasactionController::class, 'submit']);
Route::get('/transaksi/delete/{id}', [trasactionController::class, 'destroy']);
Route::get('/transaksi/delete', [trasactionController::class, 'cetak']);
