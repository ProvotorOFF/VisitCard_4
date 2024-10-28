<x-layouts.main>
    <h1 class="text-center mb-4">Список брендов</h1>
    @auth
        <div class="d-flex justify-content-start mb-4">
            <a href="{{ route('brands.create') }}" class="btn btn-success">Создать бренд</a>
        </div>
    @endauth
    <div class="list-group">
        @forelse ($brands ?? [] as $brand)
            <div class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-1">{{ $brand->name }}</h5>
                </div>
                <div class="d-flex">
                    <a href="{{ route('brands.show', [$brand]) }}" class="btn btn-primary me-2">Посмотреть</a>
                    @auth
                        <a href="{{ route('brands.edit', [$brand]) }}" class="btn btn-secondary">Редактировать</a>
                    @endauth
                </div>
            </div>
        @empty
            <p class="text-center text-muted">Нет доступных брендов.</p>
        @endforelse
    </div>
</x-layouts.main>
