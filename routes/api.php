<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('lists/categories', [\App\Http\Controllers\Api\CategoryController::class, 'list']);

Route::apiResource('categories', \App\Http\Controllers\Api\CategoryController::class);

Route::get('products', [\App\Http\Controllers\Api\ProductController::class, 'index']);
