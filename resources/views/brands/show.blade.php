<x-layouts.main>
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <a href="{{ route('brands.index') }}">К брендам</a>

    <div>Бренд: {{ $brand->name }}</div>
    <form action="{{ route('comments.store_brand', ['brand' => $brand]) }}" method="post">
        @csrf
        <textarea name="text" id="text" cols="30" rows="10"></textarea>
        @error('text')
            <span style="color: red">{{ $message }}</span>
        @enderror
        <button>Комментировать</button>
    </form>
    @error('text')
        {{ $error->message }}
    @enderror
    @if ($brand->comments)
        Комментарии:
        <ul>
            @foreach ($brand->comments as $comment)
                <li>
                    {{ $comment->id }} {{ $comment->text }}
                </li>
            @endforeach
        </ul>
    @endif
</x-layouts.main>
