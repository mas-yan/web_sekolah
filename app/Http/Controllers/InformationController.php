<?php

namespace App\Http\Controllers;

use App\Http\Requests\InformationRequest;
use App\Models\Information;
use Yajra\DataTables\Facades\DataTables as DataTables;
use App\Traits\HasImage;
use Illuminate\Support\Facades\Storage;

class InformationController extends Controller
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
            $information = Information::query()->latest();
            return DataTables::of($information)
                ->addIndexColumn()
                ->addcolumn('tanggal', function ($information) {
                    return $information->date;
                })
                ->addColumn('action', function ($information) {
                    return '<a href="' . route("informations.edit", $information->slug) . '" class="btn btn-warning"><i class="fas fa-edit"></i></a> | <button class="btn btn-danger"onclick="destroy(this)" id="' . $information->slug . '" data-url="' . route('informations.destroy', $information->slug) . '" data-id="' . $information->slug . '"><i class="fas fa-trash"></i></button>';
                })
                ->rawColumns(['action'])
                ->make();
        }
        return view('admin.informations.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $information = new Information();
        return view('admin.informations.add', compact('information'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InformationRequest $request)
    {
        Information::create([
            'title' => $request->title,
            'slug' => str()->slug(($request->title)),
            'description' => $this->articleImage($request->description),
        ]);
        return redirect()->route('informations.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function show(Information $information)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function edit(Information $information)
    {
        return view('admin.informations.edit', compact('information'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function update(InformationRequest $request, Information $information)
    {
        $information->update([
            'title' => $request->title,
            'slug' => str()->slug(($request->title)),
            'description' => $request->description,
        ]);
        return redirect()->route('informations.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function destroy(Information $information)
    {
        $description = $information->description;
        $dom = new \DomDocument();
        @$dom->loadHtml($description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');

        // foreach image
        foreach ($images as $k => $img) {
            $data = $img->getAttribute('src');
            Storage::disk('local')->delete('public/upload/' . basename($data));
        }
        $information->delete();
    }
}
