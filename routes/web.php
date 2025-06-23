<?php

use Illuminate\Support\Facades\Route;

// Add this to your existing routes
// Authentication routes
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\UserRoomController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\RoomTypeController;


// Main Pages
Route::get('/', function () {
    return view('home');
})->name('home');

// Show all rooms
Route::get('/rooms', [UserRoomController::class, 'index'])->name('rooms.index');
Route::get('/rooms-list', [UserRoomController::class, 'index'])->name('rooms');

// Show single room details
Route::get('/rooms/{room}', [UserRoomController::class, 'show'])->name('rooms.show');

// Booking routes - fixed duplicate routes
Route::get('/booking/search', [BookingController::class, 'showSearchForm'])->name('booking.search');
Route::post('/booking/availability', [BookingController::class, 'checkAvailability'])->name('booking.availability');

Route::get('/booking', [BookingController::class, 'index'])->name('booking'); // Changed from booking.index to booking
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
Route::get('/booking/create', [BookingController::class, 'create'])->name('booking.create');
Route::post('/booking/confirm', [BookingController::class, 'confirm'])->name('booking.confirm');

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::get('/rooms', [AdminController::class, 'rooms'])->name('rooms');
    Route::get('/rooms/create', [AdminController::class, 'createRoom'])->name('rooms.create');
    Route::post('/rooms/create', [AdminController::class, 'storeRoom'])->name('rooms.store');
    Route::get('/rooms/{room}/edit', [AdminController::class, 'editRoom'])->name('rooms.edit');
    Route::put('/rooms/{room}/edit', [AdminController::class, 'updateRoom'])->name('rooms.update');
    Route::delete('/rooms/{room}/delete', [AdminController::class, 'deleteRoom'])->name('rooms.delete');

    Route::resource('room-types', RoomTypeController::class)->except(['show']);

    Route::get('/bookings', [AdminController::class, 'bookings'])->name('bookings');
    Route::get('/users', [AdminController::class, 'users'])->name('users');
});

Route::middleware(['auth'])->prefix('user')->name('user.')->group(function () {
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::post('/profile/update', [UserController::class, 'updateProfile'])->name('updateProfile');
});

// Route::middleware(['auth', 'admin'])->group(function () {

//     Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

//     Route::get('/rooms', [AdminController::class, 'rooms'])->name('rooms');
//     // New
//     Route::get('/rooms/create', [AdminController::class, 'createRoom'])->name('rooms.create');
//     Route::post('/rooms/create', [AdminController::class, 'storeRoom'])->name('rooms.store');
//     Route::get('/rooms/{room}/edit', [AdminController::class, 'editRoom'])->name('rooms.edit');
//     Route::put('/rooms/{room}/edit', [AdminController::class, 'updateRoom'])->name('rooms.update');
//     Route::delete('/rooms/{room}/delete', [AdminController::class, 'deleteRoom'])->name('rooms.delete');

    
//     Route::get('/bookings', [AdminController::class, 'bookings'])->name('bookings');
//     Route::get('/users', [AdminController::class, 'users'])->name('users');
// });

// Auth routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
