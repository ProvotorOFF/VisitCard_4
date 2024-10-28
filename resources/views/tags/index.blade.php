<x-layouts.main>
    <h1 class="text-center mb-4">Список тегов</h1>
    @auth
        <div class="d-flex justify-content-start mb-4">
            <a href="{{ route('tags.create') }}" class="btn btn-success">Создать тег</a>
        </div>
    @endauth
    <div class="list-group">
        @forelse ($tags ?? [] as $tag)
            <div class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-1">{{ $tag->name }}</h5>
                </div>
                <div class="d-flex">
                    <a href="{{ route('tags.show', [$tag]) }}" class="btn btn-primary me-2">Посмотреть</a>
                    @auth
                        <a href="{{ route('tags.edit', [$tag]) }}" class="btn btn-secondary">Редактировать</a>
                    @endauth
                </div>
            </div>
        @empty
            <p class="text-center text-muted">Нет доступных тегов.</p>
        @endforelse
    </div>
</x-layouts.main>
