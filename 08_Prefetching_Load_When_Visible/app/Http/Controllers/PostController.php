<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        // pageination example
        $page = $request->query('page', 1);

        $perPage = 10;

        $posts = Post::latest()->paginate($perPage);

        $postsData = $posts->items(); // posts array
        $hasMorePages = $posts->hasMorePages(); // boolean if there are more pages
        $total = $posts->total(); // total number of posts

        return Inertia::render('Posts/Index', [
            'posts' => $page === 1
                ? $postsData
                : Inertia::merge($postsData),

            'pagination' => [
                'currentPage' => $page,
                'perPage' => $perPage,
                'hasMorePages' => $hasMorePages,
                'total' => $total,
            ],
        ]);






        /*  return Inertia::render('Posts/Index', [
            'posts' => fn () => Post::all(),
            'stats' => Inertia::optional(fn () => [
                'total' => Post::count(),
                'published' => Post::where('published', true)->count(),
                'unpublished' => Post::where('published', false)->count(),
            ]),
            'users' => Auth::user()
        ]); */
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
