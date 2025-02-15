<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
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

    Route::get('/writings/compose', fn() => view('app.writings.create'));
    Route::get('/writings/{writing}', [WritingController::class, 'show']);
    Route::post('/writings', [WritingController::class, 'store']);
    Route::post('/writings/{writing}/toggle-save', [WritingController::class, 'toggleSave']);

    Route::get('/profile', [UserController::class, 'profile']);
    Route::get('/profile/{user}', [UserController::class, 'show']);
    Route::get('/saves', [WritingController::class, 'saves']);

    Route::get('/is-following/{user}', [UserController::class, 'checkIfFollowing']);
    Route::post('/follow/{user}', [UserController::class, 'follow']);
    Route::delete('/unfollow/{user}', [UserController::class, 'unfollow']);
});
