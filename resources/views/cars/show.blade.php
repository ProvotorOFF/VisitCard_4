<x-layouts.main>
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <a href="{{ route('cars.index') }}">На главную</a>

    <div>Марка: {{ $car->brand->name }}</div>
    <div>Модель: {{ $car->model }}</div>
    <div>Цена: {{ $car->price }}</div>
    <div>Коробка передач: {{ $transmissions[$car->transmission_type_id] }}</div>
    <div>VIN: {{ $car->vin }}</div>
    <div>Теги: {{ $car->tags->pluck('name')->implode(', ') }}</div>
</x-layouts.main>
