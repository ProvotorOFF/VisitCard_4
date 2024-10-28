<x-layouts.main>
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="mb-3">
        <h5>Бренд: {{ $brand->name }}</h5>
    </div>
    <form action="{{ route('comments.store_brand', ['brand' => $brand]) }}" method="post" class="mb-3">
        @csrf
        <div class="mb-3">
            <label for="text" class="form-label">Ваш комментарий</label>
            <textarea name="text" id="text" cols="30" rows="5" class="form-control"></textarea>
            @error('text')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <button class="btn btn-primary">Комментировать</button>
    </form>

    @if ($brand->comments && count($brand->comments) > 0)
        <h6>Комментарии:</h6>
        <ul class="list-group">
            @foreach ($brand->comments as $comment)
                <li class="list-group-item">
                    {{ $comment->id }} - {{ $comment->text }}
                </li>
            @endforeach
        </ul>
    @else
        <p>Комментариев нет.</p>
    @endif
</x-layouts.main>
