<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WritingController;
use App\Http\Middlewares\NoCache;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('lp'));

Route::get('/register', fn() => view('auth.register'));
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', fn() => view('auth.login'))->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth', NoCache::class])->group(function () {
    Route::get('/home', [HomeController::class, 'index']);

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/writings/{wiriting}', [WritingController::class, 'show']);
});
