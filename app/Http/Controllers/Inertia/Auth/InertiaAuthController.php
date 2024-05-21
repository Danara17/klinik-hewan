<?php

namespace App\Http\Controllers\Inertia\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class InertiaAuthController extends Controller
{
    //
    public function login(){
        return Inertia::render('Auth/Login');
    }
    public function authenticate(Request $request){
     $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            switch (auth()->user()->role) {
                case 'admin':
                    return redirect()->intended('/dashboard');
                    break;
                case 'doctor':
                    return redirect()->intended('/dashboard/doctor/workspace');
                    break;
                case 'author':
                    return redirect()->intended('/dashboard/author/workspace');
                    break;
                default:
                    return redirect()->intended('/dashboard/user/preview');
                    break;
            }
        }

        return redirect()->route('auth.show.login')->with('error', 'Email atau Password salah');
    }
}
