<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    // Поля для заполнения
    protected $fillable = ['login', 'password', 'role_id'];
    
    // Скрытые поля
    protected $hidden = ['password', 'remember_token'];

    // Связь: пользователь имеет роль
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    // Связь: пользователь имеет много броней
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    // Проверка на админа
    public function isAdmin(): bool
    {
        return $this->role && $this->role->name === 'admin';
    }
}