@extends('layouts.admin')

@section('content')
    <h1 class="mb-4">Admin Dashboard</h1>

    <div class="row g-3">
        <div class="col-md-4">
            <div class="card text-bg-primary">
                <div class="card-body">
                    <h5 class="card-title">Total Rooms</h5>
                    <p class="card-text fs-4">{{ $roomsCount }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-bg-success">
                <div class="card-body">
                    <h5 class="card-title">Total Bookings</h5>
                    <p class="card-text fs-4">{{ $bookingsCount }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-bg-warning">
                <div class="card-body">
                    <h5 class="card-title">Total Users</h5>
                    <p class="card-text fs-4">{{ $usersCount }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
