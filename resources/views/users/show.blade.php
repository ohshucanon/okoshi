@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-2">
            <div class="card">
                <div class="card-header text-center">
                    <h3 class="card-title">{{ $user->name }}</h3>
                </div>
                <div class="card-body">
                    <img class="rounded-circle img-fluid" src="{{ Gravatar::src($user->email, 300) }}" alt="">
                </div>
            </div>
        </aside>
        <div class="col-sm-10">
            @include('users.navtabs')
            
            @if (count($topics) > 0)
                @include('topics.topics', ['topics' => $topics])
            @endif
        </div>
    </div>
@endsection