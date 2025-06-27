@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 px-4">
    <div class="max-w-md w-full bg-white rounded-lg shadow-lg p-8">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">Create an Account</h2>

        {{-- Error Message --}}
        @if($errors->any())
            <div class="bg-red-100 text-red-700 text-sm p-3 rounded mb-4">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('register.post') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                <input type="text" name="name" id="name" required
                       class="w-full border border-gray-300 px-4 py-2 rounded-lg focus:ring focus:ring-blue-200 focus:outline-none mb-3">
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" name="email" id="email" required
                       class="w-full border border-gray-300 px-4 py-2 rounded-lg focus:ring focus:ring-blue-200 focus:outline-none mb-3">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input type="password" name="password" id="password" required
                       class="w-full border border-gray-300 px-4 py-2 rounded-lg focus:ring focus:ring-blue-200 focus:outline-none mb-3">
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required
                       class="w-full border border-gray-300 px-4 py-2 rounded-lg focus:ring focus:ring-blue-200 focus:outline-none mb-3">
            </div>

            <button type="submit"
                    class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition font-semibold mt-3">
                Register
            </button>
        </form>

        <p class="mt-6 text-center text-sm text-gray-600">
            Already have an account?
            <a href="{{ route('login') }}" class="text-blue-600 hover:underline font-medium">Login</a>
        </p>
    </div>
</div>
@endsection
