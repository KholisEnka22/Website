<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\KontingenController;
use App\Http\Controllers\MuridController;
use App\Http\Controllers\TingkatController;
use App\Http\Controllers\Account\AccountController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;

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

Route::get('/', [WebController::class, 'index'])->name('dashboard');

Auth::routes(['verify' => true]);


// Route::group([
//     'prefix' => config('admin.prefix'),
//     'namespace' => 'App\\Http\\Controllers',
// ], function () {

//     Route::get('/login', [LoginController::class, 'formLogin'])->name('admin.login');
//     Route::post('/login', [LoginController::class, 'login']);

//     Route::middleware(['auth:admin'])->group(function () {
//         Route::post('logout', 'LoginController@logout')->name('admin.logout');
//         Route::view('/', 'home')->name('home');
//     });
// });


Route::get('/home', [HomeController::class, 'index'])->name('admin.home');

Route::get('/kontingen', [KontingenController::class, 'index'])->name('kontingen');
Route::get('/kontingen/add_kontingen', [KontingenController::class, 'create']);
Route::post('/simpan', [KontingenController::class, 'store'])->name('simpan');
Route::get('/kontingen/dtl_kontingen/{id}/{slug}', [KontingenController::class, 'detail'])->name('detail');
Route::get('/delete/{id}', [KontingenController::class, 'hapus'])->name('hapus');

Route::get('/murid', [MuridController::class, 'index'])->name('murid');
Route::get('/murid/dtl_murid/{id}/{slug}', [MuridController::class, 'detail'])->name('dtl_murid');
Route::get('/murid/add_murid', [MuridController::class, 'create'])->name('add.murid');
Route::post('/murid_simpan', [MuridController::class, 'store'])->name('murid.simpan');
Route::get('/murid/edit_murid/{id}/{slug}', [MuridController::class, 'edit'])->name('edit.murid');
Route::post('/update_murid/{id}', [MuridController::class, 'update'])->name('update');
Route::get('/delete/{id}', [MuridController::class, 'hapus'])->name('hapus');

Route::get('/tingkat', [TingkatController::class, 'index'])->name('tingkat');
Route::get('/tingkat/{id}', [TingkatController::class, 'show'])->name('tingkat');

Route::get('/user', [UserController::class, 'index'])->name('user');
Route::get('/data', [UserController::class, 'data'])->name('data');

Route::get('/account/profil', [AccountController::class, 'profil'])->name('account.profil');
Route::post('/account/profil', [AccountController::class, 'update'])->name('account.profil');