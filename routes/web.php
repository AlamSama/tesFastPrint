<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\kategoriController;
use App\Http\Controllers\produkController;
use App\Http\Controllers\statusController;
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





Route::middleware('guest')->group(function () {
    Route::get('/login', [authController::class, 'login'])->name('login');
    Route::get('/register', [authController::class, 'register'])->name('register');
    Route::post('/register', [authController::class, 'postregister'])->name('postRegister');
    Route::post('/login', [authController::class, 'postlogin'])->name('postLogin');
});

Route::middleware('auth')->group(function () {
    Route::get('/', [dashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [authController::class, 'logout'])->name('logout');
    Route::resource('/produk', produkController::class)->names([
        'index' => 'produk',
        'create' => 'createProduk',
        'store' => 'storeProduk',
        'edit' => 'editProduk',
        'update' => 'updateProduk',
        'destroy' => 'destroyProduk',
    ]);
    Route::get('/arsipProduk', [produkController::class, 'arsip'])->name('arsipProduk');
    Route::get('/restoreProduk/{id}', [produkController::class, 'restore'])->name('restoreProduk');

    Route::resource('/kategori', kategoriController::class)->names([
        'index' => 'kategori',
        'create' => 'createKategori',
        'store' => 'storeKategori',
        'edit' => 'editKategori',
        'update' => 'updateKategori',
        'destroy' => 'destroyKategori',
    ]);
    Route::get('/arsipKategori', [kategoriController::class, 'arsip'])->name('arsipKategori');
    Route::get('/restoreKategori/{id}', [kategoriController::class, 'restore'])->name('restoreKategori');

    Route::resource('/status', statusController::class)->names([
        'index' => 'status',
        'create' => 'createStatus',
        'store' => 'storeStatus',
        'edit' => 'editStatus',
        'update' => 'updateStatus',
        'destroy' => 'destroyStatus',
    ]);
    Route::get('/arsipStatus', [statusController::class, 'arsip'])->name('arsipStatus');
    Route::get('/restoreStatus/{id}', [statusController::class, 'restore'])->name('restoreStatus');
});
