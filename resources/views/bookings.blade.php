@extends('layouts.app')

@section('title', 'Book Your Stay - Paradise Hotel')

@section('content')
<div class="py-12 bg-white">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-center mb-8">Book Your Stay</h2>
        
        <form class="bg-gray-50 p-8 rounded-lg shadow-md">
            @csrf
            
            <div class="mb-6">
                <label class="block text-gray-700 mb-2" for="room_type">Room Type</label>
                <select id="room_type" name="room_type" class="w-full px-4 py-2 border rounded-md">
                    @foreach($roomTypes as $type)
                        <option value="{{ $type['id'] }}">{{ $type['name'] }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label class="block text-gray-700 mb-2" for="check_in">Check-in Date</label>
                    <input type="date" id="check_in" name="check_in" class="w-full px-4 py-2 border rounded-md">
                </div>
                <div>
                    <label class="block text-gray-700 mb-2" for="check_out">Check-out Date</label>
                    <input type="date" id="check_out" name="check_out" class="w-full px-4 py-2 border rounded-md">
                </div>
            </div>
            
            <button type="submit" class="w-full bg-blue-600 text-white py-3 px-4 rounded-md hover:bg-blue-700">
                Complete Booking
            </button>
        </form>
    </div>
</div>
@endsection