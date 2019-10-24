<ul class="nav nav-tabs nav-justified mb-3">
    <li class="nav-item"><a href="{{ route('users.usersdetails', ['id' => $user->id]) }}" class="nav-link {{ Request::is('users/' . $user->id . '/usersdetails') ? 'active' : '' }}">ユーザー詳細</a></li>
    <li class="nav-item"><a href="{{ route('users.show', ['id' => $user->id]) }}" class="nav-link {{ Request::is('users/' . $user->id) ? 'active' : '' }}">投稿一覧 <span class="badge badge-secondary">{{ $count_topics }}</span></a></li>
    <li class="nav-item"><a href="{{ route('users.favorites', ['id' => $user->id]) }}" class="nav-link {{ Request::is('users/' . $user->id . '/favorites') ? 'active' : '' }}">お気に入り一覧 <span class="badge badge-secondary">{{ $count_favorites }}</span></a></li>
</ul>