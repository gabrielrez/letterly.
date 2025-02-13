<?php

namespace App\Http\Controllers;

use App\Models\Writing;
use Illuminate\Http\Request;

class WritingController extends Controller
{
    public function show(Request $request, Writing $id){
        // Retrieve an especific writing
    }

    public function edit(Request $request, Writing $id){
        // Load the edit writing view
    }

    public function update(Request $request, Writing $id){
        // Update an especific writing
    }

    public function destroy(Writing $id){
        // Delete an especific writing
    }
}
