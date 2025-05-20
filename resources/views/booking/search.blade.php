
@extends('layouts.app')

@section('title', 'Search Rooms')

@section('content')
<section class="py-20 bg-white">
    <div class="max-w-xl mx-auto px-6">
        <h2 class="text-3xl font-bold mb-8 text-center text-gray-800">Start Your Booking</h2>
        <form action="{{ route('booking.availability') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label class="block font-medium text-gray-700">Check-in</label>
                <input type="date" name="check_in" class="form-input w-full" required>
            </div>
            <div>
                <label class="block font-medium text-gray-700">Check-out</label>
                <input type="date" name="check_out" class="form-input w-full" required>
            </div>
            <div>
                <label class="block font-medium text-gray-700">Guests</label>
                <select name="guests" class="form-select w-full" required>
                    <option value="1">1 Guest</option>
                    <option value="2">2 Guests</option>
                    <option value="3">3 Guests</option>
                    <option value="4">4 Guests</option>
                </select>
            </div>
            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg">Check Availability</button>
        </form>
    </div>
</section>
@endsection
