<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\ProductUpdateRequest;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        return view('products.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }


    public function edit($id)
    {
        $product = Product::with('category')->findOrFail($id);
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }



    // public function update(ProductUpdateRequest $request, $id)
    // {
    //     $product = Product::find($id);

    //     $product->update([
    //         'name' => $request->name,
    //         'price' => $request->price,
    //         'description' => $request->description,
    //     ]);

    //     return redirect()->route('products.index');
    // }

    public function update(ProductUpdateRequest $request, $id)
    {
        $product = Product::findOrFail($id);

        $product->update([
            'name'        => $request->name,
            'price'       => $request->price,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'status'      => $request->status,
        ]);

        return redirect()->route('products.index');
    }


    public function create()
    {
        $categories = Category::get();

        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Product::create([
        //     'name' => $request->name,
        //     'price' => $request->price,
        //     'description' => $request->description,
        // ]);

        $data = $request->validate([
            'name' => 'required|string',
            'price' => 'required|integer',
            'description' => 'required|string',
            'image' => 'required',
            'category_id' => 'required',
            'status' => 'nullable',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();

            $request->image->move(public_path('productImages'), $imageName);

            $data = array_merge($data, ['image' => $imageName]);
        }

        $data['status'] = $request->has('status') ? true : false;

        Product::create($data);

        return redirect()->route('products.index');
    }

    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect()->route('products.index');
    }
}
