<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\FlightController;

// Route default
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Route untuk login
Route::get('/login', function () {
    return view('user.login');
})->name('login');

// Route untuk register
Route::get('/register', function () {
    return view('user.register');
})->name('register');

// Route untuk halaman flights
Route::get('/flights', [FlightController::class, 'index'])->name('flights.index');

// Route untuk halaman flights/{flight}/choose-tier
Route::get('/flights/{flight}/choose-tier', [FlightController::class, 'chooseTier'])->name('flights.chooseTier');

// Route untuk halaman flights/{flight}/choose-seat/{class}
Route::get('/flights/{flight}/choose-seat', [FlightController::class, 'chooseSeat'])->name('flights.chooseSeat');

// Route untuk halaman choose seat user (choose seats)
Route::get('/flight/booking/{flight}/choose-seat', [BookingController::class, 'showChooseSeat'])->name('choose.seat');

// Group route dengan prefix 'user' 
Route::prefix('user')->group(function () {
    // Public routes (tanpa auth)
    Route::middleware('guest')->group(function () {
        // Tampilkan halaman login user
        Route::get('login', function () {
            return view('user.login');
        })->name('user.login');
        
        // Proses login user
        Route::post('login', [UserAuthController::class, 'login'])->name('user.login.submit');

        // Tampilkan halaman register user
        Route::get('register', [UserAuthController::class, 'showRegister'])->name('user.register');
        // Proses register user
        Route::post('register', [UserAuthController::class, 'register'])->name('user.register.submit');
    });

    // Protected routes (harus login)
    Route::middleware('auth')->group(function () {
        // Dashboard user
        Route::get('dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
        
        // Logout user
        Route::post('logout', [UserAuthController::class, 'logout'])->name('user.logout');
        
        // Booking routes - hanya satu deklarasi resource
        Route::resource('bookings', BookingController::class)->except(['show']);
        
        // Route tambahan khusus untuk booking jika diperlukan
        Route::post('bookings/check-availability', [BookingController::class, 'checkAvailability'])
            ->name('bookings.check-availability');
            
        // Route untuk submit booking
        Route::post('bookings/store', [BookingController::class, 'store'])->name('bookings.store');
    });
});

// Route untuk admin
Route::prefix('admin')->group(function () {
    // ... route admin
});