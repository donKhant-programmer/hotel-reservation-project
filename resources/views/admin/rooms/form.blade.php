@extends('layouts.admin')

@section('content')
<h2>{{ isset($room) ? 'Edit' : 'Create' }} Room</h2>

<form method="POST" action="{{ isset($room) ? route('admin.rooms.update', $room) : route('admin.rooms.store') }}">
    @csrf
    @if(isset($room))
        @method('PUT')
    @endif

    <div class="mb-3">
        <label>Room Number</label>
        <input type="text" name="room_number" class="form-control" value="{{ old('room_number', $room->room_number ?? '') }}" required>
    </div>

    <div class="mb-3">
        <label>Floor</label>
        <input type="text" name="floor" class="form-control" value="{{ old('floor', $room->floor ?? '') }}">
    </div>

    <div class="mb-3">
        <label>Room Type</label>
        <select name="room_type_id" class="form-control" required>
            <option value="">-- Select Room Type --</option>
            @foreach($roomTypes as $type)
                <option value="{{ $type->id }}" {{ (old('room_type_id', $room->room_type_id ?? '') == $type->id) ? 'selected' : '' }}>
                    {{ $type->name }} ({{ $type->capacity }} guests - ${{ $type->base_price }})
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Status</label>
        <select name="status" class="form-control">
            @foreach(['available', 'booked', 'maintenance'] as $status)
                <option value="{{ $status }}" {{ (old('status', $room->status ?? 'available') == $status) ? 'selected' : '' }}>
                    {{ ucfirst($status) }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control">{{ old('description', $room->description ?? '') }}</textarea>
    </div>

    <button class="btn btn-success">{{ isset($room) ? 'Update' : 'Create' }} Room</button>
</form>
@endsection
