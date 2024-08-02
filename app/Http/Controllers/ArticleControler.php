<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleControler extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Article::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);
        return Article::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $article = Article::find($id);
        if ($article) {
            return response()->json(['message' => "Article non trouvé"], 404);
        }
        return $article;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required | string|max:255',
            'body' => 'required | string',
        ]);
        $article = Article::find($id);
        if (!$article) {
            return response()->json(['message' => "Article non trouvé"], 404);
        }
        $article->update($request->all());
        return $article;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = Article::find($id);
        if (!$article) {
            return response()->json(['message' => "Article non trouvé"], 404);
        }
        $article->delete();
        return response()->json(['message' => 'Article supprimé']);
    }
}
