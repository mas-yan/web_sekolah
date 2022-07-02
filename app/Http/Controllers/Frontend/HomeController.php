<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Information;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate('3');
        $informations = Information::latest()->take('3')->get();
        return view('frontend.index', compact('posts', 'informations'));
    }

    public function show(Post $post)
    {
        return view('frontend.show', compact('post'));
    }
}
