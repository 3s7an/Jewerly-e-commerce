<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    /* Profile časť */

    public function editData(User $user){

        return view('profile.profile-change-user-data');

    }

    public function updateData(User $user)
    {
        $validated = request()->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'street' => 'required',
            'postalCode' => 'required',
            'city' => 'required|min:3|max:40'
        ]);

        $user->update([
            'name' => $validated['firstName'],
            'surname' => $validated['lastName'],
            'street' => $validated['street'],
            'zipcode' => $validated['postalCode'],
            'city' => $validated['city'],
        ]);

        return redirect()->route('profile.index')->with('success', 'Uživateľské dáta boli úspešne aktualizované');
    }

    // Koniec profile časti //

    // Začiatok admin časti

    public function index()
    {
        $users = User::all();
        $query = Product::orderBy('created_at', 'DESC');
        $products = $query->get();

        $categories = Category::all();
        return view('admin.user', ['users' => $users, 'products' => $products, 'categories' => $categories]);
    }

    public function show(User $user){

        return view('admin.user-show', compact(['user']));




    }

    public function update(Request $request, User $user){
        $user->update([
            'is_admin' => $request->input('is_admin'),
        ]);

        return redirect()->route('admin.users');
    }



}

