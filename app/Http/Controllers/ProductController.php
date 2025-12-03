<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\ProductUpdateRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }


    public function edit($id)
    {
        $product = Product::find($id);
        return view('products.edit', compact('product'));
    }


    public function update(ProductUpdateRequest $request, $id)
    {
        $product = Product::find($id);

        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
        ]);

        return redirect()->route('products.index');
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        // Product::create([
        //     'name' => $request->name,
        //     'price' => $request->price,
        //     'description' => $request->description,
        // ]);

        $data=$request->validate([
            'name'=>'required|string',
            'price'=>'required|integer',
            'description'=>'required|string',
            'image'=>'required'
        ]);

        if($request->hasFile('image'))
        {
            $imageName=time() . '.' . $request->image->extension();

            $request -> image->move(public_path('productImages'),$imageName);

            $data = array_merge($data,['image'=>$imageName]);
        }

        Product::create($data);

        return redirect()->route('products.index');
    }

    public function delete($id){
        $product=Product::find($id);
        $product->delete();

        return redirect()->route('products.index');
    }
}
