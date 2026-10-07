<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModulSatuController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/modul-1', [ModulSatuController::class, 'index']);

Route::get('/auth/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');