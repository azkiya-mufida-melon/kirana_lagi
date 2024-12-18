<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\StatusPesananController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\TPKController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TransaksiController;


// Route halaman utama
Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Route resource untuk Status Pesanan
Route::resource('status_pesanans', StatusPesananController::class);

// Route resource untuk Laporan
Route::resource('laporans', LaporanController::class);

// Route untuk export PDF

Route::get('/download-pdf', [PDFController::class, 'downloadPdf']);

Route::get('/tpk', [TPKController::class, 'index'])->name('tpk.index');
Route::get('/tpk/calculate', [TPKController::class, 'calculate'])->name('tpk.calculate');
Route::get('/tpk/{id}', [TPKController::class, 'show'])->name('tpk.show');
Route::get('/hitung-tpk', [TPKController::class, 'hitungTPK']);

Route::resource('/biodatas', \App\Http\Controllers\BiodataController::class);

Route::resource('/menus', \App\Http\Controllers\MenuController::class);

Route::resource('/pesanans', \App\Http\Controllers\PesananController::class);

Route::resource('/transaksis', \App\Http\Controllers\TransaksiController::class);


Route::get('login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('auth.authenticate');

// Register
Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/register', [AuthController::class, 'store'])->name('auth.store');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/absensis', [AbsensiController::class, 'index'])->name('absensis.index');
    Route::post('/absensis', [AbsensiController::class, 'store'])->name('absensis.store');
});