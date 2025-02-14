<?php

namespace App\Http\Controllers;

use App\Models\Writing;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // TODO:
        // Recomendation feed system (Base on factors)
        // Don't list the posts of the auth user as it can be seen in his profile page

        $writings = Writing::with('user')->get();

        return view('app.home', [
            'writings' => $writings
        ]);
    }
}
