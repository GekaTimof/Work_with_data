<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;

Route::apiResource('articles', ArticleController::class);
Route::apiResource('categories', CategoryController::class);
