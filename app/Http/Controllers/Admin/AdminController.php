<?php

namespace App\Http\Controllers\Admin;

use App\Models\Room;
use App\Models\User;
use App\Models\Booking;
use App\Models\RoomType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard', [
            'roomsCount' => Room::count(),
            'bookingsCount' => Booking::count(),
            'usersCount' => User::where('role', 'user')->count()
        ]);
    }

    public function rooms(Request $request)
{
    $query = Room::query();

    if ($request->filled('search')) {
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    $rooms = $query->latest()->paginate(10);

    return view('admin.rooms', compact('rooms'));
}

public function createRoom()
{
    $roomTypes = RoomType::all();
    return view('admin.rooms.create', compact('roomTypes'));
}

public function storeRoom(Request $request)
{
    $request->validate([
        'room_number' => 'required|string',
        'floor' => 'nullable|string',
        'room_type_id' => 'required|exists:room_types,id',
    ]);

    Room::create([
        'room_number' => $request->room_number,
        'floor' => $request->floor,
        'room_type_id' => $request->room_type_id,
    ]);

    return redirect()->route('admin.rooms')->with('success', 'Room created successfully.');
}

public function editRoom(Room $room)
{
    return view('admin.room-edit', compact('room'));
}

public function updateRoom(Request $request, Room $room)
{
    $request->validate([
        'name' => 'required',
        'price' => 'required|numeric',
        'description' => 'nullable',
    ]);

    $room->update($request->only('name', 'price', 'description'));

    return redirect()->route('admin.rooms')->with('success', 'Room updated!');
}

public function deleteRoom(Room $room)
{
    $room->delete();

    return back()->with('success', 'Room deleted!');
}


    public function bookings()
    {
        $bookings = Booking::with('room', 'user')->latest()->get();
        return view('admin.bookings', compact('bookings'));
    }

    public function users()
    {
        $users = User::where('role', 'user')->latest()->get();
        return view('admin.users', compact('users'));
    }
}
