@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto py-12 px-6">
    <h2 class="text-3xl font-bold mb-6">Available Rooms</h2>

    @if($rooms->count())
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($rooms as $room)
                <div class="border rounded-xl shadow p-4">
                    <h3 class="text-xl font-semibold">{{ $room->name }}</h3>
                    <p class="text-gray-600">{{ $room->description }}</p>
                    <p class="mt-2 font-bold text-blue-600">${{ $room->price_per_night }} / night</p>
                    <form method="GET" action="{{ route('booking.create') }}">
                        <input type="hidden" name="room_id" value="{{ $room->id }}">
                        <input type="hidden" name="check_in" value="{{ $check_in }}">
                        <input type="hidden" name="check_out" value="{{ $check_out }}">
                        <input type="hidden" name="guests" value="{{ $guests }}">
                        <button type="submit" class="mt-4 w-full bg-blue-600 hover:bg-blue-700 text-white p-3 rounded">
                            Book Now
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
    @else
        <p>No rooms available for the selected dates.</p>
    @endif
</div>
@endsection
