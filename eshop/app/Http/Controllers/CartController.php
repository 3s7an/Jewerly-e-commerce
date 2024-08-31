<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Darryldecode\Cart\Cart as CartModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function add(Request $request)
    {
        // Validácia vstupu
        $request->validate([
            'product_id' => 'required|exists:products,id'
        ]);

        // Získanie produktu
        $product = Product::findOrFail($request->input('product_id'));

        // Načítanie alebo vytvorenie košíka pre aktuálneho používateľa
        $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);

        // Kontrola, či položka už existuje v košíku
        $cartItem = CartItem::where('cart_id', $cart->id)
                            ->where('product_id', $product->id)
                            ->first();

        if ($cartItem) {
            // Zvýšiť množstvo, ak položka už existuje
            $cartItem->increment('quantity');
        } else {
            // Pridať novú položku do košíka
            CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $product->id,
                'quantity' => 1
            ]);
        }

        return redirect()->back()->with('success', 'Produkt bol pridaný do košíku!');
    }

    public function index()
    {
        // Najdenie spravneho košíku pre daneho uživatela, tj. uživatela ktory je prihlaseny
        $cart = Cart::where('user_id', Auth::id())->first();
        $cartItems = $cart ? $cart->cartItems()->with('product')->get() : collect([]);

        // Celkový počet produktov, ktorý sa zobrazuje v košíku
        $totalItems = 0;
        $totalPrice = 0;

        // cyklus na zrátanie všetkych produktov
          foreach($cartItems as $item){
            $totalItems += $item->quantity;
            $totalPrice += $item->quantity * $item->product->price;
          };

        return view('cart.index', compact('cartItems', 'totalItems', 'totalPrice'));
    }

    public function removeFromCart($cartItemId)
    {
        //Najst polozku podla Idčka a vymaž všetky ktoré sa našli
        // Dobudúcna prerobit aby sa itemy odstranovali po jednom, nie ako celok !!!!
        $cartItem = CartItem::findOrFail($cartItemId);

        if($cartItem->quantity == 1){
        $cartItem->delete();
        }
        else{
            $cartItem->quantity -= 1;
            $cartItem->save();
        }

        return redirect()->back()->with('success', 'Produkt bol úspešne odobratý z košíku!');
    }
}
