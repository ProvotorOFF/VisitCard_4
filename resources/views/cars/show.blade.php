<x-layouts.main>
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="mb-3">
        <h5>Марка: {{ $car->brand->name }}</h5>
        <h6>Модель: {{ $car->model }}</h6>
        <p>Цена: {{ $car->price }}</p>
        <p>Коробка передач: {{ $transmissions[$car->transmission_type_id] }}</p>
        <p>VIN: {{ $car->vin }}</p>
        <p>Теги: {{ $car->tags->pluck('name')->implode(', ') }}</p>
        <p>Статус: {{ $car->status_id->getName() }}</p>
        <p>Адрес продавца: {{ $car->seller_address ? $car->seller_address : 'Не указан' }}</p>
    </div>
    <x-comments.form model="car" id="{{ $car->id }}" />
    <x-comments.list :model="$car" />
</x-layouts.main>
