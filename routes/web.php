<?php

use App\Http\Controllers\HomeController;
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

    // Tanaman

    // Gen
    Route::get('gen', [HomeController::class, 'gen'])->name('gen');
    Route::get('gen/tambah', [HomeController::class, 'create']);
    Route::post('gen/add', [HomeController::class, 'add']);
    Route::get('gen/edit/{id}', [HomeController::class, 'edit']);
    Route::post('gen/update/{id}', [HomeController::class, 'update']);
    Route::get('gen/destroy/{id}', [HomeController::class, 'destroy']);

    // proses kebun

    // panen kebun

    // trans 1

    // trans 2

    // trans 3

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

    // penggajian

    Route::get('logout', [LoginController::class, 'logout'])->name('logout');

});
