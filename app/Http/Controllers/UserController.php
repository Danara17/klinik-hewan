<?php

namespace App\Http\Controllers;

use App\Models\User;
use Creativeorange\Gravatar\Facades\Gravatar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $user = User::where('role', 'user')->get();
        $avatar = Gravatar::get(auth()->user()->email);
        $title = 'User';
        return view('dashboard.admin.user.index', [
            'avatar' => $avatar,
            'page_title' => $title,
            'dataUser' => $user
        ]);
    }

    public function create()
    {
        $user = User::all();
        $avatar = Gravatar::get(auth()->user()->email);
        $title = 'Create User';
        return view('dashboard.admin.user.create', [
            'avatar' => $avatar,
            'page_title' => $title,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'required',
            'address' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('user.admin.create')->withErrors($validator)->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return redirect()->route('user.index')->with('success', 'Berhasil membuat User (Customer)');

    }

    public function store_from_quick(Request $request)
    {
        dd($request->all());
    }


    public function getUser()
    {
        return response()->json(Auth::user());
    }


}
