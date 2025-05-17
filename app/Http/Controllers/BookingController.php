<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class BookingController extends Controller
{
    /**
     * Show the form for creating a new booking.
     *
     * @param  int  $roomId
     * @return \Illuminate\Http\Response
     */
    public function create($roomId)
    {
        // For now, we'll use the dummy room data approach
        $room = $this->getDummyRoom($roomId);
        
        return view('booking.create', compact('room'));
    }

    /**
     * Store a newly created booking in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $roomId
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $roomId)
    {
        // This will be implemented later when we add database functionality
        // For now, just redirect back with a success message
        
        return redirect()->route('rooms.show', $roomId)
            ->with('success', 'Your booking request has been received. We will contact you shortly.');
    }
    
    /**
     * Get dummy room data for development
     */
    private function getDummyRoom($id)
    {
        $rooms = [
            1 => (object)[
                'id' => 1,
                'name' => 'Deluxe King Room',
                'description' => 'Spacious room with a king-sized bed, en-suite bathroom, and city view. Perfect for couples or business travelers seeking comfort and luxury.',
                'price_per_night' => 199.99,
                'thumbnail' => 'images/room1.jpg',
                'max_occupancy' => 2,
                'bed_type' => 'King',
                'size' => 400,
            ],
            2 => (object)[
                'id' => 2,
                'name' => 'Twin Room',
                'description' => 'Comfortable room with two twin beds, perfect for friends or family members traveling together. Includes a private bathroom and workspace.',
                'price_per_night' => 149.99,
                'thumbnail' => 'images/room2.jpg',
                'max_occupancy' => 2,
                'bed_type' => 'Twin',
                'size' => 350,
            ],
            3 => (object)[
                'id' => 3,
                'name' => 'Family Suite',
                'description' => 'Spacious suite with a king bed and sofa bed, ideal for families. Features a separate living area, two TVs, and a large bathroom with a tub.',
                'price_per_night' => 299.99,
                'thumbnail' => 'images/room3.jpg',
                'max_occupancy' => 4,
                'bed_type' => 'King + Sofa Bed',
                'size' => 600,
            ],
        ];
        
        return $rooms[$id] ?? abort(404);
    }
}