<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\MasterSpecialization;
use App\Models\User;
use Creativeorange\Gravatar\Facades\Gravatar;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::where('role', 'doctor')->get();
        $avatar = Gravatar::get(auth()->user()->email);
        $title = 'Doctor';
        return view('dashboard.admin.doctor.index', [
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
        $specialization = MasterSpecialization::all();
        $avatar = Gravatar::get(auth()->user()->email);
        $title = 'Create Doctor';
        return view('dashboard.doctor.create', [
            'avatar' => $avatar,
            'page_title' => $title,
            'dataUser' => $user,
            'dataSpecializaton' => $specialization,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataUser = User::findOrFail($request->id_name);
        $dokter = new Doctor;
        $dokter->user_id = $request->id_name;
        $dokter->specialization_id = $request->specialization;
        $dokter->name = $dataUser->name;
        $dokter->address = $dataUser->address;
        $dokter->phone = $dataUser->phone;
        $dokter->save();
        $dataUser->update([
            'role' => 'doctor'
        ]);
        return redirect()->route('doctor.index')->with('success', 'Dokter berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
