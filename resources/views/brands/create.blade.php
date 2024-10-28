<x-layouts.main>
    <div class="d-flex justify-content-center">
        <form action="{{ !isset($brand) ? route('brands.store') : route('brands.update', compact('brand')) }}" method="POST" class="form mb-2 w-25">
            @csrf
            @if (isset($brand))
                @method('put')
            @endif
            <x-inputs.input type="text" name="name" value="{{ isset($brand) ? $brand->name : '' }}" label="Название бренда" />
            <div class="text-center">
                <button class="btn btn-success mt-2">{{ isset($brand) ? 'Обновить бренд' : 'Создать бренд' }}</button>
            </div>
        </form>
    </div>
    @if (isset($brand))
        <div class="d-flex justify-content-center">
            <form action="{{ route('brands.destroy', compact('brand')) }}" method="POST">
                @method('delete')
                @csrf
                <button class="btn btn-danger">Удалить Бренд</button>
            </form>
        </div>
    @endif
</x-layouts.main>
