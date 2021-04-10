<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
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

    Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');

});
