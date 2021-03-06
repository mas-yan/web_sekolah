<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables as DataTables;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $tags = Tag::query()->latest();
            return DataTables::of($tags)
                ->addIndexColumn()
                ->addColumn('action', function ($tag) {
                    return '<button class="btn btn-warning edit" onclick="edit(this)" data-url="' . route('tags.update', $tag->id) . '" data-value="' . $tag->tag . '"><i class="fas fa-edit"></i></button> | <button class="btn btn-danger"onclick="destroy(this)" id="{{$tag->id}}" data-url="' . route('tags.destroy', $tag->id) . '" data-id="' . $tag->id . '"><i class="fas fa-trash"></i></button>';
                })
                ->make();
        }
        return view('admin.tag.index');
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
                'tag' => 'required|unique:tags,tag'
            ],
            $this->messages()
        );

        Tag::create([
            'tag' => $request->tag
        ]);

        return redirect()->route('tags.index')->with('success', 'Tag berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $request->validate(
            [
                'tag_edit' => [
                    'required',
                    Rule::unique('tags', 'tag')->ignore($tag->id, 'id')
                ]
            ],
            $this->messages()
        );

        $tag->update([
            'tag' => $request->tag_edit
        ]);

        return redirect()->route('tags.index')->with('success', 'Tag Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
    }

    public function messages()
    {
        return [
            'tag.required' => 'tag harus di isi',
            'tag.unique' => 'tag sudah ada.',
            'tag_edit.required' => 'tag harus di isi',
            'tag_edit.unique' => 'tag sudah ada.',
        ];
    }
}
