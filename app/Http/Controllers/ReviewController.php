<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ReviewController extends Controller
{
    public function store(Request $request)
    {   
        if(!Gate::allows('can_review_create')){
            return redirect()->back('You do not have permission to create review. First fill your profile.');
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
    
    public function destroy(Review $review){
        if(! Gate::allows('can_review_edit')){
            return redirect()->back()->with('error', 'You do not have permission to delete this review.');
        }

        $review->delete();

        return redirect()->back()->with('success', 'Review deleted successfully.');
    }
}
