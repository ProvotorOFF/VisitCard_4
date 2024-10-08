<x-layouts.main>
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <a href="{{ route('cars.index') }}">К машинам</a>

    <div>Марка: {{ $car->brand->name }}</div>
    <div>Модель: {{ $car->model }}</div>
    <div>Цена: {{ $car->price }}</div>
    <div>Коробка передач: {{ $transmissions[$car->transmission_type_id] }}</div>
    <div>VIN: {{ $car->vin }}</div>
    <div>Теги: {{ $car->tags->pluck('name')->implode(', ') }}</div>
    <div>Статус: {{ $car->status_id->getName() }}</div>

    <form action="{{ route('comments.store_car', ['car' => $car]) }}" method="post">
        @csrf
        <textarea name="text" id="text" cols="30" rows="10"></textarea>
        @error('text')
            <span style="color: red">{{ $message }}</span>
        @enderror
        <button>Комментировать</button>
    </form>
    @if ($car->comments)
        Комментарии:
        <ul>
            @foreach ($car->comments as $comment)
                <li>
                    {{ $comment->id }} {{ $comment->text }}
                </li>
            @endforeach
        </ul>
    @endif

</x-layouts.main>
