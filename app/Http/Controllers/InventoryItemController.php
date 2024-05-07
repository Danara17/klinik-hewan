<?php

namespace App\Http\Controllers;

use App\Models\InventoryCategory;
use App\Models\InventoryItem;
use Creativeorange\Gravatar\Facades\Gravatar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InventoryItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $avatar = Gravatar::get(auth()->user()->email);
        $title = 'Master Inventory Item';
        return view('dashboard.admin.inventory_item.index', [
            'items' => InventoryItem::all(),
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
        $title = 'Create Master Inventory Item';
        $categories = InventoryCategory::all();

        return view('dashboard.admin.inventory_item.create', [
            'page_title' => $title,
            'avatar' => $avatar,
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'category' => 'required|exists:inventory_categories,id',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'satuan' => 'required|string',
            'desc' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // max size 2MB
        ]);

        if ($validator->fails()) {
            return redirect()->route('inventory_item.create')->withErrors($validator)->withInput();
        }

        $name_setter = null;

        if ($request->hasFile('photo')) {
            $name_setter = time() . '.' . $request->file('photo')->getClientOriginalExtension();
            $photo = $request->file('photo')->storeAs('inventory_items', $name_setter);
        }

        $item = new InventoryItem();
        $item->name = $request->name;
        $item->category_id = $request->category;
        $item->harga = $request->harga;
        $item->stok = $request->stok;
        $item->satuan = $request->satuan;
        $item->description = $request->desc;
        $item->photo = $name_setter;
        $item->save();

        return redirect()->route('inventory_item.index')->with('success', 'Item berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(InventoryItem $inventoryItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InventoryItem $inventoryItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, InventoryItem $inventoryItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InventoryItem $inventoryItem)
    {
        //
    }
}
