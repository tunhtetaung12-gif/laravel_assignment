<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index()
    {
        // $categories = [
        //     ['id' => 1, 'name' => 'Electronics'],
        //     ['id' => 2, 'name' => 'Fashion'],
        //     ['id' => 3, 'name' => 'Furniture'],
        // ];

        // return view('categories.index', compact('categories'));

        $data = Category::get();

        return view('categories.index',compact('data'));
    }

    public function edit($id)
    {
        $category=Category::find($id);

        return view('categories.edit',compact('category'));
    }

    public function update(Request $request)
    {
        $category = Category::find($request->id);
        $category->update([
            'name'=>$request->name,
        ]);
        return redirect()->route('categories.index');
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        Category::create([
            'name' => $request->name,
        ]);

        return redirect()->route('categories.index');

    }
}
