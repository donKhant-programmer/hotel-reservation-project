<?php

namespace App\Http\Controllers\Admin;

use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoomController extends Controller
{
    public function index() {
        $rooms = Room::with('roomType')->get();
        return view('admin.rooms.index', compact('rooms'));
    }

    public function create() {
        $roomTypes = RoomType::all();
        return view('admin.rooms.create', compact('roomTypes'));
    }

    public function store(Request $request) {
        $request->validate([
            'room_number' => 'required|unique:rooms',
            'room_type_id' => 'required|exists:room_types,id',
            'price' => 'required|numeric',
            'capacity' => 'required|integer',
            'status' => 'required|in:available,booked,maintenance',
        ]);

        Room::create($request->all());
        return redirect()->route('rooms.index')->with('success', 'Room created.');
    }

    public function edit(Room $room) {
        $roomTypes = RoomType::all();
        return view('admin.rooms.edit', compact('room', 'roomTypes'));
    }

    public function update(Request $request, Room $room) {
        $request->validate([
            'room_number' => 'required|unique:rooms,room_number,' . $room->id,
            'room_type_id' => 'required|exists:room_types,id',
            'price' => 'required|numeric',
            'capacity' => 'required|integer',
            'status' => 'required|in:available,booked,maintenance',
        ]);

        $room->update($request->all());
        return redirect()->route('rooms.index')->with('success', 'Room updated.');
    }

    public function destroy(Room $room) {
        $room->delete();
        return redirect()->route('rooms.index')->with('success', 'Room deleted.');
    }
}
