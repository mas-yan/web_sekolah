<?php

namespace App\Http\Controllers;

use App\Http\Requests\JurusanRequest;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use App\Traits\HasImage;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables as DataTables;

class JurusanController extends Controller
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
            $jurusan = Jurusan::query()->latest();
            return DataTables::of($jurusan)
                ->addIndexColumn()
                ->addColumn('action', function ($jurusan) {
                    return '<a href="' . route("jurusan.edit", $jurusan->slug) . '" class="btn btn-warning"><i class="fas fa-edit"></i></a> | <button class="btn btn-danger"onclick="destroy(this)" id="' . $jurusan->slug . '" data-url="' . route('jurusan.destroy', $jurusan->slug) . '" data-id="' . $jurusan->slug . '"><i class="fas fa-trash"></i></button>';
                })
                ->rawColumns(['action', 'image'])
                ->make();
        }
        return view('admin.jurusan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jurusan = new Jurusan();
        return view('admin.jurusan.add', compact('jurusan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JurusanRequest $request)
    {
        Jurusan::create([
            'title' => $request->title,
            'slug' => str()->slug(($request->title)),
            'description' => $this->articleImage($request->description),
        ]);
        return redirect()->route('jurusan.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function show(Jurusan $jurusan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function edit(Jurusan $jurusan)
    {
        return view('admin.jurusan.edit', compact('jurusan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function update(JurusanRequest $request, Jurusan $jurusan)
    {
        $jurusan->update([
            'title' => $request->title,
            'slug' => str()->slug(($request->title)),
            'description' => $request->description,
        ]);
        return redirect()->route('jurusan.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jurusan $jurusan)
    {
        $description = $jurusan->description;
        $dom = new \DomDocument();
        @$dom->loadHtml($description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');

        // foreach image
        foreach ($images as $k => $img) {
            $data = $img->getAttribute('src');
            Storage::disk('local')->delete('public/upload/' . basename($data));
        }
        $jurusan->delete();
    }
}
