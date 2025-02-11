<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('lp'));

Route::get('/register', fn() => view('auth.register'));
Route::get('/login', fn() => view('auth.login'));
