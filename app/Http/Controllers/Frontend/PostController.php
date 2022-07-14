<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(12);
        return view('frontend.post.index', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('frontend.post.show', compact('post'));
    }
}
