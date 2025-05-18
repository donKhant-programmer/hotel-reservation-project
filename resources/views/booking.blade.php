@extends('layouts.app')

@section('title', 'Book Your Stay - Paradise Hotel')

@section('styles')
<style>
    .booking-form {
        background: rgba(255, 255, 255, 0.95);
        border-radius: 1rem;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }
    .room-card {
        transition: all 0.3s ease;
    }
    .room-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
    }
</style>
@endsection

@section('content')
<div class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">Book Your Stay</h1>
            <div class="w-20 h-1 bg-yellow-500 mx-auto mb-4"></div>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">Complete your reservation at Paradise Hotel</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Booking Form -->
            <div class="lg:col-span-2">
                <div class="booking-form p-8">
                    <h2 class="text-2xl font-bold mb-6">Reservation Details</h2>
                    
                    <form action="{{ route('booking.store') }}" method="POST">
                        @csrf
                        
                        <!-- Room Selection -->
                        <div class="mb-8">
                            <h3 class="text-lg font-semibold mb-4">Select Your Room</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                @foreach($roomTypes as $room)
                                <div class="room-card bg-white p-4 rounded-lg border border-gray-200 cursor-pointer">
                                    <input type="radio" id="room-{{ $room['id'] }}" name="room_type" value="{{ $room['id'] }}" 
                                           class="hidden peer" {{ $loop->first ? 'checked' : '' }}>
                                    <label for="room-{{ $room['id'] }}" class="block peer-checked:border-blue-500 peer-checked:bg-blue-50">
                                        <div class="flex justify-between items-start mb-2">
                                            <h4 class="font-bold">{{ $room['name'] }}</h4>
                                            <span class="text-yellow-600 font-bold">${{ $room['price'] }}/night</span>
                                        </div>
                                        <p class="text-sm text-gray-600 mb-2">Spacious room with premium amenities</p>
                                        <ul class="text-xs text-gray-500 space-y-1">
                                            <li class="flex items-center"><i class="fas fa-wifi mr-2"></i> Free WiFi</li>
                                            <li class="flex items-center"><i class="fas fa-coffee mr-2"></i> Breakfast included</li>
                                            <li class="flex items-center"><i class="fas fa-tv mr-2"></i> Smart TV</li>
                                        </ul>
                                    </label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        
                        <!-- Dates and Guests -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                            <div>
                                <label class="block text-gray-700 font-medium mb-2">Check-in Date</label>
                                <input type="date" name="check_in" value="{{ $checkIn ?? request()->input('check_in', date('Y-m-d')) }}" 
                                       class="w-full p-3 border border-gray-300 rounded-lg" required>
                            </div>
                            <div>
                                <label class="block text-gray-700 font-medium mb-2">Check-out Date</label>
                                <input type="date" name="check_out" value="{{ $checkOut ?? request()->input('check_out', date('Y-m-d', strtotime('+1 day'))) }}" 
                                       class="w-full p-3 border border-gray-300 rounded-lg" required>
                            </div>
                            <div>
                                <label class="block text-gray-700 font-medium mb-2">Guests</label>
                                <select name="guests" class="w-full p-3 border border-gray-300 rounded-lg">
                                    @for($i = 1; $i <= 4; $i++)
                                        <option value="{{ $i }}" {{ ($guests ?? 2) == $i ? 'selected' : '' }}>{{ $i }} {{ $i == 1 ? 'Adult' : 'Adults' }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        
                        <!-- Personal Information -->
                        <div class="mb-8">
                            <h3 class="text-lg font-semibold mb-4">Personal Information</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-gray-700 font-medium mb-2">Full Name</label>
                                    <input type="text" name="name" class="w-full p-3 border border-gray-300 rounded-lg" required>
                                </div>
                                <div>
                                    <label class="block text-gray-700 font-medium mb-2">Email</label>
                                    <input type="email" name="email" class="w-full p-3 border border-gray-300 rounded-lg" required>
                                </div>
                                <div>
                                    <label class="block text-gray-700 font-medium mb-2">Phone Number</label>
                                    <input type="tel" name="phone" class="w-full p-3 border border-gray-300 rounded-lg" required>
                                </div>
                                <div>
                                    <label class="block text-gray-700 font-medium mb-2">Special Requests</label>
                                    <input type="text" name="requests" class="w-full p-3 border border-gray-300 rounded-lg">
                                </div>
                            </div>
                        </div>
                        
                        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-6 rounded-lg transition">
                            Complete Booking
                        </button>
                    </form>
                </div>
            </div>
            
            <!-- Booking Summary -->
            <div class="bg-white p-6 rounded-lg shadow-md h-fit sticky top-6">
                <h3 class="text-xl font-bold mb-4">Your Stay</h3>
                <div class="space-y-4">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Check-in</span>
                        <span class="font-medium">{{ $checkIn ?? request()->input('check_in', date('Y-m-d')) }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Check-out</span>
                        <span class="font-medium">{{ $checkOut ?? request()->input('check_out', date('Y-m-d', strtotime('+1 day'))) }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Guests</span>
                        <span class="font-medium">{{ $guests ?? 2 }} {{ ($guests ?? 2) == 1 ? 'Adult' : 'Adults' }}</span>
                    </div>
                    <div class="border-t border-gray-200 my-4"></div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Room Type</span>
                        <span class="font-medium">Deluxe Room</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Price per night</span>
                        <span class="font-medium">$199</span>
                    </div>
                    <div class="border-t border-gray-200 my-4"></div>
                    <div class="flex justify-between text-lg font-bold">
                        <span>Estimated Total</span>
                        <span>$1,393</span>
                    </div>
                </div>
                
                <div class="mt-6 bg-blue-50 p-4 rounded-lg">
                    <h4 class="font-semibold mb-2">Cancellation Policy</h4>
                    <p class="text-sm text-gray-600">Free cancellation up to 48 hours before check-in. No refund for late cancellations.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection