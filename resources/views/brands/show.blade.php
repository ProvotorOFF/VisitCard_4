<x-layouts.main>
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <a href="{{ route('brands.index') }}">На главную</a>

    <div>Бренд: {{ $brand->name }}</div>
</x-layouts.main>
