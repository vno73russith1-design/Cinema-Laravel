@extends('layouts')

@section('title', 'Вход')

@section('content')
    <div class="card" style="max-width:400px; margin:auto;">
        <h1>Вход</h1>
        <!-- Вывод ошибок -->
        @if($errors->any())
            <div class="error">@foreach($errors->all() as $e)<div>{{ $e }}</div>@endforeach</div>
        @endif
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label>Логин</label>
                <input type="text" name="login" value="{{ old('login') }}" required>
            </div>
            <div class="form-group">
                <label>Пароль</label>
                <input type="password" name="password" required>
            </div>
            <button class="btn" type="submit" style="width:100%;">Войти</button>
        </form>
        <p style="margin-top:15px; text-align:center;">Нет аккаунта? <a href="{{ route('register') }}">Зарегистрироваться</a></p>
    </div>
@endsection