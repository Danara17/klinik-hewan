<?php

namespace App\Http\Controllers;

use App\Models\InventoryItem;
use App\Models\MedicalRecord;
use App\Models\PrescriptionItem;
use Creativeorange\Gravatar\Facades\Gravatar;
use Illuminate\Http\Request;

class PrescriptionItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $avatar = Gravatar::get(auth()->user()->email);
        $title = 'Create Prescription';
        $item = InventoryItem::all();
        $med = MedicalRecord::findOrFail($id);
        $prescriptions = PrescriptionItem::where('medical_record_id', $id)->with('items')->get();
        return view('dashboard.doctor.prescription.create', [
            'avatar' => $avatar,
            'page_title' => $title,
            'items' => $item,
            'med' => $med,
            'id' => $id,
            'prescriptions' => $prescriptions
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        foreach ($success = $request->items as $go) {
            $item = new PrescriptionItem;
            $item->medical_record_id = $request->med_id;
            $item->inventory_items_id = $go['id_item'];
            $item->quantity = $go['quantity'];
            $item->save();
        }
        return redirect()->back()->with('success', 'Berhasil menambahkan ' . count($request->items) . count($request->items) > 1 ? 'items' : 'item');
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
    public function destroy(string $id, string $med_id)
    {
        PrescriptionItem::destroy($id);
        return redirect()->route('prescription.create', ['id' => $med_id])->with('success', '1 Items Berhasil dihapus');
    }
}
