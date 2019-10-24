
@if (Auth::user()->is_favorite($topic->id))
    {!! Form::open(['route' => ['favorites.unfavorite', $topic->id], 'method' => 'delete']) !!}
        {!! Form::submit('お気に入り解除', ['class' => "btn btn-primary btn-sm mr-2"]) !!}
    {!! Form::close() !!}
@else
    {!! Form::open(['route' => ['favorites.favorite', $topic->id]]) !!}
        {!! Form::submit('お気に入り', ['class' => "btn btn-outline-primary btn-sm mr-2"]) !!}
    {!! Form::close() !!}
@endif

