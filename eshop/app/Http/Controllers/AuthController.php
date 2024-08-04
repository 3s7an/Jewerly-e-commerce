<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

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
                'name' => 'required|min:5|max:30',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|confirmed|min:4'
            ]
        );

        //vytvorenie noveho uzivatela na zaklade dat z inputov
        User::create(
            [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password']

            ]
        );

        return redirect()->route('dashboard');


    }

    public function login(){
        $query = Product::orderBy('created_at', 'DESC');
        $products = $query->get();

        $categories = Category::all();

        return view('auth.login',['products' => $products, 'categories' => $categories]);
    }


       
    public function autenthificate(Request $request)
    {
        $validated = $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required'
            ]
            );

            if(auth()->attempt($validated)){
                $request->session()->regenerate();
                return redirect()->route('dashboard');
            }

            return redirect()->route('login')->withErrors(
                ['email' => 'There is no matching user with these email and password']
            );
    }

    public function logout(Request $request){

        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('dashboard');
    }
}
