@extends('layouts.app')

@section('title', $room->name . ' | Paradise Hotel')

@section('content')
<div class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-8 sm:px-10 lg:px-12">
        <!-- Breadcrumb Navigation -->
        <nav class="flex mb-12" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('home') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                        <svg class="w-3 h-3 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                        </svg>
                        Home
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <a href="{{ route('rooms.index') }}" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2">Rooms & Suites</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">{{ $room->name }}</span>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="bg-white overflow-hidden shadow-xl rounded-xl p-6">
            <div class="p-10 md:p-12 lg:p-16">
                <div class="flex flex-col lg:flex-row gap-12 lg:gap-20">
                    <!-- Room Images -->
                    <div class="lg:w-1/2 mr-4">
                        {{-- <div class="relative rounded-xl overflow-hidden shadow-lg">
                            <img src="{{ asset($room->thumbnail) }}" alt="{{ $room->name }}" class="w-full h-96 object-cover">
                            <div class="absolute top-4 left-4 bg-yellow-500 text-white px-3 py-1 rounded-full text-xs font-semibold">
                                {{ $room->type ?? 'Deluxe Room' }}
                            </div>
                        </div> --}}
                        
                        <div class="mt-10 grid grid-cols-3 gap-12">
                            @php
                                $demoImages = [
                                    'https://images.unsplash.com/photo-1590490360182-c33d57733427?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                                    'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                                    'https://images.unsplash.com/photo-1584132905271-512c958d674a?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'
                                ];
                            @endphp
                            
                            @foreach($demoImages as $index => $image)
                                <div class="relative group cursor-pointer">
                                    <div class="aspect-w-4 aspect-h-3 rounded-lg overflow-hidden">
                                        <img src="{{ $image }}" alt="Room photo {{ $index + 1 }}" class="w-full h-full object-cover">
                                    </div>
                                    <div class="absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                        </svg>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    
                    <!-- Room Details -->
                    <div class="lg:w-1/2 lg:ml-8">
                        <div class="flex justify-between items-start mb-10">
                            <div>
                                <h1 class="text-3xl font-bold text-gray-900 font-serif">{{ $room->name }}</h1>
                                <div class="flex items-center mt-2">
                                    @for($i = 0; $i < 5; $i++)
                                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                        </svg>
                                    @endfor
                                    <span class="text-gray-500 ml-2">(24 reviews)</span>
                                </div>
                            </div>
                            <div class="text-right">
                                <span class="text-3xl font-bold text-yellow-600">${{ number_format($room->price_per_night) }}</span>
                                <span class="text-gray-600 block">per night</span>
                            </div>
                        </div>
                        
                        <div class="mb-12">
                            <h2 class="text-xl font-semibold text-gray-900 mb-5">Description</h2>
                            <p class="text-gray-700 leading-relaxed">{{ $room->description }}</p>
                        </div>
                        
                        <div class="mb-12">
                            <h2 class="text-xl font-semibold text-gray-900 mb-5">Room Amenities</h2>
                            <ul class="grid grid-cols-2 gap-8">
                                <li class="flex items-center">
                                    <div class="flex-shrink-0 bg-blue-50 p-2 rounded-lg">
                                        <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                        </svg>
                                    </div>
                                    <span class="ml-3 text-gray-700">{{ $room->max_occupancy ?? 2 }} Guests</span>
                                </li>
                                <li class="flex items-center">
                                    <div class="flex-shrink-0 bg-blue-50 p-2 rounded-lg">
                                        <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"></path>
                                        </svg>
                                    </div>
                                    <span class="ml-3 text-gray-700">{{ $room->size ?? '300' }} sq ft</span>
                                </li>
                                <li class="flex items-center">
                                    <div class="flex-shrink-0 bg-blue-50 p-2 rounded-lg">
                                        <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                        </svg>
                                    </div>
                                    <span class="ml-3 text-gray-700">{{ $room->bed_type ?? 'King Bed' }}</span>
                                </li>
                                <li class="flex items-center">
                                    <div class="flex-shrink-0 bg-blue-50 p-2 rounded-lg">
                                        <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"></path>
                                        </svg>
                                    </div>
                                    <span class="ml-3 text-gray-700">Free WiFi</span>
                                </li>
                                <li class="flex items-center">
                                    <div class="flex-shrink-0 bg-blue-50 p-2 rounded-lg">
                                        <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"></path>
                                        </svg>
                                    </div>
                                    <span class="ml-3 text-gray-700">Air Conditioning</span>
                                </li>
                                <li class="flex items-center">
                                    <div class="flex-shrink-0 bg-blue-50 p-2 rounded-lg">
                                        <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"></path>
                                        </svg>
                                    </div>
                                    <span class="ml-3 text-gray-700">Smart TV</span>
                                </li>
                            </ul>
                        </div>
                        
                        <div class="bg-blue-50 rounded-xl p-6 mb-8">
                            <h3 class="text-lg font-semibold text-gray-900 mb-3">Special Offer</h3>
                            <p class="text-gray-700 mb-4">Book directly with us and receive a complimentary breakfast for two during your stay.</p>
                            <div class="flex items-center text-sm text-blue-600">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Offer valid until {{ now()->addDays(30)->format('F j, Y') }}
                            </div>
                        </div>
                        
                        <div class="flex flex-col sm:flex-row gap-4">
                            <a href="{{ route('booking.create', $room->id) }}" class="flex-1 bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-4 px-6 rounded-lg text-center transition duration-300 shadow-md hover:shadow-lg">
                                Book Now
                            </a>
                            <button class="flex-1 bg-white border border-gray-300 hover:bg-gray-50 text-gray-800 font-bold py-4 px-6 rounded-lg transition duration-300 flex items-center justify-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                </svg>
                                Save
                            </button>
                        </div>
                    </div>
                </div>
                
                
                <!-- Room Policies -->
                <div class="mt-24 border-t border-gray-200 pt-20">
                    <h2 class="text-2xl font-bold text-gray-900 mb-12 font-serif">Room Policies</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                        <div class="bg-gray-50 p-8 rounded-xl">
                            <div class="flex items-center mb-3">
                                <div class="bg-blue-100 p-2 rounded-lg mr-4">
                                    <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <h3 class="text-lg font-semibold text-gray-900">Check-in/Check-out</h3>
                            </div>
                            <ul class="space-y-2 text-gray-700">
                                <li class="flex items-start">
                                    <svg class="h-5 w-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Check-in: 3:00 PM - 11:00 PM</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="h-5 w-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Check-out: 11:00 AM</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="h-5 w-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Early check-in and late check-out available upon request</span>
                                </li>
                            </ul>
                        </div>
                        
                        <div class="bg-gray-50 p-6 rounded-xl">
                            <div class="flex items-center mb-3">
                                <div class="bg-blue-100 p-2 rounded-lg mr-4">
                                    <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <h3 class="text-lg font-semibold text-gray-900">Cancellation Policy</h3>
                            </div>
                            <ul class="space-y-2 text-gray-700">
                                <li class="flex items-start">
                                    <svg class="h-5 w-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Free cancellation up to 48 hours before check-in</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="h-5 w-5 text-yellow-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                    </svg>
                                    <span>50% charge for cancellations within 48 hours</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="h-5 w-5 text-red-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    <span>No refund for no-shows or early departures</span>
                                </li>
                            </ul>
                        </div>
                        
                        <div class="bg-gray-50 p-6 rounded-xl">
                            <div class="flex items-center mb-3">
                                <div class="bg-blue-100 p-2 rounded-lg mr-4">
                                    <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                    </svg>
                                </div>
                                <h3 class="text-lg font-semibold text-gray-900">House Rules</h3>
                            </div>
                            <ul class="space-y-2 text-gray-700">
                                <li class="flex items-start">
                                    <svg class="h-5 w-5 text-red-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M5.636 5.636l3.536 3.536m0 5.656l-3.536 3.536"></path>
                                    </svg>
                                    <span>No smoking in rooms (designated areas available)</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="h-5 w-5 text-red-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M5.636 5.636l3.536 3.536m0 5.656l-3.536 3.536"></path>
                                    </svg>
                                    <span>No pets allowed (service animals exempt)</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="h-5 w-5 text-green-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Quiet hours from 10:00 PM to 7:00 AM</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection