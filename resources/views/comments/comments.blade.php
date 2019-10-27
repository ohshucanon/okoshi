<ul class="list-unstyled">
    @foreach($comments as $comment)
        <li class="media col-sm-12 p-2 mb-2 border border-success rounded">
            <img class="mr-2 rounded-circle" src="{{ Gravatar::src($comment->user->email, 50) }}" alt="">
            <div class="media-body">
                <div class="border-bottom m-0">
                      <h6 class="d-inline-block text-muted">
                          @if(Auth::check())
                              {!! link_to_route('users.show', $comment->user->name, ['id' => $comment->user->id]) !!}
                          @else
                              {{ $comment->user->name }}
                          @endif
                        ／{{ $comment->user->activitybase }}</h6>
                       
                </div>
                <div>
                    <p class="text-muted">{!! nl2br(e($comment->comment)) !!}</p>
                    <p class="text-muted text-right mb-0">{{ $comment->created_at }}</p>
                </div>
                <div>
                    @if (Auth::id() == $comment->user_id)
                        {!! Form::open(['route' => ['comments.destroy', $comment->id, $topic->id], 'method' => 'delete']) !!}
                            {!! Form::submit('削　除', ['class' => 'btn btn-outline-danger float-right']) !!}
                        {!! Form::close() !!}
                    @endif
                </div>
            </div>
        </li>
    @endforeach
</ul>
        