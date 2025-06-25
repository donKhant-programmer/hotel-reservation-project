@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-10 px-6">
    <h2 class="text-3xl font-bold mb-6 text-gray-800">Available Rooms</h2>
    <p class="mb-6 text-gray-600">
        Showing results for <strong>{{ $guests }} guest{{ $guests > 1 ? 's' : '' }}</strong> from
        <strong>{{ \Carbon\Carbon::parse($check_in)->format('M d, Y') }}</strong> to
        <strong>{{ \Carbon\Carbon::parse($check_out)->format('M d, Y') }}</strong>.
    </p>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($rooms as $room)
            <div class="bg-white rounded-lg shadow p-6">
                @if($room->image)
                    <img src="{{ asset('storage/' . $room->image) }}" class="rounded mb-4 w-full h-40 object-cover" alt="{{ $room->room_number }}">
                @endif
                <h3 class="text-xl font-semibold mb-2">{{ $room->room_number }} - {{ $room->roomType->name }}</h3>
                <p class="text-gray-600 mb-2">{{ \Illuminate\Support\Str::limit($room->description, 100) }}</p>
                <p class="text-blue-600 font-semibold mb-2">${{ number_format($room->roomType->base_price, 2) }} per night</p>
                <a href="{{ route('booking.create', ['room_id' => $room->id, 'check_in' => $check_in, 'check_out' => $check_out, 'guests' => $guests]) }}"
                    class="inline-block text-blue-500 hover:underline font-medium">
                    Book Now
                 </a>
                 
            </div>
        @empty
            <p class="col-span-full text-center text-gray-500">No available rooms match your criteria.</p>
        @endforelse
    </div>
</div>
@endsection
