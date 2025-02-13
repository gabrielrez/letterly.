<?php

namespace App\Http\Controllers;

use App\Models\Writing;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $writings = Writing::with('user')->get();

        return view('app.home', [
            'writings' => $writings
        ]);
    }
}
