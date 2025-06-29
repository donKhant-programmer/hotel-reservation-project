@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
    <button onclick="history.back()" class="text-blue-600 hover:underline mb-6 text-sm sm:text-base">&larr; Back to Rooms</button>

    <h2 class="text-2xl sm:text-3xl font-bold mb-6 text-gray-800 text-center">Book Your Stay</h2>

    <div class="bg-white shadow-md rounded-lg p-6 sm:p-8 space-y-6">
        {{-- Room Info --}}
        <div class="space-y-1 text-center">
            <h3 class="text-lg sm:text-xl font-semibold">{{ $room->room_number }} - {{ $room->roomType->name }}</h3>
            <p class="text-gray-600 text-sm">Capacity: {{ $room->roomType->capacity }} guests</p>
            <p class="text-blue-600 font-medium text-sm">Price: ${{ number_format($room->roomType->base_price, 2) }} per night</p>
        </div>

        <form action="{{ route('user.booking.store') }}" method="POST" class="space-y-5">
            @csrf

            <input type="hidden" name="room_id" value="{{ $room->id }}">
            <input type="hidden" name="check_in" value="{{ $check_in }}">
            <input type="hidden" name="check_out" value="{{ $check_out }}">
            <input type="hidden" name="guests" value="{{ $guests }}">

            @php
                $days = \Carbon\Carbon::parse($check_out)->diffInDays(\Carbon\Carbon::parse($check_in)) ?: 1;
                $totalPrice = $room->roomType->base_price * $days;
            @endphp

            {{-- User Info --}}
            <div>
                <label class="block text-sm font-medium mb-1 text-gray-700">Full Name <span class="text-red-500">*</span></label>
                <input type="text" name="name" required class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 text-sm mb-1">
            </div>

            <div>
                <label class="block text-sm font-medium mb-1 text-gray-700">Email Address <span class="text-red-500">*</span></label>
                <input type="email" name="email" required class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 text-sm mb-1">
            </div>

            <div>
                <label class="block text-sm font-medium mb-1 text-gray-700">Phone Number <span class="text-red-500">*</span></label>
                <input type="text" name="phone" required class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 text-sm mb-1">
            </div>

            {{-- Optional --}}
            <div>
                <label class="block text-sm font-medium mb-1 text-gray-700">Special Requests</label>
                <textarea name="special_requests" rows="3" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 text-sm mb-3" placeholder="e.g. Need extra pillows, early check-in..."></textarea>
            </div>

            {{-- Summary --}}
            <div class="p-4 bg-gray-50 border border-gray-200 rounded-lg text-sm text-gray-700 space-y-1">
                <div><strong>Check-in:</strong> {{ $check_in }}</div>
                <div><strong>Check-out:</strong> {{ $check_out }}</div>
                <div><strong>Total Nights:</strong> {{ $days }}</div>
                <div><strong>Guests:</strong> {{ $guests }}</div>
                <div class="pt-2 text-base"><strong>Total Price:</strong> ${{ number_format($totalPrice, 2) }}</div>
            </div>

            {{-- Submit --}}
            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg text-sm sm:text-base font-semibold transition mt-3">Continue to Payment</button>
            {{-- <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg text-sm sm:text-base font-semibold transition mt-3">
                Confirm Booking
            </button> --}}
        </form>
    </div>
</div>
@endsection
