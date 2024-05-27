<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Post;
use Carbon\Carbon;
use Creativeorange\Gravatar\Facades\Gravatar;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $avatar = Gravatar::get(auth()->user()->email);
        $title = 'Post';
        $post = Post::all();
        return view('dashboard.author.post.index', [
            'avatar' => $avatar,
            'page_title' => $title,
            'post' => $post
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Categories::all();
        $avatar = Gravatar::get(auth()->user()->email);
        $title = 'Create Post';
        return view('dashboard.author.post.create', [
            'avatar' => $avatar,
            'page_title' => $title,
            'category' => $category
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // TODO : Create Validation
        $category = $request->id_category;
        $id_category_array = array_map('intval', explode(',', $category));

        $data = [
            'slug' => $request->slug,
            'title' => $request->title,
            'body' => $request->body,
            'author_id' => auth()->user()->id,
            'published_at' => Carbon::now(),
        ];

        Post::create($data);
        $data_id = Post::latest()->first()->id;
        $new_category_relation = [
            'post_id' => $data_id,
            'category_id' => $category
        ];
        return redirect()->route('post.create-new-post', [
            'post_id' => $new_category_relation['post_id'],
            'category_id' => $new_category_relation['category_id']
        ]);
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
        $post = Post::findOrFail($id);
        $categories = Categories::all();
        $avatar = Gravatar::get(auth()->user()->email);
        $title = 'Edit Post';

        return view('dashboard.author.post.edit', [
            'avatar' => $avatar,
            'page_title' => $title,
            'post' => $post,
            'categories' => $categories
            
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the request...

        // Update post data
        $post = Post::find($id);
    $post->update([
        'slug' => $request->slug,
        'title' => $request->title,
        'body' => $request->body,
        'author_id' => auth()->user()->id,
        'published_at' => Carbon::now(),
    ]);

    // Detach existing categories and attach new ones
    $category_ids = $request->id_category ? explode(',', $request->id_category) : [];
    if (!empty($category_ids)) {
        $valid_category_ids = Categories::whereIn('id', $category_ids)->pluck('id')->toArray();
        $post->categories()->sync($valid_category_ids);

        // Update the timestamps in the pivot table
        foreach ($valid_category_ids as $category_id) {
            $post->categories()->updateExistingPivot($category_id, ['created_at' => now(), 'updated_at' => now()]);
        }
    } else {
        $post->categories()->detach();
    }

    return redirect()->route('post.index')->with('success', 'Post updated successfully.');
}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->categories()->detach();
        $post->delete();

        return redirect()->route('post.index')->with('success', 'Post deleted successfully.');
    }
}
