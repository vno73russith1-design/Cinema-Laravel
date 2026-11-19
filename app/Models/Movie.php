<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    // Поля для заполнения
    protected $fillable = ['title', 'description', 'poster_url'];

    // Связь: один фильм — много сеансов
    public function showtimes()
    {
        return $this->hasMany(Showtime::class);
    }
}