<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Use dummy data for featured rooms
        $featuredRooms = [
            (object)[
                'id' => 1,
                'name' => 'Deluxe King Room',
                'description' => 'Spacious room with a king-sized bed, en-suite bathroom, and city view.',
                'price_per_night' => 199.99,
                'thumbnail' => 'images/room1.jpg',
            ],
            (object)[
                'id' => 2,
                'name' => 'Twin Room',
                'description' => 'Comfortable room with two twin beds, perfect for friends or family members.',
                'price_per_night' => 149.99,
                'thumbnail' => 'images/room2.jpg',
            ],
            (object)[
                'id' => 3,
                'name' => 'Family Suite',
                'description' => 'Spacious suite with a king bed and sofa bed, ideal for families.',
                'price_per_night' => 299.99,
                'thumbnail' => 'images/room3.jpg',
            ],
        ];
        
        return view('home', compact('featuredRooms'));
    }
}
