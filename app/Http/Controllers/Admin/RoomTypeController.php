<?php

namespace App\Http\Controllers\Admin;

use App\Models\RoomType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoomTypeController extends Controller
{
    public function index()
    {
        $roomTypes = RoomType::all();
        return view('admin.room_types.index', compact('roomTypes'));
    }

    public function create()
    {
        return view('admin.room_types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'max_guests' => 'required|integer',
            'price_per_night' => 'required|numeric',
        ]);

        RoomType::create($request->all());
        return redirect()->route('admin.room-types.index')->with('success', 'Room type created.');
    }

    public function edit(RoomType $roomType)
    {
        return view('admin.room_types.edit', compact('roomType'));
    }

    public function update(Request $request, RoomType $roomType)
    {
        $request->validate([
            'name' => 'required',
            'max_guests' => 'required|integer',
            'price_per_night' => 'required|numeric',
        ]);

        $roomType->update($request->all());
        return redirect()->route('admin.room-types.index')->with('success', 'Updated successfully.');
    }

    public function destroy(RoomType $roomType)
    {
        $roomType->delete();
        return redirect()->back()->with('success', 'Deleted successfully.');
    }
}
