<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $featuredRooms = Room::with('roomType')
        ->where('is_featured', true)
        ->take(4) // limit number if desired
        ->get();
        
        return view('home', compact('featuredRooms'));
    }
}
