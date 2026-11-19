@extends('layouts')

@section('title', 'Админ-панель')

@section('content')
    <h1 style="margin-bottom: 25px;">Админ-панель</h1>

    <div class="card">
        <h2>Все бронирования</h2>
        <table>
            <thead>
                <tr><th>ID</th><th>Пользователь</th><th>Фильм</th><th>Сеанс</th><th>Мест</th></tr>
            </thead>
            <tbody>
                <!-- Цикл по всем броням -->
                @foreach($bookings as $booking)
                    <tr>
                        <td>{{ $booking->id }}</td>
                        <td>{{ $booking->user->login }}</td>
                        <td>{{ $booking->showtime->movie->title }}</td>
                        <td>{{ \Carbon\Carbon::parse($booking->showtime->start_time)->format('d.m.Y H:i') }}</td>
                        <td>{{ $booking->seats_count }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="card">
        <h2>Фильмы в базе</h2>
        <ul style="list-style: none; padding: 0;">
            <!-- Цикл по фильмам -->
            @foreach($movies as $movie)
                <li style="padding: 10px 0; border-bottom: 1px solid #eee;">
                    <strong>{{ $movie->title }}</strong> — {{ $movie->showtimes->count() }} сеансов
                </li>
            @endforeach
        </ul>
    </div>
@endsection