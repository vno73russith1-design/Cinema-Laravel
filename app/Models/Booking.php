<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    // Поля для заполнения
    protected $fillable = ['user_id', 'showtime_id', 'seats_count'];

    // Связь: бронь принадлежит пользователю
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Связь: бронь принадлежит сеансу
    public function showtime()
    {
        return $this->belongsTo(Showtime::class);
    }
}