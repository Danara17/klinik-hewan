<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Invoice;
use App\Models\MedicalRecord;
use App\Models\Payment;
use App\Models\Pet;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Creativeorange\Gravatar\Facades\Gravatar;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengambil semua data post dengan relasi author dan categories
        $posts = Post::with('author', 'categories')->get();

        $avatar = Gravatar::get(auth()->user()->email);
        $title = 'Dashboard';

        if (auth()->user()->role == 'admin') {
            $pemasukan = Payment::where('status', 'success')->get('total_amount');
            $total = 0;
            foreach ($pemasukan as $hitung) {
                $total += $hitung->total_amount;
            }
            return view('dashboard.admin.index', [
                'avatar' => $avatar,
                'page_title' => $title,
                'total_pemasukan' => $total
            ]);
        } elseif (auth()->user()->role == 'doctor') {
            $info_doctor = Doctor::where('user_id', auth()->user()->id)->first();
            $job = MedicalRecord::where('status_perawatan', 'diperiksa')
                ->where('doctor_id', $info_doctor->id)
                ->get();
            $jobRawat = MedicalRecord::where('status_perawatan', 'dirawat')
                ->where('doctor_id', $info_doctor->id)
                ->get();
            return view('dashboard.doctor.index', [
                'avatar' => $avatar,
                'page_title' => $title,
                'job' => $job,
                'jobRawat' => $jobRawat
            ]);
            // return Inertia::render('Dashboard/Doctor/Index', [
            //     'avatar' => $avatar,
            //     'page_title' => $title,
            //     'job' => $job->toArray()
            // ]);
        } elseif (auth()->user()->role == 'author') {
            return view('dashboard.author.dashboard', [
                'avatar' => $avatar,
                'page_title' => $title,
                'posts' => $posts
            ]);
        } elseif (auth()->user()->role == 'user') {
            $data = Invoice::where('user_id', auth()->user()->id)->where('status', 'belum')->get();
            return view('dashboard.guest.index', [
                'avatar' => $avatar,
                'page_title' => $title,
                'data' => $data
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
