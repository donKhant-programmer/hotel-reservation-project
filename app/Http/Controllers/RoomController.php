<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::with('roomType')->latest()->get();
        return view('rooms.index', compact('rooms'));
    }

    public function show(Room $room, Request $request)
{
    $room = Room::with(['roomType', 'reviews.user'])->findOrFail($room->id);

    return view('rooms.show', [
        'room' => $room,
        'check_in' => $request->check_in,
        'check_out' => $request->check_out,
        'guests' => $request->guests ?? 1,
    ]);
}

}
