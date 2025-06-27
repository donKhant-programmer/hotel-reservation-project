@extends('layouts.app')

@section('title', 'My Profile - WYNDHAM Hotel')

@section('content')
<div class="py-12 bg-white">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold mb-8">My Profile</h2>
        
        <div class="bg-gray-50 p-8 rounded-lg shadow-md">
            <div class="mb-6">
                <label class="block text-gray-700 mb-2">Name</label>
                <p class="bg-white p-3 rounded border">{{ $user->name }}</p>
            </div>
            
            <div class="mb-6">
                <label class="block text-gray-700 mb-2">Email</label>
                <p class="bg-white p-3 rounded border">{{ $user->email }}</p>
            </div>
            
            <div class="flex justify-end">
                <a href="#" class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700">
                    Edit Profile
                </a>
            </div>
        </div>
    </div>
</div>
@endsection