<x-layouts.main>
    <a href="{{ route('tags.create') }}">Создать тег</a>
    @foreach ($tags ?? [] as $tag)
        <p>{{ $tag->id }} - {{ $tag->name }}
            <a href="{{ route('tags.show', [$tag]) }}">Посмотреть</a>|
            <a href="{{ route('tags.edit', [$tag]) }}">Редактировать</a>
    @endforeach
</x-layouts.main>
