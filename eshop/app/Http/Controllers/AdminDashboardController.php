<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index(){
        $query = Product::orderBy('created_at', 'DESC');
        $products = $query->get();

        $categories = Category::all();

        return view('admin.dashboard', ['products' => $products, 'categories' => $categories]);
    }
}
