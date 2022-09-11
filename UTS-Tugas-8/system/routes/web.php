<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\KomenAdminController;
use App\Http\Controllers\KomenController;
use App\Http\Controllers\ClientController;

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

Route::get('/', [ClientController::class, 'showHome']);
Route::get('artikel', [ClientController::class, 'showArtikel']);
Route::get('home', [ClientController::class, 'showHome']);
Route::post('artikel/{artikel}', [KomenController::class, 'store']);
Route::get('artikel/{artikel}', [ClientController::class, 'showArtikel']);

Route::get('beranda', [HomeController::class, 'showBeranda']);
Route::resource('komen', KomenController::class);

Route::get('test/{produk}/{hargaMin?}/{hargaMax?}', [HomeController::class, 'test']);

route::prefix('admin')->middleware('auth')->group(function () {
    Route::post('artikel/filter', [ArtikelController::class, 'filter']);
    Route::resource('user', UserController::class);
    Route::resource('komen', KomenAdminController::class);
    Route::resource('artikel', ArtikelController::class);
});


Route::get('login', [AuthController::class, 'showLogin'])->name('login');
Route::post('login', [AuthController::class, 'LoginProcess']);
Route::get('logout', [AuthController::class, 'logout']);
