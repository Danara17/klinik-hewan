<?php

namespace App\Http\Controllers;

use App\Models\User;
use Creativeorange\Gravatar\Facades\Gravatar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $avatar = Gravatar::get(auth()->user()->email);
        $title = 'Profile';
        return view('dashboard.profile', [
            'avatar' => $avatar,
            'page_title' => $title
        ]);
    }

    public function updateProfileInformation(Request $request)
    {
        $success = User::where('id', $request->id)->update([
            'name' => $request->name,
            'email' => auth()->user()->email,
            'phone' => $request->phone,
            'address' => $request->address
        ]);

        if ($success) {
            return redirect()->route('profile.show')->with('success', 'Profile berhasil diperbarui');
        } else {
            return redirect()->route('profile.show')->with('error', 'Gagal memperbarui profile');
        }
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8',
            'confirm_new_password' => 'required|same:new_password',
        ]);

        $user = Auth::user();
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->route('profile.show')->with('error', 'Password saat ini salah');
        }

        $user->password = Hash::make($request->new_password);
        User::where('id', $user->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return redirect()->route('profile.show')->with('success', 'Password berhasil diperbarui');
    }
}

