<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index()
    {

        if (Auth::user()->can('viewAny', Auth::user())) {
            return Inertia::render('Users');
        } else {
            abort(403, 'Unauthorized action.');
        }
    }

    /* updateAvatar 
        store avatars public path
        $table->string('avatar')->nullable();
        
    */

    public function updateAvatar(Request $request)
    {
        $request->validate([
            'avatar' => 'sometimes|image:jpeg,png,gif,jpg:max:2048', // 2 mb
            'name' => 'sometimes|string',
        ]);

        // get auth user

        $user = $request->user();

        if ($request->file('avatar')) {
            // save path of avatar in the public and then assign to user
            $path = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $path;
        }

        if ($request->input('name')) {
            $user->name = $request->input('name');
        }

        if ($user->save()) {
            return to_route('users')->with('success',  "User Updated Successfully");
        } else {
            return to_route('users')->with('error',  "User fail to update");
        }
    }
}
