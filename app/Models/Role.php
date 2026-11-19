<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    // Поля для заполнения
    protected $fillable = ['name'];

    // Связь: одна роль — много пользователей
    public function users()
    {
        return $this->hasMany(User::class);
    }
}