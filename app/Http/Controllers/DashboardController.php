<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Category;
use App\Models\Information;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $post = Post::count();
        $category = Category::count();
        $activity = Activity::count();
        $information = Information::count();
        return view('admin.dashboard', compact('post', 'category', 'activity', 'information'));
    }
}
