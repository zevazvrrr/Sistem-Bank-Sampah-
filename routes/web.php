<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModulSatuController;

Route::post('/login-process', [ModulSatuController::class, 'loginProcess'])->name('login.process');
// Form login
Route::get('/login', [ModulSatuController::class, 'index'])->name('login');

// Tampilan dashboard
Route::get('/dashboard', [ModulSatuController::class, 'dashboard'])->name('dashboard');

// Logout
Route::post('/logout', [ModulSatuController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return view('welcome');
});

// Route untuk menampilkan UI Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Route untuk menampilkan form Login (opsional, jika ingin sekalian bisa dibuka)
Route::get('/auth/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/modul-1', [ModulSatuController::class, 'index']);