<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoomController extends Controller
{
    private function getDummyRooms()
    {
        return [
            (object)[
                'id' => 1,
                'name' => 'Deluxe King Room',
                'description' => 'Spacious room with a king-sized bed, en-suite bathroom, and city view. Perfect for couples or business travelers seeking comfort and luxury.',
                'price_per_night' => 199.99,
                'thumbnail' => 'images/room1.jpg',
                'max_occupancy' => 2,
                'bed_type' => 'King',
                'size' => 400,
            ],
            (object)[
                'id' => 2,
                'name' => 'Twin Room',
                'description' => 'Comfortable room with two twin beds, perfect for friends or family members traveling together. Includes a private bathroom and workspace.',
                'price_per_night' => 149.99,
                'thumbnail' => 'images/room2.jpg',
                'max_occupancy' => 2,
                'bed_type' => 'Twin',
                'size' => 350,
            ],
            (object)[
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
    }

    public function index()
    {
        $rooms = $this->getDummyRooms();
        return view('rooms.index', compact('rooms'));
    }

    public function show($id)
    {
        $rooms = $this->getDummyRooms();
        $room = collect($rooms)->firstWhere('id', (int)$id);
        
        if (!$room) {
            abort(404);
        }
        
        return view('rooms.show', compact('room'));
    }
    
    // Remove or rename any duplicate index() method that might be here
    // For example, if you have another method like:
    // public function index() { ... }
    // Either remove it or rename it to something like:
    public function listRooms()
    {
        // Your code here
    }
}
