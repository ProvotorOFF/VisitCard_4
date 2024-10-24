@props([
    'title' => env('APP_NAME'),
    'h1' => null,
])

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    @vite(['resources/css/app.scss'])
</head>

<body>
    <header class="header">
        <div class="container">
            <div class="header__logo">

            </div>
            <nav class="header__menu-nav">
                <ul class="header__menu-list">
                    @auth
                    <li class="header__menu-item">
                        Личный кабинет
                    </li>
                    <li class="header__menu-item">
                        Выход
                    </li>
                    @else
                    <li class="header__menu-item">
                        <a href="">Авторизация</a>
                    </li>
                    <li class="header__menu-item">
                        <a href="{{route('auth.register.create')}}">Регистрация</a>
                    </li>
                    @endauth
                </ul>
            </nav>
        </div>
    </header>
    <main class="main">
        <div class="container">
            <h1>{{ $h1 ?? $title }}</h1>
            {{ $slot }}
        </div>
    </main>
    <footer class="footer">
        <div class="container">Footer Template</div>
    </footer>
    @vite(['resources/js/app.js'])
</body>

</html>
