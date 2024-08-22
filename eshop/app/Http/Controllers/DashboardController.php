<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadeRequest;

class DashboardController extends Controller
{
    public function index()
{
    $query = Product::orderBy('created_at', 'DESC');

    if (request()->has('search')) {
        $query->where('name', 'like', '%' . request()->get('search', '') . '%');
    }

    $products = $query->get();


    $categories = Category::get()->toTree();





   return view('dashboard')->with([
    'categories' => $categories,
    'products' => $products,
]);
}
}

