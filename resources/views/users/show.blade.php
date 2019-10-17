@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $user->name }}</h3>
                </div>
                <div class="card-body">
                    <img class="rounded-circle img-fluid" src="{{ Gravatar::src($user->email, 400) }}" alt="">
                </div>
            </div>
        </aside>
        <div class="col-sm-8">
            <ul class="nav nav-tabs nav-justified mb-3">
                <li class="nav-item"><a href="#" class="nav-link">ユーザー詳細</a></li>
                <li class="nav-item"><a href="#" class="nav-link">投稿一覧</a></li>
                <li class="nav-item"><a href="#" class="nav-link">お気に入り一覧</a></li>
            </ul>
        </div>
    </div>
@endsection