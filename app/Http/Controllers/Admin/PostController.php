<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

/**
 *
 */
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * {@see http://php.net/manual/en/function.htmlspecialchars.php функция htmlspecialchars()}
     */
    #[qwerty]
    public function index()
    {
        $posts = Post::query()->with('category')->paginate(1);
        return view('admin.post.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::query()->pluck('title', 'id')->all();
        return view('admin.post.create', [
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'title' => ['required', 'max:255'],
                'content' => ['required'],
                'meta_desc' => ['required', 'max:255'],
                'category_id' => ['required', 'exists:categories,id'],//check on exists
                'thumb' => ['max:255', 'image', 'mimes:jpeg,png,jpg,gif,svg'],
            ]
        );
        Post::query()->create($validated);

        return redirect()->route('admin.posts.index')->with('success', 'Post added successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
