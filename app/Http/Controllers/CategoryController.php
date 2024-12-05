<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\StoreRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(): array|\Illuminate\Database\Eloquent\Collection
    {
        return Category::query()->get(['id', 'name']);
    }

    public function store(StoreRequest $request): int
    {
        Category::query()->create($request->validated());
        return 1;
    }
}
