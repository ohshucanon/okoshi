@extends('layouts.app')

@section('content')
<h3>登録者一覧</h3>
    @include('users.users', ['users' => $users])
@endsection