@extends('layouts.app')

@section('content')
    @if(Auth::check())
        <div class="row">
            <aside class="col-sm-2">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ Auth::user()->name }}</h3>
                    </div>
                    <div class="card-body">
                        <img class="rounded-circle img-fluid" src="{{ Gravatar::src(Auth::user()->email, 250) }}" alt="">
                    </div>
                </div>
            </aside>
            <div class="col-sm-10">
                @if (count($topics) > 0)
                    @include('topics.topics', ['topics' => $topics])
                @endif
            </div>
        </div>
    @else
        <div class="center jumbotron">
            <div class="text-center mb-5">
                <h1 class="mb-5">地域おこし協力隊のための交流ツール【OKOSHI】</h1>
                {!! link_to_route('signup.get', '投稿するには会員登録が必要です', [], ['class' => 'btn btn-success btn-lg']) !!}
            </div>
            <div class="text-center">
                 <h3>What's {!! link_to('what_is_okoshi', '【OKOSHI】') !!}?</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-10 offset-sm-2">
                @if (count($topics) > 0)
                    @include('topics.topics', ['topics' => $topics])
                @endif
            </div>
        </div>
    @endif
@endsection