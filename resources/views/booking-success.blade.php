@extends('layouts.app')

@section('title', 'Booking Successful')

@section('content')
<div class="py-20 text-center">
    <h2 class="text-3xl font-bold text-green-600 mb-4">Booking Confirmed!</h2>
    <p class="text-lg text-gray-700">Thank you, {{ $name }}. Your stay from <strong>{{ $checkIn }}</strong> to <strong>{{ $checkOut }}</strong> has been successfully booked.</p>
</div>
@endsection
