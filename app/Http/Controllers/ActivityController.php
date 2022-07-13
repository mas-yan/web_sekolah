<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActivityRequest;
use App\Models\Activity;
use Yajra\DataTables\Facades\DataTables as DataTables;
use App\Traits\HasImage;
use Illuminate\Support\Facades\Storage;

class ActivityController extends Controller
{
    use HasImage;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $activity = Activity::query()->latest();
            return DataTables::of($activity)
                ->addIndexColumn()
                ->addcolumn('tanggal', function ($activity) {
                    return $activity->tgl;
                })
                ->addColumn('action', function ($activity) {
                    return '<a href="' . route("activities.edit", $activity->slug) . '" class="btn btn-warning"><i class="fas fa-edit"></i></a> | <button class="btn btn-danger"onclick="destroy(this)" id="' . $activity->slug . '" data-url="' . route('activities.destroy', $activity->slug) . '" data-id="' . $activity->slug . '"><i class="fas fa-trash"></i></button>';
                })
                ->rawColumns(['action'])
                ->make();
        }
        return view('admin.activities.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $activity = new Activity();
        return view('admin.activities.add', compact('activity'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ActivityRequest $request)
    {
        Activity::create([
            'title' => $request->title,
            'slug' => str()->slug(($request->title)),
            'date' => $request->date,
            'description' => $this->articleImage($request->description),
        ]);
        return redirect()->route('activities.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function show(Activity $activity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function edit(Activity $activity)
    {

        return view('admin.activities.edit', compact('activity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function update(ActivityRequest $request, Activity $activity)
    {
        $activity->update([
            'title' => $request->title,
            'slug' => str()->slug(($request->title)),
            'date' => $request->date,
            'description' => $request->description,
        ]);
        return redirect()->route('activities.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $activity)
    {
        $description = $activity->description;
        $dom = new \DomDocument();
        @$dom->loadHtml($description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');

        // foreach image
        foreach ($images as $k => $img) {
            $data = $img->getAttribute('src');
            Storage::disk('local')->delete('public/upload/' . basename($data));
        }
        $activity->delete();
    }
}
