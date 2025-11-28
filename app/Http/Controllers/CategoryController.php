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

    public function show($id)
    {
        $category=Category::find($id);

        return view('categories.show',compact('category'));
    }
}
