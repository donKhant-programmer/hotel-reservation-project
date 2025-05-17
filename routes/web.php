<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\BookingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

// Add this route for the rooms list page
Route::get('/rooms', [RoomController::class, 'index'])->name('rooms.index');

Route::get('/rooms/{room}', [RoomController::class, 'show'])->name('rooms.show');

// Add booking routes
Route::get('/booking/{room}', [BookingController::class, 'create'])->name('booking.create');
Route::post('/booking/{room}', [BookingController::class, 'store'])->name('booking.store');

// Add dashboard route
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
