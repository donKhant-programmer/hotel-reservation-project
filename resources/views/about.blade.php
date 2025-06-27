@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-6 py-12">
    {{-- Hero Banner --}}
    <div class="relative bg-cover bg-center rounded-lg shadow-lg h-64 mb-12" style="background-image: url('/images/hotel-banner.jpg');">
        <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center rounded-lg">
            <h1 class="text-white text-4xl font-bold drop-shadow-lg">Welcome to WYNDHAM Hotel</h1>
        </div>
    </div>

    <div class="bg-white shadow-md rounded-lg p-8">
        <h2 class="text-3xl font-bold text-gray-800 mb-6">About Us</h2>

        <p class="text-gray-700 leading-relaxed mb-6">
            At <strong>WYNDHAM Hotel</strong>, we pride ourselves on offering world-class hospitality with a personal touch.
            Located in the heart of the city, our hotel is your sanctuary of comfort, elegance, and convenience — whether you're traveling for business or leisure.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mb-10">
            <div>
                <h3 class="text-xl font-semibold text-gray-800 mb-3">Our Story</h3>
                <p class="text-gray-700 leading-relaxed">
                    Founded in 2005, WYNDHAM Hotel has grown into one of the city's most cherished destinations for visitors.
                    With a passion for excellence and a dedication to service, our staff goes above and beyond to make your stay unforgettable.
                </p>
            </div>

            <div>
                <h3 class="text-xl font-semibold text-gray-800 mb-3">What We Offer</h3>
                <ul class="list-disc list-inside text-gray-700 space-y-1">
                    <li>Elegant and spacious rooms with modern amenities</li>
                    <li>Complimentary high-speed Wi-Fi</li>
                    <li>Daily breakfast and in-house restaurant</li>
                    <li>24/7 front desk and concierge services</li>
                    <li>Easy access to tourist attractions and public transport</li>
                </ul>
            </div>
        </div>

        {{-- Why Choose Us --}}
        <div class="mb-10">
            <h3 class="text-xl font-semibold text-gray-800 mb-3">Why Choose WYNDHAM Hotel?</h3>
            <p class="text-gray-700 leading-relaxed">
                Because we don’t just offer a place to stay — we offer an experience. Our personalized service,
                attention to detail, and tranquil atmosphere make us the top choice for discerning guests from all over the world.
            </p>
        </div>

        {{-- Contact Info --}}
        <div class="border-t pt-6">
            <h3 class="text-xl font-semibold text-gray-800 mb-3">Get in Touch</h3>
            <p class="text-gray-700 leading-relaxed">
                📍 <span>123 Paradise Street, Cityville</span><br>
                📞 <a href="tel:+1234567890" class="text-blue-600 hover:underline">+1 234 567 890</a><br>
                ✉️ <a href="mailto:contact@wyndhamhotel.com" class="text-blue-600 hover:underline">contact@wyndhamhotel.com</a>
            </p>
        </div>
    </div>
</div>
@endsection
