<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryConroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();

        return view('categories.list',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Category::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'is_active' => $request->has('is_active'),
        ]);

        return redirect('/api/categories');
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
        $catagory = Category::findOrFail($id);

        return view('categories.edit', compact('catagory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $catagory = Category::findOrFail($id);

        $catagory->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'is_active' => $request->has('is_active'),
        ]);

        return redirect('/api/categories');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $catagory = Category::findOrFail($id);
        $catagory->delete();

        return redirect('/api/categories');
    }
}
