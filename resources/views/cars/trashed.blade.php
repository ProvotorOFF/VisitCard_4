<x-layouts.main>
    <h1>Корзина — Удалённые машины</h1>
    <a href="{{ route('cars.index') }}">К машинам</a>
    @if (session('message'))
        <div class="alert alert-danger">
            {{ session('message') }}
        </div>
    @endif
    @if ($cars->isEmpty())
        <p>Корзина пуста.</p>
    @else
        <table>
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
                        <td>{{ $car->brand }}</td>
                        <td>{{ $car->model }}</td>
                        <td>
                            <form action="{{ route('cars.restore', $car->id) }}" method="POST">
                                @csrf
                                <button type="submit">Восстановить</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</x-layouts.main>
