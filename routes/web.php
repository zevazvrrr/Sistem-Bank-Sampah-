<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModulSatuController;

Route::get('/', function () {
    return view('welcome');
});

// Route untuk menampilkan UI Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
});

// Route untuk menampilkan form Login (opsional, jika ingin sekalian bisa dibuka)
Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/modul-1', [ModulSatuController::class, 'index']);