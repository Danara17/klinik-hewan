<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\PostCategories;
use Illuminate\Http\Request;

class PostCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function showRelatedPosts($category_id)
    {
        $category = Categories::findOrFail($category_id);
        $relatedPosts = $category->posts()->paginate(10);
        $page_title = "Related Posts for " . $category->name;

        return view('dashboard.author.category.related_posts', compact('category', 'relatedPosts', 'page_title'));
    }



    public function create_new_post(Request $request, $post_id, $category_id)
    {
        // Mengakses nilai post_id dan category_id
        $my_post_id = $post_id;
        $category_ids = explode(',', $category_id); // Memisahkan nilai category_id menjadi array

        foreach ($category_ids as $id) {
            PostCategories::create([
                'post_id' => $my_post_id,
                'category_id' => $id
            ]);
        }

        return redirect()->route('post.index')->with('success', 'Post Berhasil Ditambahkan.');
    }
}
