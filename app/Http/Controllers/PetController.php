<?php

namespace App\Http\Controllers;

use App\Models\MasterPetType;
use App\Models\Pet;
use App\Models\User;
use Creativeorange\Gravatar\Facades\Gravatar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $avatar = Gravatar::get(auth()->user()->email);
        $title = 'Pet';
        $pet = Pet::all();

        return view('dashboard.admin.pet.index', [
            'avatar' => $avatar,
            'page_title' => $title,
            'pet' => $pet
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $avatar = Gravatar::get(auth()->user()->email);
        $title = 'Create Pet';
        $owner = User::where('role', 'user')->orderBy('created_at', 'desc')->get();
        $pet_type = MasterPetType::all();

        return view('dashboard.admin.pet.create', [
            'avatar' => $avatar,
            'page_title' => $title,
            'owner' => $owner,
            'pet_type' => $pet_type
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');

        $validator = Validator::make($request->all(), [
            'owner' => 'required',
            'name' => 'required|string|max:255',
            'age' => 'required|numeric|min:0',
            'weight' => 'required|numeric|min:0',
            'sex' => 'required',
            'photo' => 'image'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if ($request->hasFile('photo')) {
            $name_setter = time() . '.' . $request->file('photo')->getClientOriginalExtension();
            $photo = $request->file('photo')->storeAs('client_pets_gallery', $name_setter);
        }

        $pet = new Pet();
        $pet->owner_id = $request->owner;
        $pet->name = $request->name;
        $pet->pet_type_id = $request->pet_type;
        $pet->age = $request->age;
        $pet->weight = $request->weight;
        $pet->sex = $request->sex;
        $pet->photo = $name_setter;
        $success = $pet->save();

        if ($success) {
            return redirect()->route('pet.index')->with('success', 'Pet berhasil ditambahkan');
        } else {
            return redirect()->route('pet.index')->with('error', 'Gagal menambah pet');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $avatar = Gravatar::get(auth()->user()->email);
        $title = 'Edit Pet';
        $owner = User::orderBy('created_at', 'desc')->get();
        $pet_type = MasterPetType::all();
        $pet = Pet::findOrFail($id);
        return view('dashboard.admin.pet.edit', [
            'avatar' => $avatar,
            'page_title' => $title,
            'owner' => $owner,
            'pet_type' => $pet_type,
            'pet' => $pet
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        date_default_timezone_set('Asia/Jakarta');

        $validator = Validator::make($request->all(), [
            'name' => 'string|max:255',
            'age' => 'numeric|min:0',
            'weight' => 'numeric|min:0',
            'photo' => 'image'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $pet = Pet::findOrFail($id);

        $old_photo = $pet->photo; //1714255598.png

        if ($request->hasFile('photo')) {
            $name_setter = time() . '.' . $request->file('photo')->getClientOriginalExtension();

            // Hapus foto lama jika ada
            if ($old_photo) {
                Storage::delete('client_pets_gallery/' . $old_photo);
            }
        } else {
            $name_setter = $old_photo;
        }

        $success = Pet::where('id', $id)->update([
            'photo' => $name_setter,
            'owner_id' => $request->owner,
            'name' => $request->name,
            'pet_type_id' => $request->pet_type,
            'age' => $request->age,
            'weight' => $request->weight,
            'sex' => $request->sex
        ]);

        if ($success && $request->hasFile('photo')) {
            $photo = $request->file('photo')->storeAs('client_pets_gallery', $name_setter);
        }

        return redirect()->route('pet.index')->withSuccess('Pet berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pet = Pet::findOrFail($id);

        if ($pet->photo) {
            Storage::delete('client_pets_gallery/' . $pet->photo);
        }
        $pet->delete();

        return redirect()->route('pet.index')->with('success', 'Pet deleted successfully');
    }

    public function check($id)
    {
        $avatar = Gravatar::get(auth()->user()->email);
        $title = 'Check Pet';
        $pet = Pet::findOrFail($id);
        return view('dashboard.doctor.pet.check', [
            'avatar' => $avatar,
            'page_title' => $title,
            'pet' => $pet,
            'pet_id' => $id
        ]);
    }

    public function updateByDoctor(Request $request)
    {
        Pet::where('id', $request->pet_id)->update([
            'age' => $request->age,
            'weight' => $request->weight
        ]);
        return redirect()->back()->with('success', 'Informasi Pet behasil diperbarui.');
    }

}
