<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Writing;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile(Request $request)
    {
        $writings = $request->user()->writings()->get();

        return view('app.user.my-profile', [
            'writings' => $writings
        ]);
    }

    public function show(Request $request, User $user)
    {
        if ($user->id == $request->user()->id) {
            abort(404);
        }

        return view('app.user.show', [
            'user' => $user,
            'writings' => $user->writings()->get()
        ]);
    }
}
