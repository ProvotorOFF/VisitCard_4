<x-layouts.main>
    <div class="d-flex justify-content-center">
        <form action="{{ !isset($tag) ? route('tags.store') : route('tags.update', compact('tag')) }}" method="POST" class="form mb-2 w-25">
            @csrf
            @if (isset($tag))
                @method('put')
            @endif
            <x-inputs.input type="text" name="name" value="{{ isset($tag) ? $tag->name : '' }}" label="Название тега" />
            <div class="d-flex justify-content-center">
                <button class="btn btn-primary">{{ isset($tag) ? 'Обновить тег' : 'Создать тег' }}</button>
            </div>
        </form>
    </div>
    @if (isset($tag))
        <div class="d-flex justify-content-center">
            <form action="{{ route('tags.destroy', compact('tag')) }}" method="POST">
                @method('delete')
                @csrf
                <button class="btn btn-danger">Удалить тег</button>
            </form>
        </div>
    @endif
</x-layouts.main>
