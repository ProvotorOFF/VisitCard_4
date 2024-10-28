<x-layouts.main h1="Список">
        <h1 class="text-center mb-4">Список машин</h1>
        @auth
            <div class="d-flex justify-content-start mb-4">
                <a href="{{ route('cars.create') }}" class="btn btn-success me-3">Создать машину</a>
                <a href="{{ route('cars.trashed') }}" class="btn btn-warning">Перейти в удаленные</a>
            </div>
        @endauth
        <div class="list-group">
            @forelse ($cars ?? [] as $car)
                <div class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="mb-1">{{ $car->brand->name }} {{ $car->model }}</h5>
                        <p class="mb-1 text-muted">Цена: {{ $car->price }} ₽</p>
                    </div>
                    <div class="d-flex">
                        <a href="{{ route('cars.show', [$car]) }}" class="btn btn-primary me-2">Посмотреть</a>
                        @auth
                            <a href="{{ route('cars.edit', [$car]) }}" class="btn btn-secondary">Редактировать</a>
                        @endauth
                    </div>
                </div>
            @empty
                <p class="text-center text-muted">Нет доступных машин.</p>
            @endforelse
        </div>
</x-layouts.main>
