@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-12">
    <h2 class="text-3xl font-bold text-gray-800 mb-6">Explore Our Rooms</h2>

    {{-- Optional Filters --}}
    {{-- 
    <form method="GET" action="{{ route('rooms') }}" class="mb-6">
        <div class="flex flex-wrap gap-4">
            <select name="type" class="border p-2 rounded">
                <option value="">All Types</option>
                @foreach($roomTypes as $type)
                    <option value="{{ $type->id }}" {{ request('type') == $type->id ? 'selected' : '' }}>
                        {{ $type->name }}
                    </option>
                @endforeach
            </select>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Filter</button>
        </div>
    </form>
    --}}

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse ($rooms as $room)
            <div class="bg-white shadow-md rounded-lg overflow-hidden transition hover:shadow-xl">
                @if ($room->image)
                    <img src="{{ asset('storage/' . $room->image) }}" alt="{{ $room->room_number }}" class="w-full h-48 object-cover">
                @else
                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-400">No Image</div>
                @endif

                <div class="p-5">
                    <h3 class="text-xl font-semibold text-gray-800 mb-1">
                        {{ $room->room_number }} - {{ $room->roomType->name }}
                    </h3>

                    <p class="text-gray-500 text-sm mb-2">
                        {{ Str::limit($room->description, 100) }}
                    </p>

                    <ul class="text-sm text-gray-600 mb-2">
                        <li><strong>Capacity:</strong> {{ $room->roomType->capacity }} guest(s)</li>
                        <li><strong>Floor:</strong> {{ $room->floor }}</li>
                    </ul>

                    <div class="flex justify-between items-center mt-4">
                        <span class="text-blue-600 font-bold text-lg">
                            ${{ number_format($room->roomType->base_price, 2) }}
                            <span class="text-sm text-gray-500">/night</span>
                        </span>
                        <a href="{{ route('rooms.show', [
    'room' => $room->id,
    'check_in' => request('check_in'),
    'check_out' => request('check_out'),
    'guests' => request('guests')
]) }}"
   class="text-sm text-blue-600 hover:text-blue-800 font-medium">
   View Details →
</a>
                    </div>
                </div>
            </div>
        @empty
            <p class="col-span-full text-center text-gray-500">No rooms available right now.</p>
        @endforelse
    </div>
</div>
@endsection
