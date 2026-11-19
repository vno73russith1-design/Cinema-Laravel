<?php

namespace Database\Seeders;

use App\Models\Movie;
use App\Models\Role;
use App\Models\Showtime;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Role::create(['name' => 'user']);
        Role::create(['name' => 'admin']);

        User::create([
            'login' => 'admin',
            'password' => Hash::make('admin123'),
            'role_id' => 2,
        ]);

        $movie1 = Movie::create([
            'title' => 'Дюна: Часть вторая',
            'description' => 'Пол Атрейдес объединяется с фрименами, чтобы отомстить заговорщикам, уничтожившим его семью.',
        ]);

        $movie2 = Movie::create([
            'title' => 'Оппенгеймер',
            'description' => 'История создания первой атомной бомбы и моральных терзаний её создателя.',
        ]);

        Showtime::create([
            'movie_id' => $movie1->id,
            'start_time' => '2026-11-20 18:00:00',
            'price' => 450.00,
        ]);
        
        Showtime::create([
            'movie_id' => $movie1->id,
            'start_time' => '2026-11-20 21:00:00',
            'price' => 550.00,
        ]);

        Showtime::create([
            'movie_id' => $movie2->id,
            'start_time' => '2026-11-21 19:00:00',
            'price' => 500.00,
        ]);
    }
}