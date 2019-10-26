<ul class="list-unstyled">
    @foreach($topics as $topic)
        <li class="media col-sm-10 p-2 mb-2 border border-success rounded">
            <img class="mr-2 rounded-circle" src="{{ Gravatar::src($topic->user->email, 50) }}" alt="">
            <div class="media-body">
                <div>
                    <h4 class="mb-0"><a class="inline-block" href="{{ route('topics.topicsdetails', ['id' => $topic->id]) }}">{!! nl2br(e($topic->title)) !!}</a></h4>
                    <!--<p class="mb-0">{!! nl2br(e($topic->content)) !!}</p>-->
                </div>
                <div>
                    <p class="mb-0 text-right text-muted">{{ $topic->user->activitybase }}／
                    @if(Auth::check())
                        {!! link_to_route('users.show', $topic->user->name, ['id' => $topic->user->id]) !!}
                    @else
                        {{ $topic->user->name }}
                    @endif
                    ／{{ $topic->user->created_at }}</p>
                </div>
                <div class="col-12 clearfix">
                    <div class="row float-right">
                        @if (Auth::check())
                            @include('favorite.favorite_button', ['topic' => $topic])
                        @endif
                        @if (Auth::id() == $topic->user_id)
                            {!! Form::open(['route' => ['topics.destroy', $topic->id], 'method' => 'delete']) !!}
                                {!! Form::submit('削  除', ['class' => 'btn btn-outline-danger btn-sm float-right']) !!}
                            {!! Form::close() !!}
                        @endif
                    </div>
                </div>
            </div>
        </li>
    @endforeach
</ul>
{{ $topics->links('pagination::bootstrap-4') }}