<x-layouts.main>
    <div class="d-flex justify-content-center">
        <form action="{{ !isset($car) ? route('cars.store') : route('cars.update', compact('car')) }}" method="POST"
            class="form mb-2 w-50">
            @csrf
            @if (isset($car))
                @method('put')
            @endif
            <x-inputs.select name="brand_id" selected="{{ isset($car) ? $car->brand_id : '' }}" label="Марка"
                :values="$brands" class="form-control mb-3" />
            <x-inputs.input type="text" name="model" value="{{ isset($car) ? $car->model : '' }}" label="Модель"
                class="form-control mb-3" />
            <x-inputs.input type="number" name="price" value="{{ isset($car) ? $car->price : '' }}" label="Цена"
                class="form-control mb-3" />
            <x-inputs.select name="transmission_type_id" selected="{{ isset($car) ? $car->transmission_type_id : '' }}"
                label="Коробка передач" :values="$transmissions" class="form-control mb-3" />
            <x-inputs.input type="text" name="vin" value="{{ isset($car) ? $car->vin : '' }}" label="VIN номер"
                class="form-control mb-3" />
            <x-inputs.multiselect name="tags" :selected="isset($car) ? $car->tags->pluck('id')->toArray() : []" label="Теги" :values="$tags"
                class="form-control mb-3" />
            <x-inputs.select name="status_id" selected="{{ isset($car) ? $car->status_id : '' }}" label="Статус"
                :values="$statuses" class="form-control mb-3" />
            <div class="d-flex justify-content-center">
                <button class="btn btn-primary">{{ isset($car) ? 'Обновить машину' : 'Создать машину' }}</button>
            </div>
        </form>
    </div>
    @if (isset($car))
        <div class="d-flex justify-content-center">
            <form action="{{ route('cars.destroy', compact('car')) }}" method="POST" class="mt-2 form mb-2 w-50">
                @method('delete')
                @csrf
                <div class="d-flex justify-content-center">
                    <button class="btn btn-danger">Удалить машину</button>
                </div>

            </form>
        </div>
    @endif
    </div>
</x-layouts.main>
