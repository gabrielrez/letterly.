<?php

namespace App\Http\Controllers;

use App\Models\Writing;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile(Request $request)
    {
        $writings = $request->user()->writings()->get();

        return view('app.user.profile', [
            'writings' => $writings
        ]);
    }
}
