@extends('layouts.app')

@section('title', 'Confirm Your Booking')

@section('content')
<section class="py-16 bg-gray-50">
    <div class="max-w-4xl mx-auto px-6">
        <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Confirm Your Booking</h2>

        <div class="bg-white rounded-xl shadow-lg p-8">
            <form action="{{ route('booking.confirm') }}" method="POST">
                @csrf

                <!-- Booking Summary -->
                <div class="grid md:grid-cols-2 gap-6 mb-8">
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Room</label>
                        <input type="text" readonly class="w-full p-3 border border-gray-200 rounded-lg bg-gray-100" value="{{ $room['name'] ?? 'Standard Room' }}">
                        <input type="hidden" name="room_name" value="{{ $room['name'] ?? 'Standard Room' }}">
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Price Per Night</label>
                        <input type="text" readonly class="w-full p-3 border border-gray-200 rounded-lg bg-gray-100" value="${{ $room['price'] ?? '0.00' }}">
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Check-in</label>
                        <input type="text" readonly class="w-full p-3 border border-gray-200 rounded-lg bg-gray-100" value="{{ $checkIn ?? date('Y-m-d') }}">
                        <input type="hidden" name="check_in" value="{{ $checkIn ?? date('Y-m-d') }}">
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Check-out</label>
                        <input type="text" readonly class="w-full p-3 border border-gray-200 rounded-lg bg-gray-100" value="{{ $checkOut ?? date('Y-m-d', strtotime('+1 day')) }}">
                        <input type="hidden" name="check_out" value="{{ $checkOut ?? date('Y-m-d', strtotime('+1 day')) }}">
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Guests</label>
                        <input type="text" readonly class="w-full p-3 border border-gray-200 rounded-lg bg-gray-100" value="{{ $guests ?? 1 }} Adult(s)">
                        <input type="hidden" name="guests" value="{{ $guests ?? 1 }}">
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">Total Price</label>
                        <input type="text" readonly class="w-full p-3 border border-gray-200 rounded-lg bg-gray-100" value="${{ $totalPrice ?? ($room['price'] ?? 0) }}">
                        <input type="hidden" name="total_price" value="{{ $totalPrice ?? ($room['price'] ?? 0) }}">
                    </div>
                </div>

                <!-- Guest Info -->
                <div class="mb-6">
                    <h3 class="text-xl font-semibold mb-4 text-gray-800">Your Information</h3>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Full Name</label>
                            <input type="text" name="full_name" required class="w-full p-3 border border-gray-200 rounded-lg" placeholder="John Doe">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Email</label>
                            <input type="email" name="email" required class="w-full p-3 border border-gray-200 rounded-lg" placeholder="john@example.com">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Phone</label>
                            <input type="text" name="phone" required class="w-full p-3 border border-gray-200 rounded-lg" placeholder="+1 555 123 4567">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Special Requests (optional)</label>
                            <textarea name="special_requests" class="w-full p-3 border border-gray-200 rounded-lg" rows="3" placeholder="Any preferences or requests?"></textarea>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-8">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-lg transition">
                        Confirm Booking
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
