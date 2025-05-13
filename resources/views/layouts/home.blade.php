@extends('layouts.app')

@section('title', 'Welcome to Paradise Hotel')

@section('content')
<!-- Hero Section -->
<section class="bg-cover bg-center h-[500px]" style="background-image: url('/images/hotel-banner.jpg')">
    <div class="bg-black bg-opacity-50 h-full flex items-center justify-center text-white text-center">
        <div>
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Welcome to Paradise Hotel</h1>
            <p class="text-lg md:text-xl mb-6">Experience comfort and luxury like never before</p>

            <form action="{{ route('rooms.index') }}" method="GET" class="flex justify-center">
                <input type="text" name="search" placeholder="Search rooms..." class="p-3 rounded-l-lg w-64">
                <button class="bg-yellow-500 px-5 rounded-r-lg text-white hover:bg-yellow-600">Search</button>
            </form>
        </div>
    </div>
</section>

<!-- Featured Rooms -->
<section class="py-16 bg-white">
    <div class="max-w-6xl mx-auto px-4">
        <h2 class="text-3xl font-semibold mb-8 text-center">Featured Rooms</h2>
        <div class="grid md:grid-cols-3 gap-8">
            @foreach ($featuredRooms as $room)
                @include('components.room-card', ['room' => $room])
            @endforeach
        </div>
    </div>
</section>

<!-- Amenities -->
<section class="py-16 bg-gray-100">
    <div class="max-w-6xl mx-auto px-4 text-center">
        <h2 class="text-3xl font-semibold mb-6">Hotel Highlights</h2>
        <p class="mb-6">Enjoy top-notch facilities during your stay.</p>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <div>🛏️ Comfortable Beds</div>
            <div>📶 Free Wi-Fi</div>
            <div>🏊 Swimming Pool</div>
            <div>🍽️ Restaurant & Room Service</div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="bg-yellow-500 text-white py-16 text-center">
    <h2 class="text-3xl font-bold mb-4">Ready to Book Your Stay?</h2>
    <a href="{{ route('rooms.index') }}" class="bg-white text-yellow-600 px-6 py-3 rounded font-semibold hover:bg-gray-100">
        Browse Rooms
    </a>
</section>
@endsection
