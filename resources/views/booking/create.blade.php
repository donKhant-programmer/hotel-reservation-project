@extends('layouts.app')

@section('title', 'Book ' . $room->name . ' | Paradise Hotel')

@section('content')
<div class="py-16 bg-gray-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Breadcrumb Navigation -->
        <nav class="flex mb-8" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('home') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                        <svg class="w-3 h-3 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                        </svg>
                        Home
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <a href="{{ route('rooms.index') }}" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2">Rooms & Suites</a>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <a href="{{ route('rooms.show', $room->id) }}" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2">{{ $room->name }}</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Book Now</span>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="bg-white overflow-hidden shadow-xl rounded-xl">
            <div class="p-8">
                <h1 class="text-3xl font-bold text-gray-900 mb-6">Book Your Stay</h1>
                
                <div class="flex flex-col md:flex-row gap-8 mb-8">
                    <div class="md:w-1/3">
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h2 class="text-xl font-semibold mb-4">{{ $room->name }}</h2>
                            <img src="{{ asset($room->thumbnail) }}" alt="{{ $room->name }}" class="w-full h-48 object-cover rounded-lg mb-4">
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-gray-600">Price per night:</span>
                                <span class="font-bold text-yellow-600">${{ $room->price_per_night }}</span>
                            </div>
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-gray-600">Max guests:</span>
                                <span>{{ $room->max_occupancy }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Bed type:</span>
                                <span>{{ $room->bed_type }}</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="md:w-2/3">
                        <form action="{{ route('booking.store', $room->id) }}" method="POST" class="space-y-6">
                            @csrf
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="check_in" class="block text-sm font-medium text-gray-700 mb-1">Check-in Date</label>
                                    <input type="date" id="check_in" name="check_in" required class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent">
                                </div>
                                
                                <div>
                                    <label for="check_out" class="block text-sm font-medium text-gray-700 mb-1">Check-out Date</label>
                                    <input type="date" id="check_out" name="check_out" required class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent">
                                </div>
                                
                                <div>
                                    <label for="guests" class="block text-sm font-medium text-gray-700 mb-1">Number of Guests</label>
                                    <select id="guests" name="guests" required class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent">
                                        @for ($i = 1; $i <= $room->max_occupancy; $i++)
                                            <option value="{{ $i }}">{{ $i }} {{ $i === 1 ? 'Guest' : 'Guests' }}</option>
                                        @endfor
                                    </select>
                                </div>
                                
                                <div>
                                    <label for="special_requests" class="block text-sm font-medium text-gray-700 mb-1">Special Requests</label>
                                    <select id="special_requests" name="special_requests" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent">
                                        <option value="">None</option>
                                        <option value="early_check_in">Early Check-in</option>
                                        <option value="late_check_out">Late Check-out</option>
                                        <option value="extra_bed">Extra Bed</option>
                                        <option value="airport_pickup">Airport Pickup</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="border-t border-gray-200 pt-6">
                                <h3 class="text-lg font-semibold mb-4">Guest Information</h3>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label for="first_name" class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
                                        <input type="text" id="first_name" name="first_name" required class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent">
                                    </div>
                                    
                                    <div>
                                        <label for="last_name" class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>
                                        <input type="text" id="last_name" name="last_name" required class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent">
                                    </div>
                                    
                                    <div>
                                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                                        <input type="email" id="email" name="email" required class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent">
                                    </div>
                                    
                                    <div>
                                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                                        <input type="tel" id="phone" name="phone" required class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="border-t border-gray-200 pt-6">
                                <button type="submit" class="w-full bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-4 px-6 rounded-lg transition duration-300 shadow-md hover:shadow-lg">
                                    Complete Booking
                                </button>
                                <p class="text-sm text-gray-500 mt-4 text-center">
                                    By clicking "Complete Booking", you agree to our terms and conditions.
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection