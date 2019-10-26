@extends('layouts.app')

@section('content')
<h3 class="text-muted"><i class="fas fa-users"></i>登録者一覧</h3>
    @include('users.users', ['users' => $users])
@endsection