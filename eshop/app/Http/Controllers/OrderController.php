<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(){

        $cart = Cart::where('user_id', Auth::id())->first();
        $cartItems = $cart ? $cart->cartItems()->with('product')->get() : collect([]);

        $totalPrice = 0;

        foreach($cartItems as $item){
            $totalPrice += $item->quantity * $item->product->price;
        };

        return view('order.index', compact('cartItems', 'totalPrice'));
    }



    public function store(Request $request){
        $validated = $request->validate([
        ''
        ]);
    }
}
