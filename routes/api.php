<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleControler;

// Route pour obtenir les informations de l'utilisateur authentifié
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Routes API pour le contrôleur Article
Route::apiResource('articles', ArticleControler::class);
