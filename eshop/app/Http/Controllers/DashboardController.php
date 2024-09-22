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

    $cart = Cart::where('user_id', Auth::id())->first();

    // Celkovy počet poloziek (zobrazuje sa pri cart ikonke)
    $totalItems = $cart ? $cart->totalItems() : 0;

   return view('dashboard')->with([
    'categories' => $categories,
    'products' => $products,
    'totalItems' => $totalItems
]);
}

    public function showCategory($id){

        // Načítajte kategóriu podľa ID
        $category = Category::with('children')->find($id);

        // Načítajte produkty, ktoré patria do danej kategórie (rovnaký category_id)
        $products = Product::where('category_id', $id)->get();

         // Celkovy počet poloziek (zobrazuje sa pri cart ikonke)
        $cart = Cart::where('user_id', Auth::id())->first();
        $totalItems = $cart ? $cart->totalItems() : 0;

        return view('includes.category-show', compact('category', 'products', 'totalItems',));
    }
}

