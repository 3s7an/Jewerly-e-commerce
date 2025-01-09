<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ReviewController extends Controller
{
    public function store(Request $request)
    {   
        if(!Gate::allows('can_review')){
            return redirect()->back();
        }

        $request->validate([
            'text' => 'required|min:5|max:250',
            'rating' => 'required|numeric'
        ]);

        Review::create([
            'user_id' => '1',
            'product_id' => $request->product_id,
            'text' => $request->text,
            'rating' => $request->rating,
        ]);

        return redirect()->back();
    }
}
