<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Information;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    public function index()
    {
        $informations = Information::paginate(12);
        return view('frontend.information.index', compact('informations'));
    }

    public function show(Information $information)
    {
        return view('frontend.information.show', compact('information'));
    }
}
