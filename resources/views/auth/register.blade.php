@extends('layouts.app')

@section('content')
    <div>
        <h3 class="text-muted"><i class="fas fa-user-plus"></i>ユーザー登録</h3>
    </div>
    
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            {!! Form::open(['route' => 'signup.post']) !!}
                <div class="form-group text-muted">
                    {!! Form::label('name', '名前(ニックネーム可)') !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group text-muted">
                    {!! Form::label('activityarea', '活動エリア') !!}
                    {!! Form::select('activityarea', ['北海道'=>'北海道', '東北'=>'東北', '関東'=>'関東', '中部'=>'中部', '近畿'=>'近畿', '中国'=>'中国', '四国'=>'四国', '九州'=>'九州', '沖縄'=>'沖縄'], null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group text-muted">
                    {!! Form::label('activitybase', '活動拠点(例:東京都○○市地域おこし協力隊)') !!}
                    {!! Form::text('activitybase', old('activitybase'), ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group text-muted">
                    {!! Form::label('email', 'メールアドレス') !!}
                    {!! Form::text('email', old('email'), ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group text-muted">
                    {!! Form::label('password', 'パスワード(6文字以上)') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group text-muted">
                    {!! Form::label('password_confirmation', 'パスワード確認') !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                </div>
                {!! Form::submit('登録する', ['class' => 'btn btn-success']) !!}
            {!! Form::close() !!}
            
        </div>
    </div>
@endsection