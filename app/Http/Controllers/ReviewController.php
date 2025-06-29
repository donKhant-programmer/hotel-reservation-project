<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{  

public function create($bookingId)
{
    $booking = Booking::with('room')->findOrFail($bookingId);

    // Optional: Only allow if user has not reviewed yet
    if ($booking->review) {
        return redirect()->route('home')->with('error', 'You already submitted a review.');
    }

    return view('reviews.create', compact('booking'));
}

public function store(Request $request, $bookingId)
{
    $request->validate([
        'rating' => 'required|integer|min:1|max:5',
        'comment' => 'nullable|string|max:1000',
    ]);

    $booking = Booking::findOrFail($bookingId);

    Review::create([
        'booking_id' => $booking->id,
        'user_id' => Auth::user()->id,
        'room_id' => $booking->room_id,
        'rating' => $request->rating,
        'comment' => $request->comment,
    ]);

    return redirect()->route('home')->with('success', 'Thanks for your feedback!');
}

}
