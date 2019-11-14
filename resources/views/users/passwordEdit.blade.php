@extends('layouts.app')

@section('content')
    <div>
        <h3 class="text-muted"><i class="fas fa-key"></i>パスワード変更</h3>
    </div>
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            {!! Form::model($user, ['route' => ['users.passwordUpdate', $user->id], 'method' => 'put']) !!}
                <div class="form-group text-muted">
                    {!! Form::label('password', 'パスワード(6文字以上)') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group text-muted">
                    {!! Form::label('password_confirmation', 'パスワード確認') !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                </div>
                
                {!! Form::submit('パスワード変更', ['class' => 'btn btn-success']) !!}
            {!! Form::close() !!}
            
        </div>
    </div>

@endsection