<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Writing;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class WritingController extends Controller
{
    public function show(Writing $writing)
    {

        $writing->load('user');

        return view('app.writings.show', [
            'writing' => $writing
        ]);
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'title'    => ['required', 'max:60'],
            'subtitle' => ['required', 'max:120'],
            'content'  => ['required'],
            'user_id'  => ['required', 'integer', 'exists:users,id'],
        ]);

        Writing::create($attributes);

        return redirect('/home');
    }

    public function toggleSave(Request $request, Writing $writing): JsonResponse
    {
        $user = $request->user();

        if ($user->savedWritings()->where('writing_id', $writing->id)->exists()) {
            $user->savedWritings()->detach($writing->id);
            return response()->json(['success' => true, 'saved' => false]);
        }

        $user->savedWritings()->attach($writing->id);
        return response()->json(['success' => true, 'saved' => true]);
    }

    public function saves(Request $request)
    {
        return view('app.user.saves', [
            'writings' => User::saves($request->user())
        ]);
    }
}
