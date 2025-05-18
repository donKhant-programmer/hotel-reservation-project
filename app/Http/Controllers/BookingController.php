<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        // Get room types from database or config
        $roomTypes = [
            ['id' => 1, 'name' => 'Deluxe Room', 'price' => 199],
            ['id' => 2, 'name' => 'Executive Suite', 'price' => 299],
            ['id' => 3, 'name' => 'Presidential Suite', 'price' => 499]
        ];

        // Get query parameters if coming from home page
        $checkIn = $request->input('check_in', '');
        $checkOut = $request->input('check_out', '');
        $guests = $request->input('guests', 1);

        return view('booking', compact('roomTypes', 'checkIn', 'checkOut', 'guests'));
    }

    public function create(Request $request)
{
    $roomId = $request->query('room');
    
    $roomTypes = [
        [
            'id' => 1,
            'name' => 'Deluxe Room',
            'price' => 199,
            // ... other room details
        ],
        // ... other room types
    ];
    
    // Find selected room if coming from room page
    $selectedRoom = collect($roomTypes)->firstWhere('id', $roomId);
    
    return view('booking', [
        'roomTypes' => $roomTypes,
        'selectedRoomId' => $selectedRoom ? $selectedRoom['id'] : null,
        // ... other data
    ]);
}

    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'room_type' => 'required|integer',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
            'guests' => 'required|integer|min:1|max:4',
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string'
        ]);

        // Here you would typically save to database
        // For now we'll just return to confirmation
        
        return redirect()->route('booking.confirmation', [
            'booking_id' => 'BOOK-' . uniqid()
        ]);
    }
}