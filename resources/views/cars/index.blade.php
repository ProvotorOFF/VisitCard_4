<x-layouts.main>
    <a href="{{ route('cars.create') }}">Создать машину</a>
    <a href="{{ route('cars.trashed') }}">Перейти в удаленные</a>
    <a href="{{ route('index') }}">На главную</a>
    @foreach ($cars ?? [] as $car)
        <p>{{ $car->id }} - {{ $car->brand->name }} {{ $car->model }} {{ $car->price }} <a
                href="{{ route('cars.show', [$car]) }}">Посмотреть</a>|<a
                href="{{ route('cars.edit', [$car]) }}">Редактировать</a>
    @endforeach
</x-layouts.main>
