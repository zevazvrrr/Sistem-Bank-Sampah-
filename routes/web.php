<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModulSatuController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/modul-1', [ModulSatuController::class, 'index']);