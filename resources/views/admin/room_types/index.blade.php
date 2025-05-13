@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Room Types</h2>
    <a href="{{ route('admin.room-types.create') }}" class="btn btn-primary mb-3">Add New</a>
    @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Guests</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($roomTypes as $type)
                <tr>
                    <td>{{ $type->name }}</td>
                    <td>{{ $type->max_guests }}</td>
                    <td>${{ $type->price_per_night }}</td>
                    <td>
                        <a href="{{ route('admin.room-types.edit', $type) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.room-types.destroy', $type) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Delete?')" class="btn btn-sm btn-danger">Del</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
