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
        <nav class="navbar navbar-light bg-light">
            <div class="container d-flex justify-content-between">
                <a class="navbar-brand" href="#">
                    {{ $title }}
                </a>
                <ul class="navbar-nav d-flex flex-row">
                    @auth
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="#">Личный кабинет</a>
                        </li>
                        <li class="nav-item mx-2">
                            <form action="{{ route('auth.login.destroy') }}" method="POST" style="display: flex; height: 40px;">
                                @csrf
                                <button type="submit" class="nav-link">
                                    Выход
                                </button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="{{ route('auth.login.create') }}">Авторизация</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="{{ route('auth.register.create') }}">Регистрация</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </nav>
    </header>
    <main class="main">
        <div class="container pt-5">
            {{ $slot }}
        </div>
    </main>
    <footer class="footer">
        <div class="container">Footer Template</div>
    </footer>
    @vite(['resources/js/app.js'])
</body>

</html>
