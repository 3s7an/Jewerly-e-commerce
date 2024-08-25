<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Darryldecode\Cart\Cart as CartModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
        public function index (){
            // Načítanie položiek košíku pre prihláseného uživateľa
            $cartItems = Cart::with('product')->where('user_id', Auth::id());

            return view('cart.index', compact('cartItems'));
    }

    /*
    public function add(Request $request){

        // Validácia
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $product = Product::find($request->input('product_id'));

        // Kontrola či sa už produkt nachádza v košíku
        $cartItem = Cart::where('user_id', Auth::id())
            ->where('product_id', $product->id)
            ->first();

        // Áno (nachádza sa)
        if($cartItem){
            $cartItem->quantity += $request->input('quantity', 1);
            $cartItem->save();
        }
        // Nie (nenachádza sa)
        else {
            $cartItem = Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $product->id,
                'quantity' => $validated['quantity'],

            ]);
        }

        return redirect()->back()->with('success', 'Produkt bol pridaný do košíku');
    }
*/

public function add(){
    
}
}
