@extends('layouts.app')

@section('title', 'Paradise Hotel - Luxury Accommodations')

@section('styles')
<style>
    .hero-bg {
        background-image: url('https://images.unsplash.com/photo-1566073771259-6a8506099945');
        background-size: cover;
        background-position: center;
    }
    .feature-card:hover {
        transform: translateY(-5px);
        transition: all 0.3s ease;
    }
    .divider {
        width: 80px;
        height: 3px;
        background-color: #f59e0b;
        margin: 0 auto 1.5rem auto;
    }
</style>
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="hero-bg h-screen flex items-center justify-center relative">
        <div class="absolute inset-0 bg-black opacity-40"></div>
        <div class="relative z-10 text-center px-6 max-w-4xl mx-auto text-white">
            <h1 class="text-4xl md:text-6xl font-bold mb-6">Luxury Redefined at Paradise Hotel</h1>
            <p class="text-xl mb-10">Experience unparalleled comfort and impeccable service in the heart of the city</p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ route('booking.search') }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-3 px-8 rounded-lg text-lg transition-all">Book Now</a>
                <a href="#featured-rooms" class="bg-transparent border-2 border-white hover:bg-white hover:text-gray-900 text-white font-bold py-3 px-8 rounded-lg text-lg transition-all">Explore Rooms</a>
            </div>
        </div>
    </section>

    <!-- Booking Widget -->
    <section class="bg-white py-12 -mt-20 relative z-20">
        <div class="max-w-6xl mx-auto px-6">
            <div class="bg-white rounded-xl shadow-xl p-8 border border-gray-100">
                <h2 class="text-3xl font-bold mb-8 text-center text-gray-800">Find Your Perfect Stay</h2>
                <form class="max-w-6xl mx-auto" action="{{ route('booking') }}" method="get">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Check-in</label>
                            <input type="date" name="check_in" class="w-full p-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Check-out</label>
                            <input type="date" name="check_out" class="w-full p-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Guests</label>
                            <select name="guests" class="w-full p-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                                <option value="1">1 Adult</option>
                                <option value="2">2 Adults</option>
                                <option value="3">3 Adults</option>
                                <option value="4">4 Adults</option>
                            </select>
                        </div>
                        <div class="flex items-end">
                            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold p-3 rounded-lg transition">Check Availability</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Featured Rooms -->
    <section id="featured-rooms" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold mb-4 text-gray-800">Our Featured Rooms</h2>
                <div class="divider"></div>
                <p class="text-gray-600 max-w-3xl mx-auto text-lg">Experience luxury and comfort in our carefully designed rooms</p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Room 1 -->
                <div class="bg-white rounded-xl overflow-hidden shadow-md feature-card">
                    <img src="https://images.unsplash.com/photo-1631049307264-da0ec9d70304" alt="Deluxe Room" class="w-full h-64 object-cover">
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="text-xl font-bold">Deluxe Room</h3>
                            <span class="text-yellow-600 font-bold">$199/night</span>
                        </div>
                        <p class="text-gray-600 mb-4">Spacious room with king bed and city view</p>
                        <div class="flex justify-between text-sm text-gray-500 mb-4">
                            <span><i class="fas fa-user mr-1"></i> 2 Adults</span>
                            <span><i class="fas fa-ruler-combined mr-1"></i> 350 sq ft</span>
                        </div>
                        <a href="{{ route('rooms') }}#deluxe" class="block text-center bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition">View Details</a>
                    </div>
                </div>
                
                <!-- Room 2 -->
                <div class="bg-white rounded-xl overflow-hidden shadow-md feature-card">
                    <img src="https://images.unsplash.com/photo-1631049307264-da0ec9d70304" alt="Executive Suite" class="w-full h-64 object-cover">
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="text-xl font-bold">Executive Suite</h3>
                            <span class="text-yellow-600 font-bold">$299/night</span>
                        </div>
                        <p class="text-gray-600 mb-4">Luxurious suite with separate living area</p>
                        <div class="flex justify-between text-sm text-gray-500 mb-4">
                            <span><i class="fas fa-user mr-1"></i> 2 Adults</span>
                            <span><i class="fas fa-ruler-combined mr-1"></i> 550 sq ft</span>
                        </div>
                        <a href="{{ route('rooms') }}#executive" class="block text-center bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition">View Details</a>
                    </div>
                </div>
                
                <!-- Room 3 -->
                <div class="bg-white rounded-xl overflow-hidden shadow-md feature-card">
                    <img src="https://images.unsplash.com/photo-1596178065887-1198b6148b2b" alt="Presidential Suite" class="w-full h-64 object-cover">
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="text-xl font-bold">Presidential Suite</h3>
                            <span class="text-yellow-600 font-bold">$499/night</span>
                        </div>
                        <p class="text-gray-600 mb-4">Ultimate luxury with panoramic city views</p>
                        <div class="flex justify-between text-sm text-gray-500 mb-4">
                            <span><i class="fas fa-user mr-1"></i> 4 Adults</span>
                            <span><i class="fas fa-ruler-combined mr-1"></i> 1200 sq ft</span>
                        </div>
                        <a href="{{ route('rooms') }}#presidential" class="block text-center bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition">View Details</a>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-16">
                <a href="{{ route('rooms') }}" class="inline-block bg-gray-900 hover:bg-black text-white font-bold py-3 px-8 rounded-lg transition uppercase tracking-wider text-sm">View All Rooms</a>
            </div>
        </div>
    </section>

    <!-- Amenities Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold mb-4 text-gray-800">Hotel Amenities</h2>
                <div class="divider"></div>
                <p class="text-gray-600 max-w-3xl mx-auto text-lg">Enjoy our world-class facilities and services</p>
            </div>
            
            <div class="grid md:grid-cols-4 gap-8">
                <div class="text-center p-6">
                    <div class="bg-blue-100 w-20 h-20 mx-auto rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-swimming-pool text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Infinity Pool</h3>
                    <p class="text-gray-600">Stunning rooftop pool with panoramic city views</p>
                </div>
                
                <div class="text-center p-6">
                    <div class="bg-blue-100 w-20 h-20 mx-auto rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-utensils text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Fine Dining</h3>
                    <p class="text-gray-600">Award-winning restaurants with diverse cuisines</p>
                </div>
                
                <div class="text-center p-6">
                    <div class="bg-blue-100 w-20 h-20 mx-auto rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-spa text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Luxury Spa</h3>
                    <p class="text-gray-600">Rejuvenating treatments and wellness therapies</p>
                </div>
                
                <div class="text-center p-6">
                    <div class="bg-blue-100 w-20 h-20 mx-auto rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-dumbbell text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Fitness Center</h3>
                    <p class="text-gray-600">State-of-the-art equipment with personal trainers</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold mb-4 text-gray-800">Guest Reviews</h2>
                <div class="divider"></div>
                <p class="text-gray-600 max-w-3xl mx-auto text-lg">What our guests say about their experience</p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-lg shadow-md">
                    <div class="flex items-center mb-4">
                        <div class="text-yellow-400 mr-2">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-6">"The Presidential Suite was absolutely breathtaking. The service was impeccable and the views were stunning. Will definitely return!"</p>
                    <div class="flex items-center">
                        <img src="https://randomuser.me/api/portraits/women/43.jpg" alt="Sarah Johnson" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-bold">Sarah Johnson</h4>
                            <p class="text-gray-500 text-sm">New York, USA</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white p-8 rounded-lg shadow-md">
                    <div class="flex items-center mb-4">
                        <div class="text-yellow-400 mr-2">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-6">"The infinity pool at sunset is something we'll never forget. The entire staff went above and beyond to make our anniversary special."</p>
                    <div class="flex items-center">
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Michael Chen" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-bold">Michael Chen</h4>
                            <p class="text-gray-500 text-sm">Toronto, Canada</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white p-8 rounded-lg shadow-md">
                    <div class="flex items-center mb-4">
                        <div class="text-yellow-400 mr-2">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-6">"The Deluxe Room was spacious and beautifully appointed. The bed was incredibly comfortable. Perfect location for exploring the city."</p>
                    <div class="flex items-center">
                        <img src="https://randomuser.me/api/portraits/women/65.jpg" alt="Emma Rodriguez" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-bold">Emma Rodriguez</h4>
                            <p class="text-gray-500 text-sm">Madrid, Spain</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection