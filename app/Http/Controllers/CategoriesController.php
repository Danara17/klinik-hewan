<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Post;
use App\Models\User;
use Creativeorange\Gravatar\Facades\Gravatar;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $avatar = Gravatar::get(auth()->user()->email);
        $title = 'Category';
        $categories = Categories::all();
        return view('dashboard.author.category.index', [
            'page_title' => $title,
            'avatar' => $avatar,
            'dataCategory' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $avatar = Gravatar::get(auth()->user()->email);
        $title = 'Create Category';



        return view('dashboard.author.category.create', [
            'page_title' => $title,
            'avatar' => $avatar,

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $name = $request->input('name');
        $data = ['name' => $name, 'slug' => Str::slug($name)];
        Categories::create($data);
        return redirect()->route('category.index')->with('success', 'Kategori Berhasil Ditambahkan.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $avatar = Gravatar::get(auth()->user()->email);
        $title = 'Create Category';
        $category = Categories::findOrFail($id);
        $posts = $category->posts;

        return view('dashboard.author.post.show', [
            'page_title' => $title,
            'avatar' => $avatar,
            'posts' => $posts
        ]);
    }

    public function publicCategories()
    {
        // $allCategories = Categories::all();
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
}
