<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index(){


        $query = Product::orderBy('created_at', 'DESC');
        $products = $query->get();

        $categories = Category::tree()->get()->toTree();
       

        return view('admin.product',['products' => $products, 'categories' => $categories]);
    }


    public function store(Request $request)
    {

       $request->validate([
        'product-name' => 'min:3|max:40|required',
        'product-description' => 'min:5|max:200|required',
        'product-price' => 'numeric|required'

       ]);


        $product = Product::create([
            'name' => request('product-name', ''),
            'description' => request('product-description', ''),
            'price' => request('product-price' , '')

        ]);

        $product->save();



        return redirect()->route('admin.product');
    }

    public function destroy($id){

        $product = Product::where('id', $id)->first();
        $product->delete();

        return redirect()->route('admin.product');
    }
}

