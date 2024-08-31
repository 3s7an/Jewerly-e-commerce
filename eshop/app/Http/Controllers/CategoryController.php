<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){

        $categories = Category::orderBy('parent_id', 'ASC')->paginate(5);

        return view('admin.category')->with('categories', $categories);




    }

    public function store(Request $request)
{
    $request->validate([
        'category-name' => 'required|min:3|max:20',
        'parent_id' => 'nullable|exists:categories,id'
    ]);

    $category = new Category([
        'name' => $request->input('category-name', '')
    ]);

    if ($request->filled('parent-id') && $request->input('parent-id') != 0) {
        $parentCategory = Category::find($request->input('parent-id'));

        if ($parentCategory) {
            $category->appendToNode($parentCategory)->save();
        } else {
            return redirect()->back()->withErrors(['parent-id' => 'Parent category not found.']);
        }
    } elseif ($request->input('parent-id') == 0) {
        $category->saveAsRoot();
    }

    return redirect()->back()->with('success', 'Kategória bola úspešne pridaná!');
}

    public function destroy($id){

        $category = Category::where('id', $id)->first();
        $category->delete();

        return redirect()->route('admin.category')->with('succes', 'Kategória bola úspešne odstránená');
    }
}
