<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;

class DashboardController extends Controller
{
    //index defer 

    public function index()
    {
        //
        
        return Inertia::render('Dashboard/Index', [
            'user' => Auth::user(),
            'title' => 'Dashboard',
            'posts' => Post::all(),
            'todos' => Inertia::defer(
                fn() => 
                Http::withoutVerifying()->get('https://jsonplaceholder.typicode.com/todos?_limit=30')
                ->json()
            ),
            'notifications' => Notification::all(),
           
        ]);
    }
}
