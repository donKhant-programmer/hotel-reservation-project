@extends('layouts.admin')

@section('content')
<h2 class="text-2xl font-semibold mb-6">All Bookings</h2>

@if(session('success'))
    <div class="alert alert-success my-3">
        {{ session('success') }}
    </div>
@endif

<table class="table table-bordered table-striped table-hover">
    <thead class="bg-gray-100">
        <tr>
            <th>#</th>
            <th>Room</th>
            <th>Guest</th>
            <th>Dates</th>
            <th>Guests</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @forelse($bookings as $index => $booking)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $booking->room->room_number ?? 'N/A' }}</td>
            <td>
                <strong>{{ $booking->name }}</strong><br>
                <small>{{ $booking->email }}</small>
            </td>
            <td>
                <span>{{ $booking->check_in }}</span><br>
                <span>to {{ $booking->check_out }}</span>
            </td>
            <td>{{ $booking->guests }}</td>
            <td>
                @php
    $badgeClass = match($booking->status) {
    'pending'    => 'warning',   // Yellow for pending
    'paid'       => 'info',      // Blue for paid
    'confirmed'  => 'success',   // Green for confirmed
    'checked_in' => 'primary',   // Blue for checked in
    'checked_out'=> 'secondary', // Gray for checked out
    'cancelled'  => 'danger',    // Red for cancelled
    default      => 'light',     // Light gray for unknown
};

@endphp

<span class="badge bg-{{ $badgeClass }}">
    {{ ucfirst(str_replace('_', ' ', $booking->status)) }}
</span>

                    {{ ucfirst(str_replace('_', ' ', $booking->status)) }}
                </span>
            </td>
            <td>
                <form action="{{ route('admin.bookings.updateStatus', $booking) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <select name="status" onchange="this.form.submit()" class="form-select form-select-sm">
                        @foreach(['pending', 'paid', 'confirmed', 'checked_in', 'checked_out', 'cancelled'] as $status)
                            <option value="{{ $status }}" {{ $booking->status == $status ? 'selected' : '' }}>
                                {{ ucfirst(str_replace('_', ' ', $status)) }}
                            </option>
                        @endforeach
                    </select>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="7" class="text-center text-gray-500">No bookings found.</td>
        </tr>
    @endforelse
    </tbody>
</table>
@endsection
