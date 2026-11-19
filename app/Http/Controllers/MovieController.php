<?php

namespace App\Http\Controllers;

use App\Models\Movie;

class MovieController extends Controller
{
    // Список всех фильмов
    public function index()
    {
        $movies = Movie::all();
        return view('movies.index', compact('movies'));
    }

    // Конкретный фильм с сеансами
    public function show(Movie $movie)
    {
        $movie->load('showtimes');
        return view('movies.show', compact('movie'));
    }
}