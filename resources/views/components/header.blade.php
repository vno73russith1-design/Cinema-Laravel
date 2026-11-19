<header>
    <div class="header-content">
        <a href="{{ route('home') }}" class="logo">🎬 Кинотеатр</a>
        <nav class="nav-links">
            <a href="{{ route('home') }}">Афиша</a>
            @auth
                <a href="{{ route('bookings.my') }}">Мои билеты</a>
                @if(auth()->user()->isAdmin())
                    <a href="{{ route('admin') }}">Админ</a>
                @endif
                <div class="user-info">
                    <span class="user-name">👤 {{ auth()->user()->login }}</span>
                    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                        @csrf
                        <button class="btn-logout" type="submit">Выйти</button>
                    </form>
                </div>
            @else
                <div class="user-info">
                    <a href="{{ route('login') }}" class="btn-auth">Вход</a>
                    <a href="{{ route('register') }}" class="btn-auth">Регистрация</a>
                </div>
            @endauth
        </nav>
    </div>
</header>