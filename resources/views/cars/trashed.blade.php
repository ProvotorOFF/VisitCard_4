<x-layouts.main>
    <h1>Удалённые машины</h1>
    @if (session('message'))
        <div class="alert alert-danger">
            {{ session('message') }}
        </div>
    @endif

    @if ($cars->isEmpty())
        <p>Корзина пуста.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Бренд</th>
                    <th>Модель</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cars as $car)
                    <tr>
                        <td>{{ $car->brand->name }}</td>
                        <td>{{ $car->model }}</td>
                        <td>
                            @auth
                                <form action="{{ route('cars.restore', $car->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Восстановить</button>
                                </form>
                            @else
                                <span>Восстановление доступно только авторизованным пользователям.</span>
                            @endauth
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</x-layouts.main>
