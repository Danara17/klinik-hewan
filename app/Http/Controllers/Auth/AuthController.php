<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function showRegister()
    {
        return Inertia::render('Auth/Register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->route('auth.show.register')->withErrors($validator)->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($user) {
            Auth::login($user);
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
        } else {
            return redirect()->route('auth.show.register')->with('error', 'Gagal manambahkan akun');
        }

    }

    public function login(Request $request)
    {
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


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('auth.show.login');
    }
}
