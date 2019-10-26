@extends('layouts.app')

@section('content')
    <div>
        <h3 class="text-muted"><i class="fas fa-user-plus"></i>ユーザー情報編集</h3>
    </div>
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'put']) !!}
                <div class="form-group text-muted">
                    {!! Form::label('name', '名前(ニックネーム可)') !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group text-muted">
                    {!! Form::label('activitybase', '活動拠点(例:東京都○○市地域おこし協力隊)') !!}
                    {!! Form::text('activitybase', old('activitybase'), ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group text-muted">
                    {!! Form::label('email', 'メールアドレス') !!}
                    {!! Form::text('email', old('email'), ['class' => 'form-control']) !!}
                </div>
                
                {!! Form::submit('編集完了', ['class' => 'btn btn-success']) !!}
            {!! Form::close() !!}
            
        </div>
    </div>

@endsection