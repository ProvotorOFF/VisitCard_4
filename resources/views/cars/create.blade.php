<form action="{{ !isset($car) ? route('cars.store') : route('cars.update', compact('car')) }}" method="POST">
    @csrf
    @if (isset($car))
        @method('put')
    @endif
    <label for="brand">Марка</label>
    <input type="text" name="brand" id="brand" value="{{ isset($car) ? $car->brand : '' }}" />
    @error('brand')
        {{ $message }}
    @enderror
    <br>
    <label for="model">Модель</label>
    <input type="text" name="model" id="model" value="{{ isset($car) ? $car->model : '' }}" />
    @error('model')
        {{ $message }}
    @enderror
    <br>
    <label for="price">Цена</label>
    <input type="number" step="1000" name="price" id="price" value="{{ isset($car) ? $car->price : '' }}" />
    @error('price')
        {{ $message }}
    @enderror
    <br>
    <button>{{ isset($car) ? 'Обновить машину' : 'Создать машину' }}</button>
</form>
@if (isset($car))
<form action="{{route('cars.destroy', compact('car')) }}" method="POST">
    @method('delete')
    @csrf
    <button>Удалить машину</button>
</form>
@endif