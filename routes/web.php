<?php

use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// ==========================================================================
// 1. HALAMAN FORM PENDAFTARAN (Terbuka untuk Umum)
// ==========================================================================
Route::get('/', function () {
    return view('welcome');
});
Route::post('/daftar', [PendaftaranController::class, 'store'])->name('pendaftaran.store');


// ==========================================================================
// 2. AREA DASHBOARD & PROFILE ADMIN (Wajib Login)
// ==========================================================================
Route::middleware(['auth', 'verified'])->group(function () {
    // Halaman Utama Dashboard Admin (Melihat data pendaftar)
    Route::get('/dashboard', [PendaftaranController::class, 'index'])->name('dashboard');

    // Fitur Hapus Data Pendaftar (Fitur Baru)
    Route::delete('/pendaftaran/{id}', [PendaftaranController::class, 'destroy'])->name('pendaftaran.destroy');

    // Fitur Manajemen Profile Admin (Mengatasi error merah navigasi)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// ==========================================================================
// 3. FITUR UTK MENUTUP REGISTER OTOMATIS
// ==========================================================================
// Kita override/timpa route register bawaan Breeze sebelum memanggil auth.php
Route::get('register', function () {
    return redirect('/login'); // Jika ada yang iseng buka /register, langsung ditendang ke /login
});
Route::post('register', function () {
    return abort(404); // Jika ada hit method POST ke register, lempar error 404
});

// Memanggil sisa route auth bawaan Breeze (Login, Logout, Reset Password, dll)
require __DIR__.'/auth.php';
