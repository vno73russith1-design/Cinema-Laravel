@extends('layouts')

@section('title', 'Мои билеты')

@section('content')
    <h1 style="margin-bottom: 25px;">Мои билеты</h1>

    @if($bookings->isEmpty())
        <div class="card"><p>У вас пока нет купленных билетов.</p></div>
    @else
        <table>
            <!-- Заголовки таблицы -->
            <thead>
                <tr>
                    <th>Фильм</th>
                    <th>Дата и время</th>
                    <th>Количество мест</th>
                    <th>Сумма</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <!-- Список билетов -->
            <tbody>
                @foreach($bookings as $booking)
                    <tr>
                        <td><strong>{{ $booking->showtime->movie->title }}</strong></td>
                        <td>{{ \Carbon\Carbon::parse($booking->showtime->start_time)->format('d.m.Y H:i') }}</td>
                        <td>{{ $booking->seats_count }}</td>
                        <td>{{ $booking->seats_count * $booking->showtime->price }} руб.</td>
                        <!-- Кнопка возврата -->
                        <td>
                            <form action="{{ route('booking.destroy', $booking) }}" method="POST" onsubmit="return confirm('Вы уверены, что хотите вернуть билет?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-logout" style="padding: 5px 10px; font-size: 13px;">Вернуть</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection