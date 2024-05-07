<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\MedicalRecord;
use App\Models\Pet;
use App\Models\User;
use Creativeorange\Gravatar\Facades\Gravatar;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Eval_;

class MedicalRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $avatar = Gravatar::get(auth()->user()->email);
        $title = 'Medical Record';
        $items = MedicalRecord::all();

        return view('dashboard.admin.medical_record.index', [
            'items' => $items,
            'page_title' => $title,
            'avatar' => $avatar,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $avatar = Gravatar::get(auth()->user()->email);
        $title = 'Medical Record';
        $owner = User::where('role', 'user')->get();
        $pet = Pet::all();
        $doctor = Doctor::all();
        return view('dashboard.admin.medical_record.create', [
            'page_title' => $title,
            'avatar' => $avatar,
            'owner' => $owner,
            'pet' => $pet,
            'doctor' => $doctor
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $new_record = new MedicalRecord;
        $new_record->pet_id = $request->pet_id;
        $new_record->doctor_id = $request->doctor_id;
        $new_record->check_date = $request->check_date;
        $new_record->complaint = $request->complaints;
        $new_record->save();
        return redirect()->route('medical_record.index')->with('success', 'Record berhasil ditambahkan.');
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

    public function check(string $id)
    {
        $avatar = Gravatar::get(auth()->user()->email);
        $title = 'Medical Record Check';
        $item = MedicalRecord::findOrFail($id);

        return view('dashboard.doctor.medical_record.check', [
            'avatar' => $avatar,
            'page_title' => $title,
            'item' => $item
        ]);
    }
}
