<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

// Афиша и фильмы
Route::get('/', [MovieController::class, 'index'])->name('home');
Route::get('/movie/{movie}', [MovieController::class, 'show'])->name('movie.show');

// Авторизация
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Только для авторизованных
Route::middleware(['auth'])->group(function () {
    Route::post('/book/{showtime}', [BookingController::class, 'store'])->name('booking.store');
    Route::get('/my-bookings', [BookingController::class, 'index'])->name('bookings.my');
    Route::delete('/booking/{booking}', [BookingController::class, 'destroy'])->name('booking.destroy');
});

// Только для админа
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
});