<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TopUpController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/topup', [TopUpController::class, 'topup'])->name('topup');
