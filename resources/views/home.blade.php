@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h1 class="text-2xl font-bold mb-6">Welcome to Our Hotel</h1>
                
                <h2 class="text-xl font-semibold mb-4">Featured Rooms</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($featuredRooms as $room)
                        @include('layouts.components.room-card', ['room' => $room])
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection