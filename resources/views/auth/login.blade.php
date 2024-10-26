<x-layouts.main h1="Авторизация" title="Авторизация">
    <form action="{{ route('auth.login.store') }}" method="POST">
        @csrf
        <x-inputs.input name="email" type="email" label="Электронная почта" required />
        <x-inputs.input name="password" type="password" label="Пароль" required />
        <button type="submit" class="btn btn-primary">Авторизация</button>
    </form>
</x-layouts.main>
