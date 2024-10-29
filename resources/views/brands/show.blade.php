<x-layouts.main>
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="mb-3">
        <h5>Бренд: {{ $brand->name }}</h5>
    </div>
    <x-comments.form model="brand" id="{{ $brand->id }}" />
    <x-comments.list :model="$brand" />
</x-layouts.main>
