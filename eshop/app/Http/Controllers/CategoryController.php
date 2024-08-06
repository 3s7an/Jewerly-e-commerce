<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){

        $categories = Category::orderBy('parent_id', 'ASC')->paginate(5);
        //$categories = Category::tree()->get()->toTree();//
        return view('admin.category')->with('categories', $categories);



    }

    public function store(Request $request){
        $request->validate([
            'category-name' => 'required|min:3|max:20'
        ]);

        $category = Category::create([
            'name' => $request->input('category-name', ''),
            'parent_id' => $request->input('parent-id', '')


        ]);


        $category->save();
        return redirect()->route('admin.category');
    }

    public function destroy($id){
        $category = Category::where('id', $id)->first();
        $category->delete();

        return redirect()->route('admin.category');
    }
}
