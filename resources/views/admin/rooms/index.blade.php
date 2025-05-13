@extends('layouts.app')

@section('content')
    <h2>Room List</h2>
    <a href="{{ route('rooms.create') }}" class="btn btn-primary mb-3">+ Add Room</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Number</th><th>Type</th><th>Price</th><th>Capacity</th><th>Status</th><th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rooms as $room)
                <tr>
                    <td>{{ $room->room_number }}</td>
                    <td>{{ $room->roomType->name }}</td>
                    <td>${{ $room->price }}</td>
                    <td>{{ $room->capacity }}</td>
                    <td>{{ $room->status }}</td>
                    <td>
                        <a href="{{ route('rooms.edit', $room) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('rooms.destroy', $room) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Delete this room?');">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger">Del</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
