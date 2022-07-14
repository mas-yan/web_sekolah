<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Image;
use App\Models\Information;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->take('3')->get();
        $informations = Information::latest()->take('3')->get();
        $activities = Activity::latest()->take('3')->get();
        $galery = Image::latest()->take('2')->get();
        return view('frontend.index', compact('posts', 'informations', 'galery', 'activities'));
    }
}
