<x-layouts.main>
    <a href="{{ route('cars.index') }}">На главную</a>
    <form action="{{ !isset($car) ? route('cars.store') : route('cars.update', compact('car')) }}" method="POST" class="form mb-2">
        @csrf
        @if (isset($car))
            @method('put')
        @endif
        <x-inputs.select name="brand_id" selected="{{ isset($car) ? $car->brand_id : '' }}" label="Марка"
            :values="$brands" />
        <x-inputs.input type="text" name="model" value="{{ isset($car) ? $car->model : '' }}" label="Модель" />
        <x-inputs.input type="number" name="price" value="{{ isset($car) ? $car->price : '' }}" label="Цена" />
        <x-inputs.select name="transmission_type_id" selected="{{ isset($car) ? $car->transmission_type_id : '' }}"
            label="Коробка передач" :values="$transmissions" />
        <x-inputs.input type="text" name="vin" value="{{ isset($car) ? $car->vin : '' }}" label="VIN номер" />
        <x-inputs.multiselect name="tags" :selected="isset($car) ? $car->tags->pluck('id')->toArray() : []" label="Марка" :values="$tags" />
        <button>{{ isset($car) ? 'Обновить машину' : 'Создать машину' }}</button>
    </form>
    @if (isset($car))
        <form action="{{ route('cars.destroy', compact('car')) }}" method="POST">
            @method('delete')
            @csrf
            <button>Удалить машину</button>
        </form>
    @endif
</x-layouts.main>
