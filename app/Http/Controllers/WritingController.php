<?php

namespace App\Http\Controllers;

use App\Models\Writing;
use Illuminate\Http\Request;

class WritingController extends Controller
{
    public function show(Writing $writing){

        $writing->load('user');

        return view('app.writings.show', [
            'writing' => $writing
        ]);
    }

    public function edit(Request $request, Writing $id){
        // Load the edit writing view
    }

    public function create(){
        return view('app.writings.create');
    }

    public function store(Request $request){
        $attributes = $request->validate([
            'title'    => ['required', 'max:60'],
            'subtitle' => ['required', 'max:120'],
            'content'  => ['required'],
            'user_id'  => ['required', 'integer', 'exists:users,id'],
        ]);

        Writing::create($attributes);

        return redirect('/home');
    }

    public function update(Request $request, Writing $id){
        // Update an especific writing
    }

    public function destroy(Writing $id){
        // Delete an especific writing
    }
}
