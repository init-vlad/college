<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ICB - Международный колледж бизнеса и коммуникаций')</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/root-styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main-page.css') }}">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('img/favicon.png') }}" type="image/x-icon">

    <!-- Custom page styles -->
    @stack('styles')

    <!-- Scripts -->
    <script src="{{ asset('js/script.js') }}" defer></script>
    @stack('scripts')
</head>
<body>
    <!-- Header -->
    <header>
        <div class="logo">
            <img src="{{ asset('img/favicon.png') }}" alt="Логотип ICB">
            <a href="{{ route('home') }}" style="text-decoration: none; color: inherit;">
                <span class="icb-span">ICB</span>
            </a>
        </div>

        <nav>
            <ul>
                <li><a href="{{ route('home') }}" class="{{ Route::currentRouteName() == 'home' ? 'active' : '' }}">Главная</a></li>
                <li><a href="{{ route('specialities') }}" class="{{ Route::currentRouteName() == 'specialities' ? 'active' : '' }}">Специальности</a></li>
                <li><a href="{{ route('advantages') }}" class="{{ Route::currentRouteName() == 'advantages' ? 'active' : '' }}">Преимущества</a></li>
                <li><a href="{{ route('grants') }}" class="{{ Route::currentRouteName() == 'grants' ? 'active' : '' }}">Гранты и скидки</a></li>
                <li><a href="{{ route('about') }}" class="{{ Route::currentRouteName() == 'about' ? 'active' : '' }}">О нас</a></li>
            </ul>
        </nav>

        <div class="auth-button">
            @guest
                <a href="{{ route('register') }}" style="text-decoration: none; margin-right: var(--space-sm);">
                    <button class="btn btn-outline">
                        Регистрация
                    </button>
                </a>
                <a href="{{ route('login') }}" style="text-decoration: none;">
                    <button class="btn btn-primary">
                        Вход
                    </button>
                </a>
            @else
                <div style="display: flex; align-items: center; gap: var(--space-md);">
                    <span style="color: hsl(var(--foreground)); font-size: 0.875rem;">
                        Привет, {{ Auth::user()->name }}!
                    </span>
                    @if(Auth::user()->role === 'teacher')
                        <a href="{{ route('teacher.dashboard') }}" style="text-decoration: none; margin-right: var(--space-sm);">
                            <button class="btn btn-outline">
                                Кабинет преподавателя
                            </button>
                        </a>
                    @elseif(Auth::user()->role === 'student')
                        <a href="{{ route('student.dashboard') }}" style="text-decoration: none; margin-right: var(--space-sm);">
                            <button class="btn btn-outline">
                                Кабинет студента
                            </button>
                        </a>
                    @endif
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-secondary">
                            Выйти
                        </button>
                    </form>
                </div>
            @endguest
        </div>

        <div class="burger-menu">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="main5">
        <div class="footer-container">
            <div class="main5-left">
                <img src="{{ asset('img/favicon.png') }}" alt="Логотип колледжа" class="main5-logo">
                <div>
                    <h3 class="main5-title">Международный колледж бизнеса и коммуникаций</h3>
                    <p class="main5-copyright">© 2009 Международный колледж бизнеса и коммуникаций</p>
                </div>
            </div>
            <div class="main5-right">
                <div class="main5-column">
                    <p><a href="https://drive.google.com/drive/folders/1WgUH77Fn8s-DWd5dh6w4A8S4i0RW7Isg" target="_blank" style="text-decoration: none; color: inherit;">Лицензии</a></p>
                    <p><a href="https://drive.google.com/file/d/1e85rueH3PdjIRo8oKoOq1s1fa3FvvCid/view" target="_blank" style="text-decoration: none; color: inherit;">Международная аккредитация</a></p>
                    <p><a href="https://docs.google.com/document/d/1bOHj4AcE8lfShxc5VN8LgOzAVl8Lmp3uGFi-pr-Wty4/edit?tab=t.0" target="_blank" style="text-decoration: none; color: inherit;">Реквизиты</a></p>
                </div>

                <div class="main5-column">
                    <p><strong>Адрес:</strong></p>
                    <p>г. Алматы, Микрорайон Жетысу-2, 16а</p>
                </div>
                <div class="main5-column">
                    <p><strong>Контакты:</strong></p>
                    <p>Тел: 8 776 000 65 50</p>
                    <p>Почта: icb2024.2025@gmail.com</p>
                </div>
                <div class="main5-column">
                    <p><strong>Мы в соц. сетях:</strong></p>
                    <p class="main5-socials">
                        <a href="https://www.youtube.com/@CollegeICB" class="main5-link"><img src="{{ asset('img/ютуб.png') }}" alt="YouTube"></a>
                        <a href="https://www.instagram.com/college.icb/?hl=ru" class="main5-link"><img src="{{ asset('img/ins.png') }}" alt="Instagram"></a>
                        <a href="https://t.me/+-Oq4VlR8BGA4M2Zi" class="main5-link"><img src="{{ asset('img/telegram.png') }}" alt="Telegram"></a>
                        <a href="https://www.tiktok.com/@icb.college?_t=ZM-8t5S7DmT2mc&_r=1" class="main5-link"><img src="{{ asset('img/тт2.png') }}" alt="TikTok"></a>
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Flash Messages -->
    @if(session('success'))
        <div class="flash-message success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="flash-message error">
            {{ session('error') }}
        </div>
    @endif

    <!-- Additional Scripts -->
    <script src="{{ asset('js/script_active.js') }}" defer></script>
    @stack('bottom-scripts')
</body>
</html>