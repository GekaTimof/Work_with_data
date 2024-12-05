<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        return Category::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        return Category::create($validated);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id){
        return $category->load('articles');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id){
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id){
        $validated = $request->validate([
            'name' => 'string|max:255',
        ]);
        $category->update($validated);
        
        return $category;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id){
        $category->delete();
        return response()->json(['message' => 'Category deleted successfully']);
    }
}
