<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Movie;
use App\Models\Showtime;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Главная страница админки
    public function index()
    {
        // Все фильмы и брони
        $movies = Movie::with('showtimes')->get();
        $bookings = Booking::with(['user', 'showtime.movie'])->orderByDesc('created_at')->get();
        
        return view('admin', compact('movies', 'bookings'));
    }
}