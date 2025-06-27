@extends('layouts.app')

@section('title', 'Our Rooms - WYNDHAM Hotel')

@section('content')
<div class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-center mb-12">Our Rooms & Suites</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($rooms as $room)
            <div class="bg-gray-50 rounded-lg overflow-hidden shadow-md feature-card">
                <div class="h-48 bg-gray-200"></div>
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-2">{{ $room['name'] }}</h3>
                    <p class="text-gray-600 mb-4">Starting from ${{ $room['price'] }} per night</p>
                    <a href="{{ route('booking') }}?room={{ $room['id'] }}" 
                       class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                        Book Now
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection