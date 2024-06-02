<?php

namespace App\Http\Controllers;

use App\Models\User;
use Creativeorange\Gravatar\Facades\Gravatar;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = User::where('role', 'author')->get();
        $avatar = Gravatar::get(auth()->user()->email);
        $title = 'Author';
        return view('dashboard.admin.author.index', [
            'avatar' => $avatar,
            'page_title' => $title,
            'dataAuthor' => $authors
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $user = User::where('role', 'user')->get();
        $avatar = Gravatar::get(auth()->user()->email);
        $title = 'Create Author';
        return view('dashboard.admin.author.create', [
            'avatar' => $avatar,
            'page_title' => $title,
            'dataUser' => $user
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        User::where('id', $request->id_name)->update([
            'role' => 'author'
        ]);

        return redirect()->route('author.index')->with('success', 'Author berhasil ditambahkan');
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
        User::destroy($id);
        return redirect()->route('author.index')->with('success', 'Author berhasil dihapus');
    }
}
