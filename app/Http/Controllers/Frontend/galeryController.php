<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Image;

class galeryController extends Controller
{
    public function index()
    {
        $images = Image::paginate(12);
        return view('frontend.galery.index', compact('images'));
    }

    public function show(Image $image)
    {
        return view('frontend.galery.show', compact('image'));
    }
}
