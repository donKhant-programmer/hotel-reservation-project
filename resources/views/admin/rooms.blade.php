@extends('layouts.admin')

@section('content')
<h2>Rooms</h2>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="mb-3">
    <form method="GET" class="d-flex">
        <input type="text" name="search" class="form-control me-2" placeholder="Search rooms..." value="{{ request('search') }}">
        <button class="btn btn-primary">Search</button>
    </form>
</div>

<a href="{{ route('admin.rooms.create') }}" class="btn btn-success mb-3">+ Add Room</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Price (MMK)</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($rooms as $room)
        <tr>
            <td>{{ $room->name }}</td>
            <td>{{ $room->price }}</td>
            <td>{{ $room->description }}</td>
            <td>{{ $room->roomType->name ?? 'N/A' }}</td>

            <td>
                <a href="{{ route('admin.rooms.edit', $room) }}" class="btn btn-sm btn-primary">Edit</a>
                <form action="{{ route('admin.rooms.delete', $room) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this room?')">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

{{ $rooms->links() }}
@endsection
