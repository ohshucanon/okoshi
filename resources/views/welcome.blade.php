@extends('layouts.app')

@section('content')
    <div class="center jumbotron">
        <div class="text-center">
            <h1>地域おこし協力隊のための交流ツール【OKOSHI】</h1>
            {!! link_to_route('signup.get', '投稿するには会員登録が必要です', [], ['class' => 'btn btn-success btn-lg']) !!}
        </div>
    </div>
@endsection