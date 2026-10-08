<?php

use App\Http\Controllers\ModulSatuController;
use App\Http\Controllers\NasabahController;
use Illuminate\Support\Facades\Route;

// =========================
// LOGIN
// =========================

// Form Login
Route::get('/login', [ModulSatuController::class, 'index'])
    ->name('login');

// Proses Login
Route::post('/login-process', [ModulSatuController::class, 'login'])
    ->name('login.process');

// Logout
Route::post('/logout', [ModulSatuController::class, 'logout'])
    ->name('logout');

// =========================
// DASHBOARD
// =========================

// Halaman Dashboard
Route::get('/dashboard', [ModulSatuController::class, 'dashboard'])
    ->name('dashboard');

// =========================
// KELOLA NASABAH
// =========================

// =========================
// INPUT SAMPAH
// =========================

// Halaman Input Sampah
Route::get('/input_sampah', function () {
    return view('input_sampah');
})->name('input_sampah');

Route::redirect('/input-sampah.html', '/input_sampah');

// =========================
// HALAMAN UTAMA
// =========================

// Halaman utama
Route::get('/', function () {
    return view('welcome');
});

// =========================
// ROUTE NASABAH
// =========================

Route::get('/kelola_nasabah', [NasabahController::class, 'index'])->name('nasabah.index');
Route::post('/kelola_nasabah/store', [NasabahController::class, 'store'])->name('nasabah.store');
Route::put('/kelola_nasabah/{id}', [NasabahController::class, 'update'])->name('nasabah.update');
Route::patch('/kelola_nasabah/{id}/status/{status}', [NasabahController::class, 'updateStatus'])->name('nasabah.updateStatus');
Route::delete('/kelola_nasabah/{id}', [NasabahController::class, 'destroy'])->name('nasabah.destroy');
