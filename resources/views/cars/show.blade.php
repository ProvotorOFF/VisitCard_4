<x-layouts.main>

    <a href="{{ route('cars.index') }}">На главную</a>

    <div>Марка: {{ $car->brand }}</div>
    <div>Модель: {{ $car->model }}</div>
    <div>Цена: {{ $car->price }}</div>
    <div>Цена: {{ config('app.transmissions')[$car->transmission_type_id]->label }}</div>
</x-layouts.main>
