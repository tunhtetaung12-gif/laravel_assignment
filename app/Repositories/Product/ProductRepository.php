<?php

namespace App\Repositories\Product;

use App\Repositories\Product\ProductRepositoryInterface;
use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface

{
    public function index()
    {
        return Product::with('category')->get();
    }

    public function show($id)
    {
        return Product::with('category')->find($id);
    }

    public function edit($id)
    {
        return Product::with('category')->find($id);
    }

    public function store($data)
    {
        return Product::create($data);
    }

    public function delete($id)
    {
        $product = Product::find($id);
        return $product->delete();
    }
}
