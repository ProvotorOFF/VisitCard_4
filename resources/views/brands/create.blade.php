<x-layouts.main>
    <a href="{{ route('brands.index') }}">На главную</a>
    <form action="{{ !isset($brand) ? route('brands.store') : route('brands.update', compact('brand')) }}" method="POST"
        class="form mb-2">
        @csrf
        @if (isset($brand))
            @method('put')
        @endif
        <x-inputs.input type="text" name="name" value="{{ isset($brand) ? $brand->name : '' }}" label="Название бренда" />
        <button>{{ isset($brand) ? 'Обновить бренд' : 'Создать бренд' }}</button>
    </form>
    @if (isset($brand))
        <form action="{{ route('brands.destroy', compact('brand')) }}" method="POST">
            @method('delete')
            @csrf
            <button>Удалить Бренд</button>
        </form>
    @endif
</x-layouts.main>
