<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request as FacadeRequest;

class DashboardController extends Controller
{
    public function index()
{

    // Produkty
    $query = Product::orderBy('created_at', 'DESC');

    $products = $query->get();

      // Search bar
      if (request()->has('search')) {
        $query->where('name', 'like', '%' . request()->get('search', '') . '%');
    }


    // Kategorie
    $categories = Category::get()->toTree();

     // Celkovy počet poloziek (zobrazuje sa pri cart ikonke)
     $cart = Cart::where('user_id', Auth::id())->first();
     $totalItems = $cart ? $cart->totalItems() : 0;



   return view('dashboard')->with([
    'categories' => $categories,
    'products' => $products,
    'totalItems' => $totalItems

]);
}



    public function showCategory($id)
    {
            $category = Category::with(['products'])->find($id);
            $products = $category ? $category->products : collect();

             // Získať rodičovské kategórie
            $parentCategories = [];
            $currentCategory = $category;

            while ($currentCategory) {
                array_unshift($parentCategories, $currentCategory);
                $currentCategory = $currentCategory->parent;
            }

         // Celkovy počet poloziek (zobrazuje sa pri cart ikonke)
        $cart = Cart::where('user_id', Auth::id())->first();
        $totalItems = $cart ? $cart->totalItems() : 0;

        return view('includes.category-show', compact('category', 'products', 'totalItems', 'parentCategories'));
    }

    public function show(Product $product){
        
         // Celkovy počet poloziek (zobrazuje sa pri cart ikonke)
        $cart = Cart::where('user_id', Auth::id())->first();
        $totalItems = $cart ? $cart->totalItems() : 0;
        return view('includes.product-show', compact('product', 'totalItems'));
    }
}

