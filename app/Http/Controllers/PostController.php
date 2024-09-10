<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post; // Pastikan ini sudah diimpor
use App\Models\Comment; 


// app/Http/Controllers/PostController.php
class PostController extends Controller
{
    // App\Http\Controllers\PostController.php
    // PostController.php

    public function index()
    {
        // Mengambil postingan dengan urutan terbaru di atas
        $posts = Post::with('user', 'comments')->orderBy('created_at', 'desc')->get();

        return view('posts.index', compact('posts'));
    }



    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        Post::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'body' => $request->body,
        ]);

        return redirect()->route('posts.index');
    }

    public function show(Post $post)
    {
        $post->load('comments.user');
        return view('posts.show', compact('post'));
    }
}

