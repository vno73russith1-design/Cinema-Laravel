@extends('layouts')

@section('title', $movie->title)

@section('content')
    <div class="card">
        <h1>{{ $movie->title }}</h1>
        <p style="margin: 20px 0; font-size: 16px;">{{ $movie->description }}</p>
        <hr style="margin: 20px 0; border: 0; border-top: 1px solid #ddd;">
        <h3>Выберите сеанс:</h3>
        
        <!-- Цикл по сеансам -->
        @foreach($movie->showtimes as $showtime)
            <div style="border: 1px solid #ddd; padding: 15px; margin-bottom: 10px; border-radius: 6px; display: flex; justify-content: space-between; align-items: center;">
                <div>
                    <strong style="font-size: 18px;">{{ \Carbon\Carbon::parse($showtime->start_time)->format('d.m.Y H:i') }}</strong> 
                    <span style="color: #666; margin-left: 15px;">{{ $showtime->price }} руб.</span>
                </div>
                <div>
                    <!-- Форма покупки (только для авторизованных) -->
                    @auth
                        <form action="{{ route('booking.store', $showtime) }}" method="POST" style="display: flex; gap: 10px; align-items: center;">
                            @csrf
                            <input type="number" name="seats_count" value="1" min="1" max="10" style="width: 70px; margin: 0;">
                            <button class="btn btn-green" type="submit">Купить</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" style="color: #0d6efd;">Войдите, чтобы купить</a>
                    @endauth
                </div>
            </div>
        @endforeach
    </div>
@endsection