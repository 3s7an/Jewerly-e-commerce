<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Darryldecode\Cart\Cart as CartModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
   // Pridanie produktu do košíka
   public function add(Request $request, $productId)
   {
       $product = Product::findOrFail($productId);

       // Skontrolujte, či položka už existuje v košíku
       $existingCartItem = Cart::where('user_id', Auth::id())
           ->where('product_id', $productId)
           ->first();

       if ($existingCartItem) {
           // Ak položka existuje, aktualizujte množstvo
           $existingCartItem->quantity += $request->input('quantity', 1);
           $existingCartItem->save();
       } else {
           // Inak pridajte novú položku do košíka
           Cart::create([
               'user_id' => Auth::id(),
               'product_id' => $productId,
               'quantity' => $request->input('quantity', 1),
           ]);
       }

       return redirect()->back()->with('success', 'Produkt bol pridaný do košíka!');
   }

   // Zobrazenie košíka
   public function index()
   {
       $cartItems = Cart::with('product')
           ->where('user_id', Auth::id())
           ->get();

       return view('cart.index', compact('cartItems'));
   }

   // Aktualizácia množstva v košíku
   public function update(Request $request, $id)
   {
       $request->validate([
           'quantity' => 'required|integer|min:1',
       ]);

       $cartItem = Cart::find($id);
       if ($cartItem && $cartItem->user_id == Auth::id()) {
           $cartItem->quantity = $request->input('quantity');
           $cartItem->save();

           return redirect()->back()->with('success', 'Položka bola aktualizovaná!');
       }

       return redirect()->back()->with('error', 'Položka neexistuje alebo nemáte prístup.');
   }

   // Odstránenie položky z košíka
   public function remove($id)
   {
       $cartItem = Cart::find($id);
       if ($cartItem && $cartItem->user_id == Auth::id()) {
           $cartItem->delete();
           return redirect()->back()->with('success', 'Položka bola odstránená z košíka!');
       }

       return redirect()->back()->with('error', 'Položka neexistuje alebo nemáte prístup.');
   }
}
