<?php

namespace App\Http\Controllers\Admin;

use App\Models\Room;
use App\Models\User;
use App\Models\Booking;
use App\Models\RoomType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

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
        $query = Room::with('roomType'); // ✅ Eager load to avoid N+1
    
        if ($request->filled('search')) {
            $query->where('room_number', 'like', '%' . $request->search . '%');
        }
    
        $rooms = $query->latest()->paginate(10);
    
        return view('admin.rooms.index', compact('rooms')); // adjust view name if needed
    }
    

public function createRoom()
{
    $roomTypes = RoomType::all();
    return view('admin.rooms.form', [
        'roomTypes' => $roomTypes
    ]);
}

public function storeRoom(Request $request)
{
    $request->validate([
        'room_number' => 'required|string',
        'floor' => 'nullable|string',
        'room_type_id' => 'required|exists:room_types,id',
        'description' => 'nullable|string',
        'status' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('rooms', 'public'); // stored in storage/app/public/rooms
    }

    Room::create([
        'room_number' => $request->room_number,
        'floor' => $request->floor,
        'room_type_id' => $request->room_type_id,
        'description' => $request->description,
        'status' => $request->status ?? 'available',
        'image' => $imagePath,
    ]);

    return redirect()->route('admin.rooms')->with('success', 'Room created successfully.');
}



public function editRoom(Room $room)
{
    $roomTypes = RoomType::all();
    return view('admin.rooms.form', [
        'room' => $room,
        'roomTypes' => $roomTypes
    ]);
}
public function updateRoom(Request $request, Room $room)
{
    $request->validate([
        'room_number' => 'required|string',
        'floor' => 'nullable|string',
        'room_type_id' => 'required|exists:room_types,id',
        'description' => 'nullable|string',
        'status' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    $data = $request->only(['room_number', 'floor', 'room_type_id', 'description', 'status']);
    $data['status'] = $request->status ?? 'available';

    if ($request->hasFile('image')) {
        // Optional: delete old image if exists
        if ($room->image && Storage::disk('public')->exists($room->image)) {
            Storage::disk('public')->delete($room->image);
        }
    
        $data['image'] = $request->file('image')->store('rooms', 'public');
    }
    

    $room->update($data);

    return redirect()->route('admin.rooms')->with('success', 'Room updated successfully.');
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
