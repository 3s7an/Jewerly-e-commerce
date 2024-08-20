<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(){
        $query = Product::orderBy('created_at', 'DESC');
        $products = $query->get();

        $categories = Category::all();

        return view('auth.registration',['products' => $products, 'categories' => $categories]);
    }



    public function store(Request $request){

        //validacia
        $validated = $request ->validate(
            [

                'email' => 'required|email|unique:users,email',
                'password' => 'required|confirmed|min:4'
            ]
        );

        //vytvorenie noveho uzivatela na zaklade dat z inputov
        User::create(
            [

            'email' => $validated['email'],
            'password' => $validated['password']

            ]
        );

        return redirect()->route('auth.login');


    }

    public function login(){
        $query = Product::orderBy('created_at', 'DESC');
        $products = $query->get();

        $categories = Category::all();

        return view('auth.login',['products' => $products, 'categories' => $categories]);
    }



    public function autenthificate(Request $request)
{
    // Validácia vstupov
    $validated = $request->validate(
        [
            'email' => 'required|email',
            'password' => 'required'
        ]
    );

    // Pokus o autentifikáciu používateľa pomocou emailu a hesla
    if (Auth::attempt(['email' => $validated['email'], 'password' => $validated['password']])) {
        // Obnoví sa session ID pre bezpečnosť
        $request->session()->regenerate();

        // Presmerovanie na dashboard po úspešnej autentifikácii
        return redirect()->route('dashboard');
    }

    // Pri neúspešnej autentifikácii sa používateľ presmeruje späť na login s chybovou správou
    return redirect()->route('login')->withErrors(
        ['email' => 'These credentials do not match our records.']
    );
}


    public function logout(Request $request){

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('dashboard');
    }
}
