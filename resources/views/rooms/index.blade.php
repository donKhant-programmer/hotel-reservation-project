@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <h1 class="text-3xl font-bold mb-6">Our Rooms</h1>
            
            <!-- Filter Section (Placeholder for Phase 2) -->
            <div class="mb-8 p-4 bg-gray-50 rounded-lg">
                <h2 class="text-lg font-semibold mb-2">Filter Rooms</h2>
                <div class="flex flex-wrap gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Price Range</label>
                        <select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option>Any Price</option>
                            <option>$0 - $100</option>
                            <option>$100 - $200</option>
                            <option>$200+</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Room Type</label>
                        <select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option>All Types</option>
                            <option>Standard</option>
                            <option>Deluxe</option>
                            <option>Suite</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Check-in Date</label>
                        <input type="date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>
                </div>
                <button class="mt-4 bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Apply Filters</button>
            </div>
            
            <!-- Room Listings -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($rooms as $room)
                    @include('components.room-card', ['room' => $room])
                @empty
                    <div class="col-span-full text-center py-8">
                        <p class="text-gray-500">No rooms available at the moment.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection