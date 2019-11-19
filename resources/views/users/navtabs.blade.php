<ul class="nav nav-tabs nav-justified mb-3">
    <li class="nav-item"><a href="{{ route('users.usersdetails', ['id' => $user->id]) }}" class="nav-link {{ Request::is('users/' . $user->id . '/usersdetails') ? 'active' : '' }}"><i class="fas fa-user"></i> ユーザー詳細</a></li>
    <li class="nav-item"><a href="{{ route('users.show', ['id' => $user->id]) }}" class="nav-link {{ Request::is('users/' . $user->id) ? 'active' : '' }}"><i class="fas fa-file-alt"></i> 投稿一覧 <span class="badge badge-light">{{ $count_topics }}</span></a></li>
    <li class="nav-item"><a href="{{ route('users.favorites', ['id' => $user->id]) }}" class="nav-link {{ Request::is('users/' . $user->id . '/favorites') ? 'active' : '' }}"><i class="fas fa-hand-holding-heart"></i>お気に入り一覧 <span class="badge badge-light">{{ $count_favorites }}</span></a></li>
</ul>