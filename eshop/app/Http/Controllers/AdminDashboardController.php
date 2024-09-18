<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    public function index(){
        $query = Product::orderBy('created_at', 'DESC');
        $products = $query->get();

        $categories = Category::all();
        $cart = Cart::where('user_id', Auth::id())->first();
        $totalItems = $cart ? $cart->totalItems() : 0;

        return view('admin.dashboard', ['products' => $products, 'categories' => $categories, 'totalItems' => $totalItems]);
    }
}
