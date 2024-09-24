<x-layouts.main>
    <a href="{{ route('cars.create') }}">Создать машину</a>
    <a href="{{ route('cars.trashed') }}">Перейти в удаленные</a>
    @foreach ($cars ?? [] as $car)
        <p>{{ $car->id }} - {{ $car->brand }} {{ $car->model }} {{ $car->price }} <a
                href="{{ route('cars.show', [$car]) }}">Посмотреть</a>|<a
                href="{{ route('cars.edit', [$car]) }}">Редактировать</a>
    @endforeach
</x-layouts.main>
