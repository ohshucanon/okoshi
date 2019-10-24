@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-2">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $user->name }}</h3>
                </div>
                <div class="card-body">
                    <img class="rounded-circle img-fluid" src="{{ Gravatar::src($user->email, 300) }}" alt="">
                </div>
            </div>
        </aside>
        <div class="col-sm-10">
           @include('users.navtabs')
            <div class="col-sm-10 p-2 mb-2 border border-success rounded">
                <h3 class="mb-5">ID：{{ $user->id }}</h3>
                <h3 class="mb-5">名前：{{ $user->name }}</h3>
                <h3 class="mb-2">活動拠点：{{ $user->activitybase }}</h3>
            </div>
        </div>
    </div>
@endsection