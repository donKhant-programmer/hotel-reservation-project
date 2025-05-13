@extends('layouts.app')

@section('content')
    <h2>{{ isset($room) ? 'Edit' : 'Add' }} Room</h2>
    <form method="POST" action="{{ isset($room) ? route('rooms.update', $room) : route('rooms.store') }}">
        @csrf
        @if(isset($room)) @method('PUT') @endif

        <div class="mb-2">
            <label>Room Number</label>
            <input name="room_number" value="{{ old('room_number', $room->room_number ?? '') }}" class="form-control">
        </div>

        <div class="mb-2">
            <label>Room Type</label>
            <select name="room_type_id" class="form-control">
                @foreach($roomTypes as $type)
                    <option value="{{ $type->id }}" {{ (old('room_type_id', $room->room_type_id ?? '') == $type->id) ? 'selected' : '' }}>
                        {{ $type->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-2">
            <label>Price</label>
            <input name="price" type="number" step="0.01" value="{{ old('price', $room->price ?? '') }}" class="form-control">
        </div>

        <div class="mb-2">
            <label>Capacity</label>
            <input name="capacity" type="number" value="{{ old('capacity', $room->capacity ?? '') }}" class="form-control">
        </div>

        <div class="mb-2">
            <label>Status</label>
            <select name="status" class="form-control">
                @foreach(['available', 'booked', 'maintenance'] as $status)
                    <option value="{{ $status }}" {{ (old('status', $room->status ?? '') == $status) ? 'selected' : '' }}>
                        {{ ucfirst($status) }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-2">
            <label>Description</label>
            <textarea name="description" class="form-control">{{ old('description', $room->description ?? '') }}</textarea>
        </div>

        <button class="btn btn-success">Save</button>
    </form>
@endsection
