<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\MengajarController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\SiswaController;
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

Route::get('/', [IndexController::class, 'index']);
Route::get('/home', [IndexController::class, 'home']);
Route::post('/loginAdmin', [IndexController::class, 'loginAdmin']);
Route::post('/loginSiswa', [IndexController::class, 'loginSiswa']);
Route::post('/loginGuru', [IndexController::class, 'loginGuru']);
Route::get('/logout', [IndexController::class, 'logout']);

Route::middleware(['checkUserRole:admin'])->group(function () {
    Route::prefix('guru')->group(function () {
        Route::get('/index', [GuruController::class, 'index']);
        Route::get('/create', [GuruController::class, 'create']);
        Route::post('/store', [GuruController::class, 'store']);
        Route::get('/edit/{guru}', [GuruController::class, 'edit']);
        Route::post('/update/{guru}', [GuruController::class, 'update']);
        Route::get('/destroy/{guru}', [GuruController::class, 'destroy']);
    });

    Route::prefix('kelas')->group(function () {
        Route::get('/index', [KelasController::class, 'index']);
        Route::get('/create', [KelasController::class, 'create']);
        Route::post('/store', [KelasController::class, 'store']);
        Route::get('/edit/{kelas}', [KelasController::class, 'edit']);
        Route::post('/update/{kelas}', [KelasController::class, 'update']);
        Route::get('/destroy/{kelas}', [KelasController::class, 'destroy']);
    });

    Route::prefix('siswa')->group(function () {
        Route::get('/index', [SiswaController::class, 'index']);
        Route::get('/create', [SiswaController::class, 'create']);
        Route::post('/store', [SiswaController::class, 'store']);
        Route::get('/edit/{siswa}', [SiswaController::class, 'edit']);
        Route::post('/update/{siswa}', [SiswaController::class, 'update']);
        Route::get('/destroy/{siswa}', [SiswaController::class, 'destroy']);
    });

    Route::prefix('mapel')->group(function () {
        Route::get('/index', [MapelController::class, 'index']);
        Route::get('/create', [MapelController::class, 'create']);
        Route::post('/store', [MapelController::class, 'store']);
        Route::get('/edit/{mapel}', [MapelController::class, 'edit']);
        Route::post('/update/{mapel}', [MapelController::class, 'update']);
        Route::get('/destroy/{mapel}', [MapelController::class, 'destroy']);
    });

    Route::prefix('mengajar')->group(function () {
        Route::get('/index', [MengajarController::class, 'index']);
        Route::get('/create', [MengajarController::class, 'create']);
        Route::post('/store', [MengajarController::class, 'store']);
        Route::get('/edit/{mengajar}', [MengajarController::class, 'edit']);
        Route::post('/update/{mengajar}', [MengajarController::class, 'update']);
        Route::get('/destroy/{mengajar}', [MengajarController::class, 'destroy']);
    });
});

Route::prefix('nilai')->group(function () {
    Route::get('/index', [NilaiController::class, 'index']);
    Route::get('/kelas/{idGuru}/{idKelas}', [NilaiController::class, 'kelas']);
    Route::get('/create/{idGuru}/{idKelas}', [NilaiController::class, 'create']);
    Route::post('/store', [NilaiController::class, 'store']);
    Route::get('/edit/{nilai}', [NilaiController::class, 'edit']);
    Route::post('/update/{nilai}', [NilaiController::class, 'update']);
    Route::get('/destroy/{nilai}', [NilaiController::class, 'destroy']);
});
