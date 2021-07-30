<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\KontingenController;
use App\Http\Controllers\MuridController;
use App\Http\Controllers\TingkatController;

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

Route::get('/', [WebController::class, 'index']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/kontingen', [KontingenController::class, 'index'])->name('kontingen');
Route::get('/kontingen/add_kontingen', [KontingenController::class, 'create']);
Route::post('/simpan', [KontingenController::class, 'store'])->name('simpan');
Route::get('/kontingen/dtl_kontingen/{id}', [KontingenController::class, 'detail'])->name('detail');

Route::get('/murid', [MuridController::class, 'index'])->name('murid');
Route::get('/murid/add_murid', [MuridController::class, 'create'])->name('add.murid');
Route::post('/murid_simpan', [MuridController::class, 'store'])->name('murid.simpan');

Route::get('/tingkat/{id}', [TingkatController::class, 'index'])->name('tingkat');