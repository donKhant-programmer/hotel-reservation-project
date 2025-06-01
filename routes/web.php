<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Add this to your existing routes
use App\Http\Controllers\RoomController;
// Authentication routes
use App\Http\Controllers\BookingController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\HomeController;

// Main Pages
Route::get('/', function () {
    return view('home');
})->name('home');

// Show all rooms
Route::get('/rooms', [RoomController::class, 'index'])->name('rooms.index');
Route::get('/rooms-list', [RoomController::class, 'index'])->name('rooms');

// Show single room details
Route::get('/rooms/{room}', [RoomController::class, 'show'])->name('rooms.show');

// Booking routes - fixed duplicate routes
Route::get('/booking/search', [BookingController::class, 'showSearchForm'])->name('booking.search');
Route::post('/booking/availability', [BookingController::class, 'checkAvailability'])->name('booking.availability');

Route::get('/booking', [BookingController::class, 'index'])->name('booking'); // Changed from booking.index to booking
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
Route::get('/booking/create', [BookingController::class, 'create'])->name('booking.create');
Route::post('/booking/confirm', [BookingController::class, 'confirm'])->name('booking.confirm');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// For normal user
Route::middleware(['auth', 'is_user'])->group(function () {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
});

// For admin
Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
});
