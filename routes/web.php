<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Owner;
use App\Http\Controllers\Petugas;
use App\Http\Controllers\Pelanggan;
use App\Http\Controllers\Pelanggan\LandingController;
use Illuminate\Support\Facades\Route;

// Guest Routes
Route::middleware('guest')->group(function () {
    Route::get('/', [LandingController::class, 'index'])->name('landing');
    Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Admin Routes
    Route::prefix('admin')->name('admin.')->middleware('role.admin')->group(function () {
        Route::get('/dashboard', [Admin\DashboardController::class, 'index'])->name('dashboard');
        Route::resource('users', Admin\UserController::class);
        Route::resource('layanan', Admin\LayananController::class);
        Route::resource('jadwal', Admin\JadwalController::class);
        Route::resource('booking', Admin\BookingController::class);
        Route::resource('antrian', Admin\AntrianController::class);
        Route::get('laporan', [Admin\LaporanController::class, 'index'])->name('laporan');
    });

    // Owner Routes
    Route::prefix('owner')->name('owner.')->middleware('role.owner')->group(function () {
        Route::get('/dashboard', [Owner\DashboardController::class, 'index'])->name('dashboard');
        Route::get('/laporan', [Owner\LaporanController::class, 'index'])->name('laporan');
    });

    // Petugas Routes
    Route::prefix('petugas')->name('petugas.')->middleware('role.petugas')->group(function () {
        Route::get('/dashboard', [Petugas\DashboardController::class, 'index'])->name('dashboard');
        Route::resource('antrian', Petugas\AntrianController::class);
    });

    // Pelanggan Routes
    Route::prefix('pelanggan')->name('pelanggan.')->middleware('role.pelanggan')->group(function () {
        Route::get('/dashboard', [Pelanggan\DashboardController::class, 'index'])->name('dashboard');
        Route::resource('booking', Pelanggan\BookingController::class);
        Route::get('/antrian', [Pelanggan\AntrianController::class, 'index'])->name('antrian');
    });
});
