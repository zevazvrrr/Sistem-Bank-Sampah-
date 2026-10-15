<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController; // Wajib ditambahkan di Laravel 11
use App\Http\Controllers\ShuttleController;

Route::get('/', [PageController::class, 'index']);
Route::get('/about', [PageController::class, 'about']);
Route::get('/service', [PageController::class, 'service']);
Route::get('/setoran', [PageController::class, 'setoran']);
Route::get('/setoran-master', [PageController::class, 'setoran_master']);
Route::get('/setoran2', [PageController::class, 'setoran2']);
Route::resource('shuttles', ShuttleController::class);
