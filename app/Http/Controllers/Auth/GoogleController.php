<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            Log::info('Google User Info:', ['user' => $googleUser]);

            $user = User::where('email', $googleUser->getEmail())->first();

            if ($user) {
                Auth::login($user);
            } else {
                $user = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'password' => bcrypt(uniqid()),
                    'role' => 'user',
                ]);
                Auth::login($user);
            }

            return redirect()->route('dashboard.show.user');

        } catch (\Exception $e) {
            Log::error('Google authentication error:', ['error' => $e->getMessage()]);
            return redirect()->route('auth.show.login')->with('error', 'Gagal melakukan autentikasi Google.');
        }
    }
}
