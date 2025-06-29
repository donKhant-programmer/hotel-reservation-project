<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


class BookingController extends Controller
{
    public function checkAvailability(Request $request)
{
    $validated = $request->validate([
        'check_in' => 'required|date|after_or_equal:today',
        'check_out' => 'required|date|after:check_in',
        'guests' => 'required|integer|min:1',
    ]);

    $rooms = Room::with('roomType')
    ->where('status', 'available')
    ->whereHas('roomType', function ($query) use ($validated) {
        $query->where('capacity', '>=', $validated['guests']);
    })
    ->whereDoesntHave('bookings', function ($query) use ($validated) {
        $query->where(function ($q) use ($validated) {
            $q->whereBetween('check_in', [$validated['check_in'], $validated['check_out']])
              ->orWhereBetween('check_out', [$validated['check_in'], $validated['check_out']])
              ->orWhere(function ($q) use ($validated) {
                  $q->where('check_in', '<=', $validated['check_in'])
                    ->where('check_out', '>=', $validated['check_out']);
              });
        });
    })
    ->get();


    return view('booking.available-rooms', [
        'rooms' => $rooms,
        'check_in' => $validated['check_in'],
        'check_out' => $validated['check_out'],
        'guests' => $validated['guests'],
    ]);
}

//     public function index(Request $request)
//     {
//         // Get room types from database or config
//         $roomTypes = [
//             ['id' => 1, 'name' => 'Deluxe Room', 'price' => 199],
//             ['id' => 2, 'name' => 'Executive Suite', 'price' => 299],
//             ['id' => 3, 'name' => 'Presidential Suite', 'price' => 499]
//         ];

//         // Get query parameters if coming from home page
//         $checkIn = $request->input('check_in', '');
//         $checkOut = $request->input('check_out', '');
//         $guests = $request->input('guests', 1);

//         return view('booking', compact('roomTypes', 'checkIn', 'checkOut', 'guests'));
//     }

    public function create(Request $request)
{
    $room = Room::with('roomType')->findOrFail($request->room_id);

    return view('booking.create', [
        'room' => $room,
        'check_in' => $request->check_in,
        'check_out' => $request->check_out,
        'guests' => $request->guests,
    ]);
}

// for admin side
public function updateStatus(Request $request, Booking $booking)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,paid,confirmed,cancelled,checked_in,checked_out',
        ]);

        $booking->status = $validated['status'];
        $booking->save();

        return redirect()->back()->with('success', 'Booking status updated successfully.');
    }

public function store(Request $request)
{
    $validated = $request->validate([
        'room_id' => 'required|exists:rooms,id',
        'check_in' => 'required|date',
        'check_out' => 'required|date|after:check_in',
        'guests' => 'required|integer|min:1|max:10',
        'name' => 'required|string',
        'email' => 'required|email',
        'phone' => 'required|string',
        'special_requests' => 'nullable|string'
    ]);

    $booking = Booking::create([
        ...$validated,
        'reference' => 'BOOK-' . strtoupper(Str::random(8)),
        'user_id' => Auth::id(),
        'status' => 'pending' // Add this field to track payment status
    ]);

    // Optionally send email now, or after payment success

    return redirect()->route('user.booking.payment', $booking->id);
}

public function payment(Booking $booking)
{
    return view('booking.payment', compact('booking'));
}

public function pay(Request $request, Booking $booking)
{
    $booking->update([
        'status' => 'paid',
        'payment_method' => $request->payment_method ?? 'mock_card',
    ]);

    // Send confirmation email
    Mail::to($booking->email)->send(new \App\Mail\BookingConfirmed($booking));

    return view('booking.confirmation', compact('booking'));
}

    public function confirm(Request $request)
    {
        return view('booking-success', [
            'name' => $request->full_name,
            'checkIn' => $request->check_in,
            'checkOut' => $request->check_out,
        ]);
    }

}