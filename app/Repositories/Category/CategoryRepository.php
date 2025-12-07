<?php

namespace App\Repositories\Category;

use App\Repositories\Category\CategoryRepositoryInterface;
use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface

{
    public function index()
    {
        return Category::get();
    }

    public function store($data)
    {
        return Category::create($data);
    }

    public function show($id)
    {
        return Category::find($id);
    }

    public function delete($id)
    {
        $category = Category::find($id);
        return $category->delete();
    }
}
