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

    if (FacadeRequest::has('search')) {
        $query->where('name', 'like', '%' . FacadeRequest::get('search', '') . '%');
    }

    $products = $query->get();

    $categories = Category::all();

    return view('dashboard', ['products' => $products, 'categories' => $categories]);
}
}

