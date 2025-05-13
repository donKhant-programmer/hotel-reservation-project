<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function show(Room $room)
    {
        return view('rooms.show', compact('room'));
    }
}
