<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReviewRating;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    // Method-method controller lainnya dapat ditambahkan di sini
    
    public function reviewStore(Request $request){
        $review = new ReviewRating();
        $review->comments = $request->comment;
        $review->star_rating = $request->rating;
        $review->save();
        return redirect()->back()->with('flash_msg_success', 'Your review has been submitted Successfully');
    }
    
}