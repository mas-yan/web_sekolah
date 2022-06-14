<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $categories = Category::query()->latest();
            return DataTables::of($categories)
                ->addIndexColumn()
                ->addColumn('action', function ($category) {
                    return '<button class="btn btn-warning edit" onclick="edit(this)" data-url="' . route('categories.destroy', $category->id) . '" data-value="' . $category->category . '"><i class="fas fa-edit"></i></button> | <button class="btn btn-danger"onclick="destroy(this)" id="' . $category->id . '" data-url="' . route('categories.destroy', $category->id) . '" data-id="' . $category->id . '"><i class="fas fa-trash"></i></button>';
                })
                ->make();
        }
        return view('admin.category.index');
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
                'category' => 'required|unique:categories,category'
            ],
            $this->messages()
        );

        Category::create([
            'category' => $request->category
        ]);

        return redirect()->route('categories.index')->with('success', 'Kategori berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate(
            [
                'category_edit' => [
                    'required',
                    Rule::unique('categories', 'category')->ignore($category->id, 'id')
                ]
            ],
            $this->messages()
        );

        $category->update([
            'category' => $request->category_edit
        ]);

        return redirect()->route('categories.index')->with('success', 'Kategori Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
    }

    public function messages()
    {
        return [
            'category.required' => 'Kategori harus di isi',
            'category.unique' => 'Kategori sudah ada.',
            'category_edit.required' => 'Kategori harus di isi',
            'category_edit.unique' => 'Kategori sudah ada.',
        ];
    }
}
