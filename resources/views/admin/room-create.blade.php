<form method="POST" action="{{ route('admin.rooms.store') }}">
    @csrf

    <div class="mb-3">
        <label>Room Number</label>
        <input type="text" name="room_number" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Floor</label>
        <input type="text" name="floor" class="form-control">
    </div>

    <div class="mb-3">
        <label>Room Type</label>
        <select name="room_type_id" class="form-control" required>
            <option value="">-- Select Room Type --</option>
            @foreach($roomTypes as $type)
                <option value="{{ $type->id }}">
                    {{ $type->name }} ({{ $type->capacity }} guests - ${{ $type->base_price }})
                </option>
            @endforeach
        </select>
    </div>

    <button class="btn btn-success">Create Room</button>
</form>
