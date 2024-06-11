<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use GuzzleHttp\Client;

class GoogleController extends Controller
{
    public function redirectToGoogle(Request $request)
    {
        // Mendefinisikan scope yang diperlukan
        $scopes = [
            'https://www.googleapis.com/auth/userinfo.profile',
            'https://www.googleapis.com/auth/userinfo.email',
            'https://www.googleapis.com/auth/contacts.readonly'
        ];

        // Membangun URL redirect ke halaman login Google
        $redirectUrl = 'https://accounts.google.com/o/oauth2/auth?';
        $redirectUrl .= 'response_type=code';
        $redirectUrl .= '&client_id=' . urlencode(env('GOOGLE_CLIENT_ID'));
        $redirectUrl .= '&redirect_uri=' . urlencode(env('GOOGLE_REDIRECT_URI'));
        $redirectUrl .= '&scope=' . urlencode(implode(' ', $scopes));
        $redirectUrl .= '&access_type=offline';
        $redirectUrl .= '&prompt=consent%20select_account';

        // Mengarahkan pengguna ke URL Google untuk memulai proses autentikasi
        return redirect()->to($redirectUrl);
    }

    public function handleGoogleCallback(Request $request)
    {
        try {
            // Menukar kode otorisasi dengan token akses
            $client = new Client();
            $response = $client->post('https://www.googleapis.com/oauth2/v4/token', [
                'form_params' => [
                    'code' => $request->get('code'),
                    'client_id' => env('GOOGLE_CLIENT_ID'),
                    'client_secret' => env('GOOGLE_CLIENT_SECRET'),
                    'redirect_uri' => env('GOOGLE_REDIRECT_URI'),
                    'grant_type' => 'authorization_code'
                ]
            ]);

            // Mendapatkan token akses dari respons
            $accessToken = json_decode($response->getBody()->getContents(), true)['access_token'];

            // Mengambil informasi pengguna menggunakan token akses
            $response = $client->get('https://www.googleapis.com/oauth2/v3/userinfo', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $accessToken
                ]
            ]);

            $googleUser = json_decode($response->getBody()->getContents(), true);

            // Mengambil informasi tambahan pengguna menggunakan Google People API
            $peopleResponse = $client->get('https://people.googleapis.com/v1/people/me?personFields=names,emailAddresses,phoneNumbers,addresses', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $accessToken
                ]
            ]);

            $peopleUser = json_decode($peopleResponse->getBody()->getContents(), true);

            // Menyimpan alamat dan nomor telepon dari respons People API
            $address = $peopleUser['addresses'][0]['formattedValue'] ?? null;
            $phone = $peopleUser['phoneNumbers'][0]['value'] ?? null;

            // Mencatat alamat dan nomor telepon untuk tujuan debugging
            Log::info('Parsed address:', ['address' => $address]);
            Log::info('Parsed phone:', ['phone' => $phone]);

            // Melanjutkan proses autentikasi
            $user = User::where('email', $googleUser['email'])->first();

            if ($user) {
                // Memperbarui data pengguna jika diperlukan
                $user->update([
                    'name' => $googleUser['name'],
                    'address' => $address ?? 'Alamat tidak tersedia', // Nilai default untuk alamat
                    'phone' => $phone ?? $user->phone,
                ]);
                Auth::login($user);
            } else {
                // Menyiapkan data pengguna baru
                $userData = [
                    'name' => $googleUser['name'],
                    'email' => $googleUser['email'],
                    'email_verified_at' => now(),
                    'password' => bcrypt(uniqid()),
                    'role' => 'user',
                    'address' => $address ?? 'Alamat tidak tersedia', // Nilai default untuk alamat
                    'phone' => $phone ?? 'Nomor telepon tidak tersedia', // Nilai default untuk nomor telepon
                ];

                // Membuat pengguna baru
                $user = User::create($userData);
                Auth::login($user);
            }

            // Mengarahkan pengguna ke dashboard setelah login
            return redirect()->route('dashboard.show.user');
        } catch (\Exception $e) {
            // Mencatat kesalahan autentikasi dan mengarahkan pengguna kembali ke halaman login
            Log::error('Google authentication error:', ['error' => $e->getMessage()]);
            return redirect()->route('auth.show.login')->with('error', 'Gagal melakukan autentikasi Google.');
        }
    }
}
