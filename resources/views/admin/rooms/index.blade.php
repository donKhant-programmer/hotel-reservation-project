@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Room List</h2>
    <a href="{{ route('admin.rooms.form') }}" class="btn btn-primary mb-3">+ Add Room</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Room #</th>
                <th>Type</th>
                <th>Base Price</th>
                <th>Capacity</th>
                <th>Status</th>
                <th>Amenities</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($rooms as $room)
                <tr>
                    <td>{{ $room->room_number }}</td>
                    <td>{{ $room->roomType->name ?? 'N/A' }}</td>
                    <td>${{ number_format($room->roomType->base_price ?? 0, 2) }}</td>
                    <td>{{ $room->roomType->capacity ?? '-' }}</td>
                    <td>
                        <span class="badge 
                            @if($room->status === 'available') bg-success 
                            @elseif($room->status === 'maintenance') bg-warning 
                            @else bg-secondary @endif">
                            {{ ucfirst($room->status) }}
                        </span>
                    </td>
                    <td>
                        @if($room->roomType && is_array($room->roomType->amenities))
                            <ul class="mb-0 ps-3">
                                @foreach($room->roomType->amenities as $amenity)
                                    <li>{{ $amenity }}</li>
                                @endforeach
                            </ul>
                        @else
                            <em class="text-muted">None</em>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.rooms.edit', $room->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.rooms.delete', $room->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this room?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Del</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">No rooms found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
