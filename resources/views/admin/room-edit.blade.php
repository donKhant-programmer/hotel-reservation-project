@extends('layouts.admin')

@section('content')
<h2>Edit Room</h2>

<form method="POST" action="{{ route('admin.rooms.update', $room) }}">
    @csrf @method('PUT')

    <div class="mb-3">
        <label>Room Name</label>
        <input type="text" name="name" class="form-control" value="{{ $room->name }}" required>
    </div>

    <div class="mb-3">
        <label>Price</label>
        <input type="number" name="price" class="form-control" value="{{ $room->price }}" required>
    </div>

    <div class="mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control">{{ $room->description }}</textarea>
    </div>

    <button class="btn btn-primary">Update Room</button>
</form>
@endsection
