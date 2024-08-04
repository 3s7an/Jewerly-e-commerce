<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){

        $categories = Category::all();
        return view('admin.category')->with('categories', $categories);



    }

    public function store(Request $request){

        $request->validate([
            'category-name' => 'min:3|max:20|required'
        ]);

        $category = Category::create([
            'name' => request('category-name', '')
        ]);

        $category->save();

        return redirect()->route('admin.category');
    }
}
