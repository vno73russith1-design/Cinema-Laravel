<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Showtime;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    // Список моих билетов
    public function index()
    {
        $bookings = auth()->user()->bookings()->with('showtime.movie')->get();
        return view('bookings.index', compact('bookings'));
    }

    // Покупка билетов
    public function store(Request $request, Showtime $showtime)
    {
        // Валидация количества мест
        $request->validate([
            'seats_count' => 'required|integer|min:1|max:10'
        ]);

        // Создание брони
        Booking::create([
            'user_id' => auth()->id(),
            'showtime_id' => $showtime->id,
            'seats_count' => $request->seats_count,
        ]);

        return back()->with('success', 'Билеты успешно забронированы!');
    }

    // Возврат билетов
    public function destroy(Booking $booking)
    {
        // Проверка владельца
        if ($booking->user_id !== auth()->id()) {
            abort(403, 'Это не ваш билет');
        }

        $booking->delete();

        return back()->with('success', 'Бронь успешно отменена. Деньги вернутся на карту.');
    }
}