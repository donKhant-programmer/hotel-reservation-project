@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add Room Type</h2>
    <form method="POST" action="{{ route('admin.room-types.store') }}">
        @csrf
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Max Guests</label>
            <input type="number" name="max_guests" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Price Per Night</label>
            <input type="number" step="0.01" name="price_per_night" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <button class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
