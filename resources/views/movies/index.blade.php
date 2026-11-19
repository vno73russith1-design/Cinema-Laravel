@extends('layouts')

@section('title', 'Афиша')

@section('content')
    <h1 style="margin-bottom: 25px;">Афиша кинотеатра</h1>
    <div style="display: flex; gap: 20px; flex-wrap: wrap;">
        <!-- Цикл по всем фильмам -->
        @foreach($movies as $movie)
            <div class="card" style="width: 300px;">
                <h2>{{ $movie->title }}</h2>
                <p style="margin-bottom: 15px; color: #666;">{{ Str::limit($movie->description, 100) }}</p>
                <a href="{{ route('movie.show', $movie) }}" class="btn">Подробнее и сеансы</a>
            </div>
        @endforeach
    </div>
@endsection