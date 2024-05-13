<?php

namespace App\Http\Controllers;

use App\Models\MasterSpecialization;
use Creativeorange\Gravatar\Facades\Gravatar;
use Illuminate\Http\Request;

class MasterSpecializationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $avatar = Gravatar::get(auth()->user()->email);
        $title = 'Master Specialization';
        return view('dashboard.admin.specialization.index', [
            'avatar' => $avatar,
            'page_title' => $title,
            'specialization' => MasterSpecialization::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $avatar = Gravatar::get(auth()->user()->email);
        $title = 'Create Master Specialization';
        return view('dashboard.admin.specialization.create', [
            'avatar' => $avatar,
            'page_title' => $title
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        MasterSpecialization::create($request->only('name'));

        return redirect()->route('specialization.index')->with('success', 'Specialisasi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(MasterSpecialization $masterSpecialization)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MasterSpecialization $masterSpecialization)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MasterSpecialization $masterSpecialization)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MasterSpecialization $masterSpecialization)
    {
        //
    }
}
