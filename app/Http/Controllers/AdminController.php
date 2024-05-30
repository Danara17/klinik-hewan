<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Creativeorange\Gravatar\Facades\Gravatar;
use Illuminate\Http\Request;
use Inertia\Inertia;
use PhpParser\Node\Stmt\Return_;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::where('role', 'admin')->get();
        $avatar = Gravatar::get(auth()->user()->email);
        $title = 'Admin';


        return view('dashboard.admin.admin.index', [
            'avatar' => $avatar,
            'page_title' => $title,
            'dataUser' => $user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::where('role', 'user')->get();
        $avatar = Gravatar::get(auth()->user()->email);
        $title = 'Create Admin';
        return view('dashboard.admin.admin.create', [
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

        User::where('id', $request->id_name)->update([
            'role' => 'admin'
        ]);

        return redirect()->route('admin.index')->with('success', 'Admin berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
