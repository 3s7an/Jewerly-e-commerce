<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Darryldecode\Cart\Cart as CartModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::getContent();
        return view('cart.index', compact('cartItems'));
    }

    public function add(Request $request)
    {
        Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => [] // Voliteľné: pridajte ďalšie atribúty
        ]);

        return redirect()->back()->with('success', 'Produkt bol pridaný do košíka!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

      
        // Pridajte aktualizovanú položku
        Cart::add([
            'id' => $id,
            'name' => 'Updated Item Name', // Môžete použiť aktuálny názov alebo iný
            'price' => 10.00, // Aktualizujte podľa potreby
            'quantity' => $request->input('quantity'),
        ]);

        return redirect()->back()->with('success', 'Položka v košíku bola aktualizovaná!');
    }
    public function remove($id)
    {
        Cart::remove($id);
        return redirect()->back()->with('success', 'Produkt bol odstránený z košíka!');
    }

    public function clear()
    {
        Cart::clear();
        return redirect()->back()->with('success', 'Košík bol vymazaný!');
    }

    public function saveCartToDatabase()
    {
        $cart = Cart::getContent();
        $userCart = Cart::updateOrCreate(
            ['user_id' => Auth::id()],
            ['cart_data' => $cart->toArray()]
        );

        return redirect()->back()->with('success', 'Košík bol uložený!');
    }

    public function loadCartFromDatabase()
    {
        $userCart = Cart::where('user_id', Auth::id())->first();

        if ($userCart) {
            Cart::clear();
            foreach ($userCart->cart_data as $item) {
                Cart::add($item);
            }

            return redirect()->back()->with('success', 'Košík bol načítaný!');
        }

        return redirect()->back()->with('error', 'Nemáte uložený košík.');
    }
}
