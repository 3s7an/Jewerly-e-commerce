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
    $query = Product::orderBy('created_at', 'DESC');

    // Search bar
    if (request()->has('search')) {
        $query->where('name', 'like', '%' . request()->get('search', '') . '%');
    }

    $products = $query->get();


    // Categories
    $categories = Category::get()->toTree();

    $cart = Cart::where('user_id', Auth::id())->first();
    $totalItems = $cart ? $cart->totalItems() : 0;





   return view('dashboard')->with([
    'categories' => $categories,
    'products' => $products,
    'totalItems' => $totalItems
]);
}
}

