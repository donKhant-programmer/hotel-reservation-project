@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-12 px-6">
    <h2 class="text-3xl font-bold text-gray-800 mb-8">My Profile</h2>

    @if(session('success'))
        <div class="mb-6 p-4 bg-green-100 text-green-700 border border-green-300 rounded">
            {{ session('success') }}
        </div>
    @endif

    {{-- Profile Update Form --}}
    <div class="bg-white shadow rounded-lg p-6 mb-12">
        <h3 class="text-xl font-semibold mb-4 text-gray-700">Update Your Information</h3>

        <form method="POST" action="{{ route('user.updateProfile') }}" class="space-y-6">
            @csrf

            <div>
                <label class="block text-gray-700 font-medium mb-1">Name</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}"
                       class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}"
                       class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <button type="submit"
                        class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition-all">
                    Update Profile
                </button>
            </div>
        </form>
    </div>

    {{-- Booking History --}}
    <div class="bg-white shadow rounded-lg p-6">
        <h3 class="text-xl font-semibold mb-4 text-gray-700">My Bookings</h3>

        @if($bookings->isEmpty())
            <p class="text-gray-500">You have no bookings yet.</p>
        @else
            <div class="space-y-4">
                @foreach($bookings as $booking)
                    <div class="border border-gray-200 p-4 rounded-lg shadow-sm hover:shadow-md transition">
                        <h4 class="text-lg font-semibold text-gray-800">{{ $booking->room->name }}</h4>
                        <p class="text-sm text-gray-600">📅 <strong>Check-in:</strong> {{ $booking->check_in }} | <strong>Check-out:</strong> {{ $booking->check_out }}</p>
                        <p class="text-sm text-gray-600 mt-1">
                            🛈 <strong>Status:</strong>
                            <span class="inline-block px-2 py-1 bg-blue-100 text-blue-600 rounded text-xs">
                                {{ ucfirst($booking->status ?? 'confirmed') }}
                            </span>
                        </p>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
@endsection
