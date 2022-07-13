<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Information;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->take('3')->get();
        $informations = Information::latest()->take('3')->get();
        $galery = Image::latest()->take('2')->get();
        return view('frontend.index', compact('posts', 'informations', 'galery'));
    }

    public function show(Post $post)
    {
        return view('frontend.show', compact('post'));
    }

    public function galery(Image $image)
    {
        return view('frontend.galery.show', compact('image'));
    }
}
