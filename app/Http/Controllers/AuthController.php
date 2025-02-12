<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register(Request $request): RedirectResponse
    {
        $attributes = $request->validate([
            'first_name' => ['required', 'max:254'],
            'last_name'  => ['required', 'max:254'],
            'email'      => ['required', 'email', 'max:254', 'unique:users,email'],
            'password'   => ['required', Password::min(6)->max(18)->letters()->numbers(), 'confirmed'],
        ]);

        $user = User::create($attributes);

        Auth::login($user);

        return redirect('/home');
    }

    public function login(Request $request): RedirectResponse
    {
        $attributes = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (!Auth::attempt($attributes)) {
            throw ValidationException::withMessages([
                'email' => 'Oh no! Those credentials do not match'
            ]);
        }

        request()->session()->regenerate();

        return redirect('/home');
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();
        return redirect('/login');
    }
}
