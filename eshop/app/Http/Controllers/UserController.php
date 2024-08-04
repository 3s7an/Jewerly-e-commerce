<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $query = Product::orderBy('created_at', 'DESC');
        $products = $query->get();

        $categories = Category::all();
        return view('admin.user', ['users' => $users, 'products' => $products, 'categories' => $categories]);
    }
}
