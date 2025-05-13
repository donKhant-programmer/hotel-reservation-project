<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Dummy data fallback if no DB yet
        // $featuredRooms = Room::latest()->take(3)->get() ?? [];

        $featuredRooms = [
            (object)[
                'id' => 1,
                'name' => 'Deluxe King Room',
                'description' => 'A luxurious king-sized room with stunning views.',
                'price_per_night' => 120,
                'thumbnail' => 'images/room1.jpg',
            ],
            (object)[
                'id' => 2,
                'name' => 'Standard Twin Room',
                'description' => 'Perfect for travelers and families.',
                'price_per_night' => 85,
                'thumbnail' => 'images/room2.jpg',
            ],
            (object)[
                'id' => 3,
                'name' => 'Suite with Sea View',
                'description' => 'Spacious suite with a private balcony.',
                'price_per_night' => 200,
                'thumbnail' => 'images/room3.jpg',
            ],
        ];

        return view('home', compact('featuredRooms'));
    }
}
