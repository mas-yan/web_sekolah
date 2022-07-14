<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Traits\HasImage;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables as DataTables;

class SliderController extends Controller
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
            $sliders = Slider::query()->latest();
            return DataTables::of($sliders)
                ->addIndexColumn()
                ->editColumn('slider', function ($slider) {
                    return '<img src="' . $slider->slider . '" alt="image" class="rounded" width="50px">';
                })
                ->addColumn('action', function ($slider) {
                    return '<button class="btn btn-warning edit" onclick="edit(this)" data-url="' . route('sliders.update', $slider->id) . '" data-value="' . $slider->slider . '"><i class="fas fa-edit"></i></button> | <button class="btn btn-danger"onclick="destroy(this)" id="{{$slider->id}}" data-url="' . route('sliders.destroy', $slider->id) . '" data-id="' . $slider->id . '"><i class="fas fa-trash"></i></button>';
                })
                ->rawColumns(['action', 'slider'])
                ->make();
        }
        return view('admin.slider.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'image' => 'required|image|mimes:png,jpg,jpeg|max:2048'
            ],
            $this->messages()
        );

        Slider::create([
            'slider' => $this->uploadImage($request, 'public/sliders/')->hashName(),
            'link' => '#'
        ]);

        return redirect()->route('sliders.index')->with('success', 'Slider berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $request->validate(
            [
                'image_edit' => 'required|image|mimes:png,jpg,jpeg|max:2048'
            ],
            $this->messages()
        );

        if ($request->file('image_edit')) {
            Storage::disk('local')->delete('public/sliders/' . basename($slider->slider));
            $image = $request->file('image_edit');
            $image->storeAs('public/sliders/', $image->hashName());
        } else {
            $image = basename($slider->slider);
        }

        $slider->update([
            'slider' => $image->hashName()
        ]);

        return redirect()->route('sliders.index')->with('success', 'Slider Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        Storage::disk('local')->delete('public/sliders/' . basename($slider->slider));
        $slider->delete();
    }

    public function messages()
    {
        return [
            'image.required' => 'slider harus di isi',
            'image_edit.required' => 'slider harus di isi',
        ];
    }
}
