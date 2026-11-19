<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Показать форму регистрации
    public function showRegister() { return view('auth.register'); }

    // Обработка регистрации
    public function register(Request $request)
    {
        // Валидация полей
        $data = $request->validate([
            'login' => 'required|string|min:3|max:50|unique:users,login',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Роль обычного пользователя
        $userRole = Role::where('name', 'user')->firstOrFail();

        // Создание пользователя
        User::create([
            'login' => $data['login'],
            'password' => Hash::make($data['password']),
            'role_id' => $userRole->id,
        ]);

        return redirect()->route('login')->with('success', 'Регистрация успешна, войди');
    }

    // Показать форму входа
    public function showLogin() { return view('auth.login'); }

    // Обработка входа
    public function login(Request $request)
    {
        // Валидация полей
        $credentials = $request->validate([
            'login' => 'required',
            'password' => 'required',
        ]);

        // Попытка входа
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('home');
        }

        return back()->withErrors(['login' => 'Неверный логин или пароль']);
    }

    // Выход
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}