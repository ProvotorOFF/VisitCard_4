<x-layouts.main h1="Регистрация" title="Регистрация">
    <form action="{{ route('auth.register.store') }}" method="POST">
        @csrf

        <x-inputs.input name="name" type="text" label="Имя" required />
        <x-inputs.input name="email" type="email" label="Электронная почта" required />
        <x-inputs.input name="password" type="password" label="Пароль" required />
        <x-inputs.input name="password_confirmation" type="password" label="Подтверждение пароля" required />

        <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
    </form>
</x-layouts.main>
