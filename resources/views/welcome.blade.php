@extends('layouts.app')

@section('content')
    @if(Auth::check())
    <div class="p-3 m-3">
        <div class="text-center mb-3">
            <h1 class="mb-3 mt-4 text-muted">地域おこし協力隊のための交流ツール【OKOSHI】</h1>
        </div>
    </div>
            
    <div class="text-left">
        <h5 class="text-muted"><i class="fas fa-file-alt"></i> 投稿一覧</h5>
    </div>
        <div class="row">
            <!--<aside class="col-sm-2">
                <div class="card">
                    <div class="card-header text-center">
                        <h3 class="card-title">{{ Auth::user()->name }}</h3>
                    </div>
                    <div class="card-body">
                        <img class="rounded-circle img-fluid" src="{{ Gravatar::src(Auth::user()->email, 250) }}" alt="">
                    </div>
                </div>
            </aside>-->
            <div class="col-sm-9 pr-0">
                @if (count($topics) > 0)
                    @include('topics.topics', ['topics' => $topics])
                @endif
            </div>
            <div class="col-sm-3">
                <aside class="">
                    <form action="{{ action('TopicsController@index') }}" method="get">
                        <div class="form-group">
                            <div class="selectbox mb-2 text-muted">
                                <h5><i class="fas fa-search"></i>投稿ジャンル別検索</h5>
                                {!! Form::select('topics_genre', ['活動報告'=>'活動報告', '意見募集'=>'意見募集', '交流'=>'交流', '雑談'=>'雑談', 'その他'=>'その他'], null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="submit">
                                <input class="btn btn-outline-success"type="submit" value="検索">
                            </div>
                        </div>
                    </form>
                </aside>
            </div>
        </div>
    @else
        <!--<div class="center jumbotron p-5"-->
        <div class="p-3 m-3">
            <div class="text-center mb-3">
                <h1 class="mb-3 mt-4 text-muted">地域おこし協力隊のための交流ツール【OKOSHI】</h1>
                {!! link_to_route('signup.get', '投稿するには会員登録が必要です', [], ['class' => 'btn btn-success btn-lg']) !!}
            </div>
            <div class="text-center text-muted mb-3 mt-3">
                 <h3>What's {!! link_to('what_is_okoshi', '【OKOSHI】') !!}?</h3>
            </div>
        </div>
        
        <div class="text-left">
            <h5 class="text-muted"><i class="fas fa-file-alt"></i> 投稿一覧</h5>
        </div>
        <div class="row">
            <div class="col-sm-9 pr-0">
                @if (count($topics) > 0)
                    @include('topics.topics', ['topics' => $topics])
                @endif
            </div>
            <div class="col-sm-3">
                <aside class="">
                    <form action="{{ action('TopicsController@index') }}" method="get">
                        <div class="form-group">
                            <div class="selectbox mb-2 text-muted">
                                <h5><i class="fas fa-search"></i>投稿ジャンル別検索</h5>
                                {!! Form::select('topics_genre', ['活動報告'=>'活動報告', '意見募集'=>'意見募集', '交流'=>'交流', '雑談'=>'雑談', 'その他'=>'その他'], null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="submit">
                                <input class="btn btn-outline-success"type="submit" value="検索">
                            </div>
                        </div>
                    </form>
                </aside>
            </div>
        </div>
    @endif
@endsection