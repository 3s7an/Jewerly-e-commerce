<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request){
        
        $validatedData = $request->validate([
            'review' => 'required|min:5|max:250'
        ]);

        
    }
}
