<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function showSearchForm()
    {
        return view('booking.search');
    }

    public function checkAvailability(Request $request)
    {
        $validated = $request->validate([
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
            'guests' => 'required|integer|min:1'
        ]);

        // You would typically query available rooms based on date + guest count
        $availableRooms = [
            [
                'id' => 1,
                'name' => 'Deluxe Room',
                'price' => 199,
                'guests' => 2,
                'image' => 'https://images.unsplash.com/photo-1631049307264-da0ec9d70304',
                'description' => 'Spacious room with king bed and city view'
            ],
            [
                'id' => 2,
                'name' => 'Executive Suite',
                'price' => 299,
                'guests' => 2,
                'image' => 'https://images.unsplash.com/photo-1566669437687-7040a6926753',
                'description' => 'Luxurious suite with separate living area'
            ]
        ];

        return view('booking.availability', [
            'rooms' => $availableRooms,
            'check_in' => $validated['check_in'],
            'check_out' => $validated['check_out'],
            'guests' => $validated['guests'],
        ]);
    }
    
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
        'room' => $selectedRoom,
        'checkIn' => $request->check_in,
        'checkOut' => $request->check_out,
        'guests' => $request->guests,
        'totalPrice' => 10, // $calculatedPrice,
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

    public function confirm(Request $request)
    {
        // Store booking logic here (save to DB or session, send email, etc.)
        // For now, just return a success view

        return view('booking-success', [
            'name' => $request->full_name,
            'checkIn' => $request->check_in,
            'checkOut' => $request->check_out,
        ]);
    }

}