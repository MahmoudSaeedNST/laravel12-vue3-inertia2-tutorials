<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index()
    {
        return Inertia::render('Users', [
            'username' => 'JohnDoe'
        ]);
    }

    /* updateAvatar 
        store avatars public path
        $table->string('avatar')->nullable();
        
    */

    public function updateAvatar(Request $request)
    {
        $validated = $request->validate([
            'name' => 'sometimes|string',
            'avatar' => 'nullable|image|max:2048' // 2 mb image size
        ]);

        $user = $request->user();

        if ($request->input('name')) {
            $user->name = $request->input('name');
        }

        if ($request->file('avatar')) {
            $path = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $path;
        }

        //dd($validated);

        $user->save();

        return Inertia::render('Home', [
            'user' => $user
        ]);
    }
}
