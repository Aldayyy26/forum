<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post; // Pastikan ini sudah diimpor
use App\Models\Comment; 


// app/Http/Controllers/CommentController.php
class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'body' => 'required',
        ]);

        Comment::create([
            'post_id' => $post->id,
            'user_id' => auth()->id(),
            'body' => $request->body,
        ]);

        return redirect()->route('posts.show', $post);
    }
}