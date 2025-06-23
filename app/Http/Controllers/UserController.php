<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;
use App\Models\User;

class UserController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        $bookings = Booking::with('room')
            ->where('user_id', $user->id)
            ->latest()
            ->get();

        return view('user.profile', compact('user', 'bookings'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        User::where('id', $user->id)->update($validated);

        return back()->with('success', 'Profile updated.');
    }
}
