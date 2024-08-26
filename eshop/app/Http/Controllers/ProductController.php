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

        $categories = Category::all();


        return view('admin.product',['products' => $products, 'categories' => $categories]);
    }



    public function store(Request $request)
{
    // Validácia vstupov
    $validatedData = $request->validate([
        'product-image' => 'required|image', // Pridaná validácia pre typ súboru
        'product-name' => 'required|min:3|max:40',
        'product-description' => 'required|min:5|max:250',
        'product-price' => 'required|numeric',
        'product-category' => 'nullable|numeric|exists:categories,id', // Umožňuje null a kontroluje existenciu v tabuľke 'categories'
    ]);

    // Uloženie obrázka, ak existuje
    if($request->hasFile('product-image')){
        $imagePath = $request->file('product-image')->store('product-profile', 'public');
        $validatedData['product-image'] = $imagePath;
    }

    // Vytvorenie nového produktu pomocou validovaných údajov
    $product = Product::create([
        'image' => $validatedData['product-image'],
        'name' => $validatedData['product-name'],
        'description' => $validatedData['product-description'],
        'price' => $validatedData['product-price'],
        'category_id' => $validatedData['product-category'], // Oprava pre priamy prístup
    ]);

    // Presmerovanie po úspešnom uložení produktu
    return redirect()->route('admin.product');
}

    public function show(Product $product){
        return view('includes.product-show', compact('product'));
    }


    public function destroy($id){

        $product = Product::where('id', $id)->first();
        $product->delete();

        return redirect()->route('admin.product');
    }
}

