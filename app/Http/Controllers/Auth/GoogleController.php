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

  // Handle Google callback
public function handleGoogleCallback()
{
    try {
        $googleUser = Socialite::driver('google')->user();
    
        // Lanjutkan dengan proses autentikasi
        $user = User::where('email', $googleUser->getEmail())->first();

        if ($user) {
            Auth::login($user);
        } else {
            // Prepare user data
            $userData = [
                'name' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'email_verified_at' => now(),
                'password' => bcrypt(uniqid()),
                'role' => 'user',
            ];

            // Check if address and phone are available in Google user data
            if ($googleUser->address) {
                $userData['address'] = $googleUser->address;
            }
            if ($googleUser->phone) {
                $userData['phone'] = $googleUser->phone;
            }

            // Create new user
            $user = User::create($userData);
            Auth::login($user);
        }

        return redirect()->route('dashboard.show.user');

    } catch (\Exception $e) {
        Log::error('Google authentication error:', ['error' => $e->getMessage()]);
        return redirect()->route('auth.show.login')->with('error', 'Gagal melakukan autentikasi Google.');
    }
}

};