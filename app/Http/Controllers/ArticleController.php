<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        return Article::with('category')->get();
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
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        return Article::create($validated);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id){
        return $article->load('category');
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
            'title' => 'string|max:255',
            'content' => 'string',
            'category_id' => 'exists:categories,id',
        ]);
        $article->update($validated);

        return $article;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id){
        $article->delete();
        return response()->json(['message' => 'Article deleted successfully']);
    }
}
