@extends('layouts')

@section('title', 'Регистрация')

@section('content')
    <div class="card" style="max-width:400px; margin:auto;">
        <h1>Регистрация</h1>
        <!-- Вывод ошибок -->
        @if($errors->any())
            <div class="error">@foreach($errors->all() as $e)<div>{{ $e }}</div>@endforeach</div>
        @endif
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group">
                <label>Логин</label>
                <input type="text" name="login" value="{{ old('login') }}" required>
            </div>
            <div class="form-group">
                <label>Пароль</label>
                <input type="password" name="password" required>
            </div>
            <div class="form-group">
                <label>Подтверждение пароля</label>
                <input type="password" name="password_confirmation" required>
            </div>
            <button class="btn btn-green" type="submit" style="width:100%;">Зарегистрироваться</button>
        </form>
        <p style="margin-top:15px; text-align:center;">Уже есть аккаунт? <a href="{{ route('login') }}">Войти</a></p>
    </div>
@endsection