<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(){
        $categories = Category::get()->toTree();
        $cart = Cart::where('user_id', Auth::id())->first();
        $totalItems = $cart ? $cart->totalItems() : 0;
        return view('profile.profile')->with([
            'categories' => $categories,
            'totalItems' => $totalItems
        ]);
    }
}
