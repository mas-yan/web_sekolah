<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use App\Models\GaleryImage;
use App\Models\Image;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables as DataTables;
use App\Traits\HasImage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
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
            $image = Image::query()->latest();
            return DataTables::of($image)
                ->addIndexColumn()
                ->editColumn('image', function ($posts) {
                    return '<img src="' . $posts->image . '" alt="image" class="rounded" width="50px">';
                })
                ->addColumn('action', function ($image) {
                    return '<a href="' . route("images.show", $image->slug) . '" class="btn btn-success"><i class="fas fa-eye"></i></a> | <button class="btn btn-danger"onclick="destroy(this)" id="' . $image->slug . '" data-url="' . route('images.destroy', $image->slug) . '" data-id="' . $image->slug . '"><i class="fas fa-trash"></i></button>';
                })
                ->rawColumns(['action', 'image'])
                ->make();
        }
        return view('admin.images.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $image = new Image();
        return view('admin.images.add', ['image' => $image]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ImageRequest $request)
    {
        try {
            DB::beginTransaction();

            $image = Image::create([
                'description' => $this->articleImage($request->description),
                'title' => $request->title,
                'image' => $this->uploadImage($request, 'public/images/')->hashName(),
                'slug' => str()->slug($request->title)
            ]);

            foreach ($request->file('images') as $imagefile) {
                $imagefile->storeAs('public/images/', $imagefile->hashName());
                GaleryImage::create([
                    'image_id' => $image->id,
                    'image' => $imagefile->hashName()
                ]);
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }

        return redirect()->route('images.index')->with('success', 'Galeri Gambar Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        return view('admin.images.show', compact('image'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        return view('admin.images.edit', compact('image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(ImageRequest $request, Image $image)
    {
        // dd($image->image);
        if ($request->file('image')) {
            Storage::disk('local')->delete('public/images/' . basename($image->image));
            $gambar = $this->uploadImage($request, 'public/images/')->hashName();
        } else {
            $gambar = basename($image->image);
        }
        $image->update([
            'description' => $request->description,
            'image' => $gambar,
            'title' => $request->title,
            'slug' => str()->slug($request->title)
        ]);

        return redirect()->route('images.index')->with('success', 'Galeri Gambar Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        try {
            DB::beginTransaction();

            $description = $image->description;
            $dom = new \DomDocument();
            @$dom->loadHtml($description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            $images = $dom->getElementsByTagName('img');

            // foreach image
            foreach ($images as $k => $img) {
                $data = $img->getAttribute('src');
                Storage::disk('local')->delete('public/upload/' . basename($data));
            }
            $galery = GaleryImage::where('image_id', $image->id)->get();

            foreach ($galery as $value) {
                $id = $value->id;
                Storage::disk('local')->delete('public/images/' . basename($value->image));
                GaleryImage::where('id', $id)->delete();
            }

            Storage::disk('local')->delete('public/images/' . basename($image->image));
            $image->delete();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
