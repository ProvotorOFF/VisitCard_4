<x-layouts.main>
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <a href="{{ route('tags.index') }}">К тегам</a>

    <div>Бренд: {{ $tag->name }}</div>
</x-layouts.main>
