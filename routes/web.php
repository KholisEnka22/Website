<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\KontingenController;
use App\Http\Controllers\MuridController;
use App\Http\Controllers\TingkatController;
use App\Http\Controllers\Account\AccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\PelatihController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\TahunController;
use App\Http\Controllers\UserController;

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

// Auth::routes(['verify' => true]);

//
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'postlogin'])->name('postlogin');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');



Route::group(
    [
        'middleware' => ['auth', 'checkRole:admin']
    ],
    function () {

        Route::get('/kontingen', [KontingenController::class, 'index'])->name('kontingen');
        Route::get('/kontingen/add_kontingen', [KontingenController::class, 'create']);
        Route::post('/konti_simpan', [KontingenController::class, 'store'])->name('konti.simpan');
        Route::get('/kontingen/dtl_kontingen/{id}/{slug}', [KontingenController::class, 'detail'])->name('detail');
        Route::get('/delete/{id}', [KontingenController::class, 'hapus'])->name('hapus');

        Route::get('/murid', [MuridController::class, 'index'])->name('murid');
        Route::get('/murid/dtl_murid/{id}/{slug}', [MuridController::class, 'detail'])->name('dtl_murid');
        Route::get('/murid/add_murid', [MuridController::class, 'create'])->name('add.murid');
        Route::post('/murid_simpan', [MuridController::class, 'store'])->name('murid.simpan');
        Route::get('/murid/edit_murid/{id}/{slug}', [MuridController::class, 'edit'])->name('edit.murid');
        Route::post('/update_murid/{id}', [MuridController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [MuridController::class, 'hapus'])->name('hapus');

        Route::post('/import_murid', [MuridController::class, 'muridimportexcel'])->name('import.murid');

        Route::get('/ppp', [PembayaranController::class, 'index'])->name('ppp');
        Route::get('/ppp/add_ppp', [PembayaranController::class, 'create'])->name('add.ppp');
        Route::post('/ppp/simpan', [PembayaranController::class, 'store'])->name('ppp.simpan');

        Route::get('/pelatih', [PelatihController::class, 'index'])->name('pelatih');
        Route::get('/add_pelatih', [PelatihController::class, 'create'])->name('add.pelatih');
        Route::post('/simpan', [PelatihController::class, 'store'])->name('pelatih.simpan');

        Route::get('/tingkat', [TingkatController::class, 'index'])->name('tingkat');
        Route::get('/tingkat/{id}', [TingkatController::class, 'show'])->name('dtl.tingkat');

        Route::get('/tahun', [TahunController::class, 'index'])->name('tahun');
        Route::get('/add_tahun', [TahunController::class, 'create'])->name('add.tahun');
        Route::post('/tahun_simpan', [TahunController::class, 'store'])->name('tahun.simpan');
    }
);

Route::group(
    [
        'middleware' => ['auth', 'checkRole:admin,murid']
    ],
    function () {
        Route::get('/home', [HomeController::class, 'index'])->name('home');

        // Route::get('/user', [DataController::class, 'index'])->name('user');
        Route::get('/data', [DataController::class, 'data'])->name('data');

        Route::get('/account/profil', [AccountController::class, 'profil'])->name('account.profil');
        Route::post('/account/profil', [AccountController::class, 'update'])->name('post.profil');
    }
);