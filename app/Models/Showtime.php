<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Showtime extends Model
{
    // Поля для заполнения
    protected $fillable = ['movie_id', 'start_time', 'price'];

    // Связь: сеанс принадлежит фильму
    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }

    // Связь: один сеанс — много броней
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}