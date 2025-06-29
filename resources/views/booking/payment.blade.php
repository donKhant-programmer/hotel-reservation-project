@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto py-16 px-6">
    <h2 class="text-2xl font-bold text-center mb-6 text-gray-800">Complete Your Payment</h2>

    <div class="bg-white p-6 rounded shadow space-y-4">
        <p><strong>Booking Ref:</strong> {{ $booking->reference }}</p>
        <p><strong>Guest:</strong> {{ $booking->name }}</p>
        <p><strong>Room:</strong> {{ $booking->room->room_number }} - {{ $booking->room->roomType->name }}</p>
        <p><strong>Check-in:</strong> {{ $booking->check_in }}</p>
        <p><strong>Check-out:</strong> {{ $booking->check_out }}</p>

        @php
            $days = \Carbon\Carbon::parse($booking->check_out)->diffInDays(\Carbon\Carbon::parse($booking->check_in)) ?: 1;
            $totalPrice = $booking->room->roomType->base_price * $days;
        @endphp

        <p><strong>Total:</strong> ${{ number_format($totalPrice, 2) }}</p>

        <form method="POST" action="{{ route('user.booking.pay', $booking->id) }}">
            @csrf

            <div class="mb-4">
                <label class="block mb-1 text-sm font-medium">Select Payment Method</label>
                <select name="payment_method" required class="w-full border rounded p-2">
                    <option value="mock_card">Mock Credit Card</option>
                    <option value="pay_on_arrival">Pay on Arrival</option>
                </select>
            </div>

            <button type="submit" class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700">Pay Now</button>
        </form>
    </div>
</div>
@endsection
