@extends('layouts.admin')

@section('content')
<h2>All Bookings</h2>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Room</th>
            <th>User</th>
            <th>Date</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
    @foreach($bookings as $booking)
        <tr>
            <td>{{ $booking->room->name ?? 'N/A' }}</td>
            <td>{{ $booking->user->name ?? 'N/A' }}</td>
            <td>{{ $booking->booking_date ?? 'N/A' }}</td>
            <td>{{ $booking->status ?? 'Confirmed' }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
