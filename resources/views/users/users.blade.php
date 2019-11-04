@if (count($users) > 0)
    <ul class="list-unstyled">
        @foreach($users as $user)
            <li class="media col-sm-10 p-2 mb-2 border border-success rounded">
                <img class="mr-2 rounded-circle" src="{{ Gravatar::src($user->email, 65) }}" alt="">
                <div class="media-body">
                    <div>
                        <p>名前：{{ $user->name }}</p>
                    </div>
                    <div>
                        <p>活動エリア：{{ $user->activityarea }}</p>
                    </div>
                    <div>
                        <p>活動拠点：{{ $user->activitybase }}</p>
                    </div>
                    <div>
                        {!! link_to_route('users.show', 'プロフィール', ['id' => $user->id]) !!}
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
    {{ $users->links('pagination::bootstrap-4') }}
@endif