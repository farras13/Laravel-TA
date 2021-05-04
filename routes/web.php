<?php

use App\Http\Controllers\GudangController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KebunController;
use App\Http\Controllers\LabController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PersilanganController;
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

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/regis', [LoginController::class, 'register'])->name('register');
Route::post('login', [LoginController::class, 'proslog']);
Route::post('regis', [LoginController::class, 'prosreg']);

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Persilangan
    Route::get('persilangan', [PersilanganController::class, 'index'])->name('persilangan');
    Route::get('persilangan/tambah', [PersilanganController::class, 'create']);
    Route::post('persilangan/add', [PersilanganController::class, 'add']);
    Route::get('persilangan/edit/{id}', [PersilanganController::class, 'edit']);
    Route::post('persilangan/update/{id}', [PersilanganController::class, 'update']);
    Route::get('persilangan/destroy/{id}', [PersilanganController::class, 'destroy']);

    // Gen
    Route::get('gen', [HomeController::class, 'gen'])->name('gen');
    Route::get('gen/tambah', [HomeController::class, 'create']);
    Route::post('gen/add', [HomeController::class, 'add']);
    Route::get('gen/edit/{id}', [HomeController::class, 'edit']);
    Route::post('gen/update/{id}', [HomeController::class, 'update']);
    Route::get('gen/destroy/{id}', [HomeController::class, 'destroy']);

    // proses kebun
    Route::get('kebun/proses', [KebunController::class, 'index'])->name('proses');
    Route::get('kebun/proses/tambah', [KebunController::class, 'create']);
    Route::post('kebun/proses/add', [KebunController::class, 'add']);
    Route::get('kebun/proses/edit/{id}', [KebunController::class, 'edit']);
    Route::post('kebun/proses/update/{id}', [KebunController::class, 'update']);
    Route::get('kebun/proses/destroy/{id}', [KebunController::class, 'destroy']);

    // panen kebun
    Route::get('kebun/panen', [KebunController::class, 'panen'])->name('panen');
    Route::get('kebun/panen/tambah', [KebunController::class, 'createP']);
    Route::post('kebun/panen/add', [KebunController::class, 'addP']);
    Route::get('kebun/panen/edit/{id}', [KebunController::class, 'editP']);
    Route::post('kebun/panen/update/{id}', [KebunController::class, 'updateP']);
    Route::get('kebun/panen/destroy/{id}', [KebunController::class, 'destroyP']);
    // trans 1
    Route::get('trans', [LabController::class, 'index'])->name('trans');
    Route::get('trans/tambah', [LabController::class, 'create']);
    Route::post('trans/add', [LabController::class, 'add']);
    Route::get('trans/edit/{id}', [LabController::class, 'edit']);
    Route::post('trans/update/{id}', [LabController::class, 'update']);
    Route::get('trans/destroy/{id}', [LabController::class, 'destroy']);
    // trans 2
    Route::get('trans2', [LabController::class, 'trans2'])->name('trans2');
    Route::get('trans2/tambah', [LabController::class, 'create2']);
    Route::post('trans2/add', [LabController::class, 'add2']);
    Route::get('trans2/edit/{id}', [LabController::class, 'edit2']);
    Route::post('trans2/update/{id}', [LabController::class, 'update2']);
    Route::get('trans2/destroy/{id}', [LabController::class, 'destroy2']);
    // trans 3
    Route::get('trans3', [LabController::class, 'trans3'])->name('trans3');
    Route::get('trans3/tambah', [LabController::class, 'create3']);
    Route::post('trans3/add', [LabController::class, 'add3']);
    Route::get('trans3/edit/{id}', [LabController::class, 'edit3']);
    Route::post('trans3/update/{id}', [LabController::class, 'update3']);
    Route::get('trans3/destroy/{id}', [LabController::class, 'destroy3']);
    // pegawai
    Route::get('pegawai', [PegawaiController::class, 'index'])->name('pegawai');
    Route::get('pegawai/tambah', [PegawaiController::class, 'create']);
    Route::get('pegawai/edit/{id}', [PegawaiController::class, 'edit']);
    Route::post('pegawai/update/{id}', [PegawaiController::class, 'update']);
    Route::get('pegawai/destroy/{id}', [PegawaiController::class, 'destroy']);

    //akun
    Route::get('akun', [PegawaiController::class, 'akun'])->name('akun');
    Route::get('akun/tambah', [PegawaiController::class, 'create']);
    Route::get('akun/edit/{id}', [PegawaiController::class, 'editAkun']);
    Route::post('akun/update/{id}', [PegawaiController::class, 'updateAkun']);
    Route::get('akun/destroy/{id}', [PegawaiController::class, 'destroy']);

    // inventory
    Route::get('gudang', [GudangController::class, 'index'])->name('gudang');
    Route::get('gudang/tambah', [GudangController::class, 'create']);
    Route::post('gudang/add', [GudangController::class, 'add']);
    Route::get('gudang/edit/{id}', [GudangController::class, 'edit']);
    Route::get('gudang/detail/{id}', [GudangController::class, 'detail']);
    Route::post('gudang/update/{id}', [GudangController::class, 'update']);
    Route::get('gudang/destroy/{id}', [GudangController::class, 'destroy']);

    // Masuk
    Route::get('eksternal/in', [GudangController::class, 'eksin'])->name('eksin');
    Route::get('eksternal/in/tambah', [GudangController::class, 'create2']);
    Route::post('eksternal/in/add', [GudangController::class, 'add2']);
    Route::get('eksternal/in/edit/{id}', [GudangController::class, 'edit2']);
    Route::post('eksternal/in/update/{id}', [GudangController::class, 'update2']);
    Route::get('eksternal/in/destroy/{id}', [GudangController::class, 'destroy2']);

    // Keluar
    Route::get('eksternal/out', [GudangController::class, 'eksout'])->name('eksout');
    Route::get('eksternal/out/tambah', [GudangController::class, 'create3']);
    Route::post('eksternal/out/add', [GudangController::class, 'add3']);
    Route::get('eksternal/out/edit/{id}', [GudangController::class, 'edit3']);
    Route::get('eksternal/out/getData/{id}', [GudangController::class, 'getData']);
    Route::post('eksternal/out/update/{id}', [GudangController::class, 'update3']);
    Route::get('eksternal/out/destroy/{id}', [GudangController::class, 'destroy3']);

    // penggajian

    Route::get('logout', [LoginController::class, 'logout'])->name('logout');

});
