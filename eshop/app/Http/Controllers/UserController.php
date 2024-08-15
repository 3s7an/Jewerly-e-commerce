<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function update(User $user){
        $validated = request()->validate([
            'name' => 'required|min:2|max:50',
            'surname' => 'required|min:2|max:50',
            'street' => 'required|min:2|max:50',
            'zipcode' => 'required|max:10',
            'city' => 'required|max:10'

        ]);
    }

    public function edit(User $user){

        return view('ideas.show'); 

    }
}
