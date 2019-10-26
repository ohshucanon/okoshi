@extends('layouts.app')

@section('content')
    <div>
        <h3 class="text-muted"><i class="fas fa-sign-in-alt"></i>ログイン</h3>
    </div>
    
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            {!! Form::open(['route' => 'login.post']) !!}
                <div class="form-group text-muted">
                    {!! Form::label('email', 'メールアドレス') !!}
                    {!! Form::text('email', old('email'), ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group text-muted">
                    {!! Form::label('password', 'パスワード') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>
                
                {!! Form::submit('ログインする', ['class' => 'btn btn-success']) !!}
            {!! Form::close() !!}
            
            <p class="mt-2">登録がまだの方はこちらから→ {!! link_to_route('signup.get', '会員登録') !!}</p>
        </div>
    </div>
@endsection