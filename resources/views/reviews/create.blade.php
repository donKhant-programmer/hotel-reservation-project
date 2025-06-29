@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto py-10 px-6">
    <h2 class="text-2xl font-bold mb-4 text-center text-gray-800">Rate Your Stay</h2>

    <div class="bg-white shadow p-6 rounded-lg">
        <p class="mb-3 text-sm text-gray-600">Booking: <strong>{{ $booking->room->room_number }} - {{ $booking->room->roomType->name }}</strong></p>

        <form method="POST" action="{{ route('user.reviews.store', $booking->id) }}">
            @csrf

            <label for="rating" class="block text-gray-700 mb-2">Rating (1-5)</label>
            <select name="rating" required class="w-full border p-2 mb-4 rounded">
                @for($i = 5; $i >= 1; $i--)
                    <option value="{{ $i }}">{{ $i }} Star{{ $i > 1 ? 's' : '' }}</option>
                @endfor
            </select>

            <label for="comment" class="block text-gray-700 mb-2">Comment (optional)</label>
            <textarea name="comment" rows="4" class="w-full border p-2 rounded mb-4" placeholder="How was your stay?"></textarea>

            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">Submit Review</button>
        </form>
    </div>
</div>
@endsection
