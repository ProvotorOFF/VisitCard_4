<x-layouts.main>
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="mb-3">
        <h5>Тег: {{ $tag->name }}</h5>
    </div>
</x-layouts.main>
