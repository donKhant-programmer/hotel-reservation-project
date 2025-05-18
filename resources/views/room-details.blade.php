@extends('layouts.app')

@section('title', $room['name'] . ' - Paradise Hotel')

@section('content')
<div class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Back button -->
        <div class="mb-6">
            <a href="{{ url('/') }}" class="text-blue-600 hover:text-blue-800 flex items-center">
                <i class="fas fa-arrow-left mr-2"></i> Back to Home
            </a>
        </div>
        
        <!-- Room details content -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- ... rest of your room details template ... -->
            <div>
                <h1 class="text-3xl font-bold mb-4">{{ $room['name'] }}</h1>
                <div class="flex items-center mb-6">
                    <div class="text-yellow-400 mr-2">
                        @for($i = 0; $i < 5; $i++)
                            <i class="fas fa-star{{ $i < $room['rating'] ? '' : '-half-alt' }}"></i>
                        @endfor
                    </div>
                    <span class="text-gray-600">{{ $room['reviews'] }} reviews</span>
                </div>
                
                <p class="text-gray-800 text-lg mb-6">{{ $room['description'] }}</p>
                
                <div class="grid grid-cols-2 gap-4 mb-8">
                    <div class="flex items-center">
                        <i class="fas fa-user-friends text-blue-500 mr-2"></i>
                        <span>Max Guests: {{ $room['max_guests'] }}</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-ruler-combined text-blue-500 mr-2"></i>
                        <span>Size: {{ $room['size'] }} sq ft</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-bed text-blue-500 mr-2"></i>
                        <span>Bed: {{ $room['bed_type'] }}</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-wifi text-blue-500 mr-2"></i>
                        <span>Free WiFi</span>
                    </div>
                </div>
                
                <div class="bg-gray-50 p-6 rounded-lg mb-8">
                    <h3 class="font-bold text-lg mb-4">Room Amenities</h3>
                    <ul class="grid grid-cols-2 gap-2">
                        @foreach($room['amenities'] as $amenity)
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-2"></i>
                            {{ $amenity }}
                        </li>
                        @endforeach
                    </ul>
                </div>
                
                <div class="bg-blue-50 p-6 rounded-lg">
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-2xl font-bold">${{ number_format($room['price'], 2) }}/night</span>
                        <a href="{{ url('/booking/create', ['room_id' => $room['id']]) }}" 
                            class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg">
                             Book Now
                         </a>
                    </div>
                    <p class="text-sm text-gray-600">* Taxes and fees included</p>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection