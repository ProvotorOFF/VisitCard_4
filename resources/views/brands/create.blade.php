<x-layouts.main h1="Редактировать бренд" title="Редактировать бренд">
    <a href="{{ route('brands.index') }}">К брендам</a>
    <form action="{{ !isset($brand) ? route('brands.store') : route('brands.update', compact('brand')) }}" method="POST"
        class="form mb-2">
        @csrf
        @if (isset($brand))
            @method('put')
        @endif
        <x-inputs.input type="text" name="name" value="{{ isset($brand) ? $brand->name : '' }}" label="Название бренда" />
        <button class="btn btn-success">{{ isset($brand) ? 'Обновить бренд' : 'Создать бренд' }}</button>
    </form>
    @if (isset($brand))
        <form action="{{ route('brands.destroy', compact('brand')) }}" method="POST">
            @method('delete')
            @csrf
            <button class="btn btn-danger">Удалить Бренд</button>
        </form>
    @endif
</x-layouts.main>
