@props(['model', 'id'])

<form action="{{ route('comments.store') }}" method="post" class="mb-3">
    @csrf
    <input type="hidden" name="model" value="{{ $model }}">
    <input type="hidden" name="id" value ="{{ $id }}">
    <div class="mb-3">
        <label for="text" class="form-label">Ваш комментарий</label>
        <textarea name="text" id="text" cols="30" rows="5" class="form-control"></textarea>
        @error('text')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <button class="btn btn-primary">Комментировать</button>
</form>
