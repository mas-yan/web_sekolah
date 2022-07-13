<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Activity;

class ActivityController extends Controller
{
    public function index()
    {
        $activities = Activity::paginate(12);
        return view('frontend.activities.index', compact('activities'));
    }

    public function show(Activity $activity)
    {
        return view('frontend.activities.show', compact('activity'));
    }
}
