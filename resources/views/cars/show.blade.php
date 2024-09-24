<x-layouts.main>
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <a href="{{ route('cars.index') }}">На главную</a>

    <div>Марка: {{ $car->brand }}</div>
    <div>Модель: {{ $car->model }}</div>
    <div>Цена: {{ $car->price }}</div>
    <div>Коробка передач: {{ config('app-cars.transmissions')[$car->transmission_type_id]->label }}</div>
</x-layouts.main>
