<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Traits\HasImage;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
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
            $posts = Post::query()->with(['tags', 'category'])->latest();
            return DataTables::of($posts)
                ->addIndexColumn()
                ->editColumn('image', function ($posts) {
                    return '<img src="' . $posts->image . '" alt="image" class="rounded" width="50px">';
                })
                ->editColumn('category_id', function ($posts) {
                    return $posts->category->category;
                })
                ->editColumn('tag_id', function ($posts) {
                    foreach ($posts->tags as $value) {
                        $tags[] = $value->tag;
                    }
                    return implode(',', $tags);
                })
                ->addColumn('action', function ($post) {
                    return '<a href="' . route("posts.edit", $post->slug) . '" class="btn btn-warning"><i class="fas fa-edit"></i></a> | <button class="btn btn-danger"onclick="destroy(this)" id="' . $post->slug . '" data-url="' . route('posts.destroy', $post->slug) . '" data-id="' . $post->slug . '"><i class="fas fa-trash"></i></button>';
                })
                ->rawColumns(['action', 'image'])
                ->make();
        }
        return view('admin.post.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        $tags = Tag::get();
        $post = new Post();
        return view('admin.post.add', compact('categories', 'tags', 'post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post = Post::create([
            'user_id' => auth()->user()->id,
            'category_id' => $request->category,
            'article' => $this->articleImage($request->article),
            'description' => $request->description,
            'image' => $this->uploadImage($request, 'public/posts/')->hashName(),
            'title' => $request->title,
            'slug' => str()->slug($request->title)
        ]);

        $post->tags()->attach($request->tag);
        return redirect()->route('posts.index')->with('success', 'Berita Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::get();
        $tags = Tag::get();
        return view('admin.post.edit', compact('categories', 'tags', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $image = $request->file('image') ? $this->uploadImage($request, 'public/posts/')->hashName() : $post->image;
        $post->updated([
            'user_id' => auth()->user()->id,
            'category_id' => $request->category,
            'article' => $this->articleImage($request->article),
            'description' => $request->description,
            'image' => $image,
            'title' => $request->title,
            'slug' => str()->slug($request->title)
        ]);

        $post->tags()->sync($request->tag);
        return redirect()->route('posts.index')->with('success', 'Berita Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $article = $post->article;
        $dom = new \DomDocument();
        @$dom->loadHtml($article, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');

        // foreach image
        foreach ($images as $k => $img) {
            $data = $img->getAttribute('src');
            Storage::disk('local')->delete('public/upload/' . basename($data));
        }
        Storage::disk('local')->delete('public/posts/' . basename($post->image));
        $post->delete();
    }
}
