@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

    <!-- Back Button -->
    <div class="mb-6">
        <a href="{{ url()->previous() }}" class="inline-flex items-center text-blue-600 hover:underline">
            ← Back to Rooms
        </a>
    </div>

    <div class="grid lg:grid-cols-2 gap-8">
        <!-- Left: Image -->
        <div>
            <img src="{{ asset('storage/' . $room->image) }}"
                 alt="Room Image"
                 class="rounded-xl shadow-md w-full h-64 object-cover">
        </div>

        <!-- Right: Room Details -->
        <div>
            <h2 class="text-3xl font-bold text-gray-800 mb-2">
                Room {{ $room->room_number }} — {{ $room->roomType->name }}
            </h2>
            <p class="text-sm text-gray-500 mb-4">Floor: {{ $room->floor }}</p>

            <p class="text-gray-600 mb-4">
                {{ $room->description }}
            </p>

            <div class="text-blue-600 text-lg font-semibold mb-2">
                ${{ number_format($room->roomType->base_price, 2) }} / night
            </div>

            <p class="text-sm text-gray-600 mb-4">
                Capacity: {{ $room->roomType->capacity }} guest{{ $room->roomType->capacity > 1 ? 's' : '' }}
            </p>

            <!-- Amenities -->
            @if (!empty($room->roomType->amenities))
                <div class="mb-4">
                    <h4 class="font-semibold text-gray-700 mb-1">Amenities:</h4>
                    <ul class="list-disc list-inside text-gray-600 text-sm">
                        @foreach ($room->roomType->amenities as $amenity)
                            <li>{{ $amenity }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Booking Form -->
            <form method="GET" action="{{ route('rooms.show', $room->id) }}" class="space-y-4 mt-6">
                <div class="flex flex-col sm:flex-row gap-4">
                    <input type="date" name="check_in" value="{{ request('check_in') }}" required
                        class="w-full border rounded-lg px-4 py-2 focus:ring focus:ring-blue-300">
                    <input type="date" name="check_out" value="{{ request('check_out') }}" required
                        class="w-full border rounded-lg px-4 py-2 focus:ring focus:ring-blue-300">
                    <input type="number" name="guests" value="{{ request('guests', 1) }}" min="1"
                        max="{{ $room->roomType->capacity }}"
                        class="w-full border rounded-lg px-4 py-2 focus:ring focus:ring-blue-300">
                </div>

                <button type="submit"
                    class="w-full sm:w-auto bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-lg transition mt-3">
                    Check Availability
                </button>
            </form>

            <!-- Availability Result -->
            @if(request()->filled(['check_in', 'check_out', 'guests']))
                @php
                    $isAvailable = !$room->bookings()->where(function ($q) {
                        $check_in = request('check_in');
                        $check_out = request('check_out');
                        $q->whereBetween('check_in', [$check_in, $check_out])
                          ->orWhereBetween('check_out', [$check_in, $check_out])
                          ->orWhere(function ($q2) use ($check_in, $check_out) {
                              $q2->where('check_in', '<=', $check_in)
                                 ->where('check_out', '>=', $check_out);
                          });
                    })->exists();
                @endphp

                @if ($isAvailable && request('guests') <= $room->roomType->capacity)
                    <a href="{{ route('booking.create', [
                        'room_id' => $room->id,
                        'check_in' => request('check_in'),
                        'check_out' => request('check_out'),
                        'guests' => request('guests'),
                    ]) }}"
                       class="block mt-4 text-center bg-green-600 hover:bg-green-700 text-white py-3 rounded-lg font-semibold">
                        ✅ Book Now
                    </a>
                @else
                    <div class="mt-4 text-red-600 font-medium">
                        ❌ Not available on selected dates or exceeds guest limit.
                    </div>
                @endif
            @endif
        </div>
    </div>
</div>
@endsection
