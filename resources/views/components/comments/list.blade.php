@props(['model'])
<div>
    @if ($model->comments && count($model->comments) > 0)
        <h6>Комментарии:</h6>
        <ul class="list-group">
            @foreach ($model->comments as $comment)
                <li class="list-group-item">
                    {{ $comment->id }} - {{ $comment->text }}
                </li>
            @endforeach
        </ul>
    @else
        <p>Комментариев нет.</p>
    @endif
</div>
