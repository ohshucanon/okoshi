@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-10 offset-sm-1">
            <ul class="list-unstyled">
                <li class="media col-sm-12 p-2 mb-2 border border-success rounded">
                    <img class="mr-2 rounded-circle" src="{{ Gravatar::src($topic->user->email, 50) }}" alt="">
                    <div class="media-body">
                        <div>
                            <h4 class="mb-4">{!! nl2br(e($topic->title)) !!}</h4>
                            <p class="mb-4">{!! nl2br(e($topic->content)) !!}</p>
                            <p class="mb-0 text-right">{{ $topic->user->activitybase }}／
                            @if(Auth::check())
                                {!! link_to_route('users.show', $topic->user->name, ['id' => $topic->user->id]) !!}
                            @else
                                {{ $topic->user->name }}
                            @endif
                            ／{{ $topic->user->created_at }}</p>
                            <div class="col-12 clearfix">
                                <div class="row float-right">
                                    @if (Auth::check())
                                        @include('favorite.favorite_button', ['topic' => $topic])
                                    @endif
                                    @if (Auth::id() == $topic->user_id)
                                        {!! Form::open(['route' => ['topics.destroy', $topic->id], 'method' => 'delete']) !!}
                                            {!! Form::submit('削　除', ['class' => 'btn btn-outline-danger btn-sm']) !!}
                                        {!! Form::close() !!}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            @if(Auth::check())
                <div class="col-sm-10 mb-4">
                    {!! Form::open(['route' => ['comments.store', $topic->id]]) !!}
                        <div class="form-group">
                            {!! Form::label('comment', 'コメント(500文字まで)') !!}
                            {!! Form::textarea('comment', old('comment'), ['class' => 'form-control', 'rows' => '3']) !!}
                        </div>
                        {!! Form::submit('コメント投稿', ['class' => 'btn btn-success']) !!}
                    {!! Form::close() !!}
                </div>
            @else
                <h6>{!! link_to_route('login.get', '※コメントを投稿するにはログインが必要です', [], ['class' => 'btn btn-success btn-sm']) !!}</h6>
            @endif
            <div class="col-sm-10">
                @if (count($comments) >0)
                   <h6>コメント一覧</h6>
                   @include('comments.comments',['comments' => $comments, 'topic' => $topic])
                @endif
            </div>
        </div>
    </div>
@endsection