<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'text' => 'required|min:5|max:250',
            'rating' => 'required|numeric'
        ]);

        Review::create([
            'text' => $request->text,
            'user_id' => Auth::id(),
            'rating' => $request->rating,
        ]);

        return redirect()->back();
    }
}
