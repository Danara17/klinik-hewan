<?php

namespace App\Http\Controllers;

use App\Models\InventoryCategory;
use Creativeorange\Gravatar\Facades\Gravatar;
use Illuminate\Http\Request;

class InventoryCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $avatar = Gravatar::get(auth()->user()->email);
        $title = 'Master Inventory Category';
        $categories = InventoryCategory::all();
        return view('dashboard.admin.inventory_category.index', [
            'page_title' => $title,
            'avatar' => $avatar,
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $avatar = Gravatar::get(auth()->user()->email);
        $title = 'Create Master Inventory Category';
        $categories = InventoryCategory::get();

        return view('dashboard.admin.inventory_category.create', [
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
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'parent_category' => 'nullable|exists:inventory_categories,id',
        ]);

        $category = new InventoryCategory();
        $category->name = $validatedData['name'];
        $category->parent_id = $validatedData['parent_category'];
        $category->save();

        return redirect()->route('inventory_category.index')->with('success', 'Kategori berhasil ditambahkan.');
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
