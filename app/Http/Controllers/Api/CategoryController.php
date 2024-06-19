<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    public function index(): JsonResource
    {
        return CategoryResource::collection(Category::all());
    }

    public function show(Category $category): JsonResource
    {
        return new CategoryResource($category);
    }

    public function store(StoreCategoryRequest $request): JsonResource
    {
        $category = Category::create($request->validated());

        return new CategoryResource($category);
    }

    public function list(): JsonResource
    {
        return CategoryResource::collection(Category::all());
    }

    public function update(Category $category, StoreCategoryRequest $request): JsonResource
    {
        $category->update($request->validated());

        return new CategoryResource($category);
    }

    public function destroy(Category $category): Response
    {
        $category->delete();

        return response()->noContent();
    }
}
