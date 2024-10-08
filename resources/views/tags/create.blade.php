<x-layouts.main>
    <a href="{{ route('tags.index') }}">К тегам</a>
    <form action="{{ !isset($brand) ? route('tags.store') : route('tags.update', compact('brand')) }}" method="POST"
        class="form mb-2">
        @csrf
        @if (isset($tag))
            @method('put')
        @endif
        <x-inputs.input type="text" name="name" value="{{ isset($tag) ? $tag->name : '' }}" label="Название тега" />
        <button>{{ isset($tag) ? 'Обновить тег' : 'Создать тег' }}</button>
    </form>
    @if (isset($tag))
        <form action="{{ route('tags.destroy', compact('brand')) }}" method="POST">
            @method('delete')
            @csrf
            <button>Удалить тег</button>
        </form>
    @endif
</x-layouts.main>
