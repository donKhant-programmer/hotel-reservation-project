@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto py-16 px-4 sm:px-6 lg:px-8 text-center">
    <div class="bg-white shadow-lg rounded-lg p-8">
        <h2 class="text-3xl font-bold text-green-600 mb-4">Booking Confirmed!</h2>
        <p class="text-gray-700 mb-4">Thank you <strong>{{ $booking->name }}</strong> for your reservation.</p>

        <div class="text-left mt-6 space-y-2 text-sm text-gray-600">
            <p><strong>Booking ID:</strong> {{ $booking->reference }}</p>
            <p><strong>Room:</strong> {{ $booking->room->room_number }} - {{ $booking->room->roomType->name }}</p>
            <p><strong>Guests:</strong> {{ $booking->guests }}</p>
            <p><strong>Check-in:</strong> {{ $booking->check_in }}</p>
            <p><strong>Check-out:</strong> {{ $booking->check_out }}</p>
        </div>

        <a href="{{ route('user.reviews.create', $booking->id) }}" class="mt-6 inline-block bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-3 rounded">
            Leave a Review
        </a>
        
        <a href="{{ route('home') }}" class="mt-6 ml-6 inline-block bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition">
            Back to Home
        </a>
    </div>
</div>
@endsection
