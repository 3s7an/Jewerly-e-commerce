<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\User;
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

    public function updateUserData(Request $request)
{
    // Validácia údajov
    $validatedData = $request->validate([
        'firstName' => 'required|string|max:255',
        'lastName' => 'required|string|max:255',
        'email' => 'required|string|max:255',
        'street' => 'required|string|max:255',
        'postalCode' => 'required|string|max:10',
        'city' => 'required|string|max:255',
    ]);

    /** @var \App\Models\User $user */
    $user = Auth::user();

    // Vyplnenie údajov
    $user->fill([
        'name' => $validatedData['firstName'],
        'surname' => $validatedData['lastName'],
        'email' => $validatedData['email'],
        'street' => $validatedData['street'],
        'zipcode' => $validatedData['postalCode'],
        'city' => $validatedData['city']
    ]);

    // Uloženie údajov
    $user->save();

    return response()->json(['success' => 'Údaje boli úspešne uložené']);
}

public function myOrdersShow()
{
    // Načítanie objednávok pre prihláseného používateľa
    $orders = Order::where('user_id', Auth::id())->get();

    // total items - navbar
    $cart = Cart::where('user_id', Auth::id())->first();
    $totalItems = $cart ? $cart->totalItems() : 0;

    return view('profile.my-orders', compact('orders', 'totalItems'));
}

}
