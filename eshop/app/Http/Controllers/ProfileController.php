<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(){
        $categories = Category::get()->toTree();
        return view('profile.layout')->with([
            'categories' => $categories,
        ]);
    }
}
