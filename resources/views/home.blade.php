@extends('layouts.app')

@section('title', 'Welcome to Paradise Hotel | Luxury Accommodations')

@section('content')
<!-- Hero Section with Full-Screen Image -->
<section class="relative h-screen flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80')"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/40 to-black/20"></div>
    
    <div class="relative z-10 text-center px-6 max-w-6xl mx-auto">
        <h1 class="text-4xl sm:text-5xl md:text-6xl font-bold text-white mb-6 leading-tight tracking-tight">
            Luxury Redefined at <span class="text-yellow-400">Paradise Hotel</span>
        </h1>
        <p class="text-lg md:text-xl text-gray-200 mb-10 max-w-3xl mx-auto">
            Experience unparalleled comfort and impeccable service in the heart of the city
        </p>
        
        <div class="flex flex-col sm:flex-row justify-center gap-4 mb-16">
            <a href="{{ route('rooms.index') }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-3 px-8 rounded-lg text-lg transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-yellow-500/30">
                Book Your Stay
            </a>
            <a href="#featured-rooms" class="bg-transparent border-2 border-white hover:bg-white hover:text-gray-900 text-white font-bold py-3 px-8 rounded-lg text-lg transition-all duration-300 shadow-lg hover:shadow-white/20">
                Explore Rooms
            </a>
        </div>
        
        <div class="hidden md:flex justify-center space-x-12 text-center">
            <div class="text-center">
                <div class="text-4xl font-bold text-white">100+</div>
                <div class="text-sm text-gray-300 mt-1 uppercase tracking-wider">Luxury Rooms</div>
            </div>
            <div class="text-center">
                <div class="text-4xl font-bold text-white">24/7</div>
                <div class="text-sm text-gray-300 mt-1 uppercase tracking-wider">Concierge</div>
            </div>
            <div class="text-center">
                <div class="text-4xl font-bold text-white">5★</div>
                <div class="text-sm text-gray-300 mt-1 uppercase tracking-wider">Rating</div>
            </div>
        </div>
    </div>
    
    <!-- Scroll Down Indicator -->
    <a href="#booking-section" class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce z-10">
        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
        </svg>
    </a>
</section>

<!-- Booking Form Section -->
<section id="booking-section" class="py-16 bg-white relative z-20">
    <div class="max-w-7xl mx-auto px-6">
        <div class="bg-white rounded-xl shadow-xl p-8 -mt-24 relative z-20 border border-gray-100">
            <h2 class="text-3xl font-bold mb-8 text-center text-gray-800 font-serif">Find Your Perfect Stay</h2>
            <form action="{{ route('rooms.index') }}" method="GET" class="max-w-6xl mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                    <div>
                        <label class="block text-gray-700 font-medium mb-2 text-sm uppercase tracking-wider">Check-in</label>
                        <div class="relative">
                            <input type="date" name="check_in" class="w-full p-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent shadow-sm">
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-2 text-sm uppercase tracking-wider">Check-out</label>
                        <div class="relative">
                            <input type="date" name="check_out" class="w-full p-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent shadow-sm">
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-2 text-sm uppercase tracking-wider">Guests</label>
                        <select name="guests" class="w-full p-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent shadow-sm appearance-none bg-white">
                            <option value="1">1 Adult</option>
                            <option value="2">2 Adults</option>
                            <option value="3">3 Adults</option>
                            <option value="4">4 Adults</option>
                            <option value="family">Family Suite</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>
                    </div>
                    <div class="flex items-end">
                        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold p-3 rounded-lg transition duration-300 shadow-md hover:shadow-lg flex items-center justify-center space-x-2">
                            <span>Check Availability</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- Featured Rooms Section -->
<section id="featured-rooms" class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <span class="text-sm uppercase tracking-wider text-yellow-600 font-semibold">Accommodations</span>
            <h2 class="text-4xl font-bold text-gray-900 mt-2 mb-4 font-serif">Our Featured Rooms</h2>
            <div class="w-20 h-1 bg-yellow-500 mx-auto mb-6"></div>
            <p class="text-gray-600 max-w-3xl mx-auto text-lg leading-relaxed">
                Experience luxury and comfort in our carefully designed rooms, each offering a unique atmosphere and premium amenities.
            </p>
        </div>
        
        <div class="grid md:grid-cols-3 gap-8">
            @foreach ($featuredRooms as $room)
                @include('components.room-card', ['room' => $room])
            @endforeach
        </div>
        
        <div class="text-center mt-16">
            <a href="{{ route('rooms.index') }}" class="inline-block bg-gray-900 hover:bg-black text-white font-bold py-3 px-8 rounded-lg transition duration-300 shadow-md hover:shadow-lg uppercase tracking-wider text-sm">
                View All Accommodations
            </a>
        </div>
    </div>
</section>

<!-- Amenities Section -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <span class="text-sm uppercase tracking-wider text-yellow-600 font-semibold">Facilities</span>
            <h2 class="text-4xl font-bold text-gray-900 mt-2 mb-4 font-serif">Hotel Amenities</h2>
            <div class="w-20 h-1 bg-yellow-500 mx-auto mb-6"></div>
            <p class="text-gray-600 max-w-3xl mx-auto text-lg leading-relaxed">
                Enjoy our premium facilities designed to make your stay memorable and comfortable.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="bg-white p-8 rounded-xl text-center border border-gray-100 shadow-sm hover:shadow-md transition duration-300 hover:-translate-y-1">
                <div class="text-blue-500 mb-6 text-5xl">🛏️</div>
                <h3 class="text-xl font-bold mb-3 text-gray-800">Premium Sleep</h3>
                <p class="text-gray-600 text-sm leading-relaxed">
                    Handcrafted mattresses with 500-thread-count linens for ultimate comfort.
                </p>
            </div>
            <div class="bg-white p-8 rounded-xl text-center border border-gray-100 shadow-sm hover:shadow-md transition duration-300 hover:-translate-y-1">
                <div class="text-blue-500 mb-6 text-5xl">📶</div>
                <h3 class="text-xl font-bold mb-3 text-gray-800">High-Speed WiFi</h3>
                <p class="text-gray-600 text-sm leading-relaxed">
                    Complimentary fiber-optic internet throughout the property.
                </p>
            </div>
            <div class="bg-white p-8 rounded-xl text-center border border-gray-100 shadow-sm hover:shadow-md transition duration-300 hover:-translate-y-1">
                <div class="text-blue-500 mb-6 text-5xl">🏊</div>
                <h3 class="text-xl font-bold mb-3 text-gray-800">Infinity Pool</h3>
                <p class="text-gray-600 text-sm leading-relaxed">
                    Heated rooftop pool with panoramic city views and poolside service.
                </p>
            </div>
            <div class="bg-white p-8 rounded-xl text-center border border-gray-100 shadow-sm hover:shadow-md transition duration-300 hover:-translate-y-1">
                <div class="text-blue-500 mb-6 text-5xl">🍽️</div>
                <h3 class="text-xl font-bold mb-3 text-gray-800">Gourmet Dining</h3>
                <p class="text-gray-600 text-sm leading-relaxed">
                    Award-winning restaurants featuring local and international cuisine.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-24 bg-gray-100">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <span class="text-sm uppercase tracking-wider text-yellow-600 font-semibold">Testimonials</span>
            <h2 class="text-4xl font-bold text-gray-900 mt-2 mb-4 font-serif">Guest Experiences</h2>
            <div class="w-20 h-1 bg-yellow-500 mx-auto mb-6"></div>
            <p class="text-gray-600 max-w-3xl mx-auto text-lg leading-relaxed">
                Hear from our valued guests about their experiences at Paradise Hotel.
            </p>
        </div>
        
        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-xl shadow-md">
                <div class="flex mb-4">
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                </div>
                <p class="text-gray-700 mb-6 italic leading-relaxed">
                    "The attention to detail at Paradise Hotel is unmatched. From the luxurious bedding to the exceptional service, every moment was perfect."
                </p>
                <div class="flex items-center">
                    <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Sarah Johnson" class="w-12 h-12 rounded-full mr-4 object-cover border-2 border-yellow-400">
                    <div>
                        <div class="font-bold text-gray-900">Sarah Johnson</div>
                        <div class="text-gray-500 text-sm">New York, USA</div>
                    </div>
                </div>
            </div>
            
            <!-- Repeat for other testimonials -->
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="relative py-32 bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80')">
    <div class="absolute inset-0 bg-blue-900/90"></div>
    <div class="relative z-10 max-w-4xl mx-auto px-6 text-center text-white">
        <span class="text-sm uppercase tracking-wider text-yellow-400 font-semibold">Special Offer</span>
        <h2 class="text-4xl md:text-5xl font-bold mt-4 mb-6 leading-tight font-serif">
            Book Your Luxury Getaway Today
        </h2>
        <p class="text-xl mb-10 max-w-2xl mx-auto leading-relaxed">
            Enjoy 15% off your stay when you book directly through our website. Limited time offer.
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-6">
            <a href="{{ route('rooms.index') }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-4 px-10 rounded-lg text-lg transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-yellow-500/30 uppercase tracking-wider">
                Book Now
            </a>
            <a href="tel:+18005551234" class="bg-transparent border-2 border-white hover:bg-white hover:text-blue-900 text-white font-bold py-4 px-10 rounded-lg text-lg transition-all duration-300 shadow-lg hover:shadow-white/20 uppercase tracking-wider flex items-center justify-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                </svg>
                Call Us
            </a>
        </div>
    </div>
</section>
@endsection