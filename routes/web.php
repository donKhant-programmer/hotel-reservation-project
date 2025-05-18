<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Add this to your existing routes
use App\Http\Controllers\BookingController;
// Authentication routes
use App\Http\Controllers\NewsletterController;

// Main Pages
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/rooms', function () {
    return view('rooms', [
        'rooms' => [
            ['id' => 1, 'name' => 'Deluxe Room', 'price' => 199],
            ['id' => 2, 'name' => 'Executive Suite', 'price' => 299],
            ['id' => 3, 'name' => 'Presidential Suite', 'price' => 499]
        ]
    ]);
})->name('rooms');

// Route::get('/booking', function () {
//     return view('booking', [
//         'roomTypes' => [
//             ['id' => 1, 'name' => 'Deluxe Room'],
//             ['id' => 2, 'name' => 'Executive Suite'],
//             ['id' => 3, 'name' => 'Presidential Suite']
//         ]
//     ]);
// })->name('booking');



Route::get('/booking', [BookingController::class, 'index'])->name('booking');
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');


// Authenticated user routes
Route::middleware(['auth'])->group(function () {
    Route::get('/user/dashboard', function () {
        return view('user.dashboard', [
            'bookings' => [
                ['id' => 1, 'room' => 'Deluxe Room', 'dates' => '2023-10-15 to 2023-10-20'],
                ['id' => 2, 'room' => 'Executive Suite', 'dates' => '2023-11-05 to 2023-11-10']
            ]
        ]);
    })->name('user.dashboard');
    
    Route::get('/profile', function () {
        return view('profile', [
            'user' => Auth::user()
        ]);
    })->name('profile');
});

// Newsletter subscription (placeholder)
Route::post('/newsletter/subscribe', function () {
    return back()->with('success', 'Thanks for subscribing!');
})->name('newsletter.subscribe');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
