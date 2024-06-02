<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\MedicalRecord;
use App\Models\Pet;
use App\Models\User;
use Illuminate\Http\Request;
use Creativeorange\Gravatar\Facades\Gravatar;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        $avatar = Gravatar::get(auth()->user()->email);
        $title = 'Dashboard';

        if (auth()->user()->role == 'admin') {
            return view('dashboard.admin.index', [
                'avatar' => $avatar,
                'page_title' => $title
            ]);
        } else if (auth()->user()->role == 'doctor') {
            $info_doctor = Doctor::where('user_id', auth()->user()->id)->first();
            $job = MedicalRecord::where('status', 'diperiksa')
                ->where('doctor_id', $info_doctor->id)
                ->get();
            return view('dashboard.doctor.index', [
                'avatar' => $avatar,
                'page_title' => $title,
                'job' => $job
            ]);
            // return Inertia::render('Dashboard/Doctor/Index', [
            //     'avatar' => $avatar,
            //     'page_title' => $title,
            //     'job' => $job->toArray()
            // ]);
        } else if (auth()->user()->role == 'author') {

            return view('dashboard.author.index', [
                'avatar' => $avatar,
                'page_title' => $title
            ]);
        } else if (auth()->user()->role == 'user') {
            return view('dashboard.guest.index', [
                'avatar' => $avatar,
                'page_title' => $title
            ]);
        }
    }

    public function quick_start(Request $request)
    {

        $avatar = Gravatar::get(auth()->user()->email);
        $title = 'Quick Start';

        $owner = User::where('role', 'user')->get();
        $pet = Pet::all();


        return view('dashboard.quick_start', [
            'avatar' => $avatar,
            'page_title' => $title,
            'owner' => $owner,
            'pet' => $pet,
        ]);


    }

    public function quick_start_handle(Request $request)
    {
        if ($request->check_date && $request->owner_id) {
            echo 'here';
        } else {
            echo 'here bro';
        }
    }

}
