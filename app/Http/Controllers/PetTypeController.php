<?php

namespace App\Http\Controllers;

use App\Models\MasterPetType;
use Creativeorange\Gravatar\Facades\Gravatar;
use Illuminate\Http\Request;

class PetTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $master_pet_type = MasterPetType::all();
        $avatar = Gravatar::get(auth()->user()->email);
        $title = 'Master Pet Type';
        return view('dashboard.admin.pet_type.index', [
            'avatar' => $avatar,
            'page_title' => $title,
            'master_pet_type' => $master_pet_type
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $avatar = Gravatar::get(auth()->user()->email);
        $title = 'Create Master Pet Type';
        return view('dashboard.admin.pet_type.create', [
            'avatar' => $avatar,
            'page_title' => $title
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $master_pet_type = new MasterPetType();

        $master_pet_type->name = $request->name_type;
        $success = $master_pet_type->save();

        if ($success) {
            return redirect()->route('pet_type.index')->with('success', 'Data Master berhasil ditambahkan');
        } else {
            return redirect()->back()->with('error', 'Data Master gagal ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(MasterPetType $masterPetType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MasterPetType $masterPetType, $id)
    {
        $data = $masterPetType->findOrFail($id);
        $avatar = Gravatar::get(auth()->user()->email);
        $title = 'Edit Master Pet Type';
        return view('dashboard.admin.pet_type.edit', [
            'avatar' => $avatar,
            'page_title' => $title,
            'data' => $data
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MasterPetType $masterPetType)
    {

        $success = $masterPetType->where('id', $request->pet_type)->update([
            'name' => $request->name_type
        ]);
        if ($success) {
            return redirect()->route('pet_type.index')->with('success', 'Data Master berhasil diperbarui');
        } else {
            return redirect()->back()->with('error', 'Data Master gagal diperbarui');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MasterPetType $masterPetType, Request $request)
    {
        $success = $masterPetType->destroy($request->pet_type);
        if ($success) {
            return redirect()->route('pet_type.index')->with('success', 'Data Master berhasil dihapus');
        } else {
            return redirect()->back()->with('error', 'Data Master gagal dihapus');
        }
    }
}
