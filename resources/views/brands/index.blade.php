<x-layouts.main>
    <a href="{{ route('brands.create') }}">Создать бренд</a>
    @foreach ($brands ?? [] as $brand)
        <p>{{ $brand->id }} - {{ $brand->name }}
            <a href="{{ route('brands.show', [$brand]) }}">Посмотреть</a>|
            <a href="{{ route('brands.edit', [$brand]) }}">Редактировать</a>
    @endforeach
</x-layouts.main>
