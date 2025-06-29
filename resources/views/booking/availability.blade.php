
@extends('layouts.app')

@section('title', 'Available Rooms')

@section('content')
<section class="py-20 bg-gray-50">
    <div class="max-w-6xl mx-auto px-6">
        <h2 class="text-3xl font-bold text-center mb-12">Available Rooms</h2>

        <div class="grid md:grid-cols-2 gap-8">
            @foreach ($rooms as $room)
                <div class="bg-white rounded-lg overflow-hidden shadow-md">
                    <img src="{{ $room['image'] }}" alt="{{ $room['name'] }}" class="w-full h-64 object-cover">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-xl font-bold">{{ $room['name'] }}</h3>
                            <span class="text-yellow-600 font-bold">${{ $room['price'] }}/night</span>
                        </div>
                        <p class="text-gray-600 mb-4">{{ $room['description'] }}</p>
                        <form method="GET" action="{{ route('user.booking') }}">
                            <input type="hidden" name="room_id" value="{{ $room['id'] }}">
                            <input type="hidden" name="check_in" value="{{ $check_in }}">
                            <input type="hidden" name="check_out" value="{{ $check_out }}">
                            <input type="hidden" name="guests" value="{{ $guests }}">
                            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">Select This Room</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
