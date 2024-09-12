<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class OrderController extends Controller
{

    // DASHBOARD CAST
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
          // Validácia údajov
    $validated = $request->validate([
        'name' => 'required|string',
        'surname' => 'required|string',
        'email' => 'required|email',
        'street' => 'required|string',
        'zipcode' => 'required|string',
        'city' => 'required|string',
        'payment_method' => 'required|string',
        'items' => 'required|array',
        'items.*.product_id' => 'required|exists:products,id',
        'items.*.quantity' => 'required|integer|min:1',
    ]);

    // Vytvorenie objednávky
    $order = Order::create([
        'order_number' => Str::uuid(),
        'user_id' => Auth::id(),
        'total_price' => 0, // Toto vypočítame nižšie
        'status' => 'pending',
    ]);

    // Pridanie položiek do objednávky a výpočet celkovej ceny
    $totalPrice = 0;
    foreach ($validated['items'] as $item) {
        $product = Product::find($item['product_id']);
        $price = $product->price * $item['quantity'];
        $totalPrice += $price;

        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $item['product_id'],
            'quantity' => $item['quantity'],
        ]);
    }

    // Aktualizácia celkovej ceny objednávky
    $order->update(['total_price' => $totalPrice]);

    return redirect()->route('dashboard')->with('success', 'Objednávka bola úspešne vytvorená.');
    }

    // KONIEC DASHBOARD CASTI

    // ZACIATOK ADMIN CASTI

    public function adminIndex(){
        $orders  = Order::all();
        return view('admin.order', compact('orders'));
    }
}
