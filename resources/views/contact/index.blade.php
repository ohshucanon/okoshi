@extends('layouts.app')

@section('content')

    <div>
        <h3 class="text-muted"><i class="far fa-paper-plane"></i>問い合わせフォーム</h3>
    </div>
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            {!! Form::open(['route' => 'contact.confirm']) !!}    
            　　{{ csrf_field() }}
                <div class="mb-2 text-muted">
                    {!! Form::label('email', 'メールアドレス') !!}
                    {!! Form::text('email', old('email'), ['class' => 'form-control', 'text-muted']) !!}
                    @if ($errors->has('email'))
                        <p class="error-message">{{ $errors->first('email') }}</p>
                    @endif
                
                    {!! Form::label('title', 'タイトル') !!}
                    {!! Form::text('title', old('title'), ['class' => 'form-control', 'text-muted']) !!}
                    @if ($errors->has('title'))
                        <p class="error-message">{{ $errors->first('title') }}</p>
                    @endif
                
                    {!! Form::label('body', 'お問い合わせ内容') !!}
                    {!! Form::textarea('body', old('body'), ['class' => 'form-control', 'rows' => '8', 'text-muted']) !!}
                    @if ($errors->has('body'))
                        <p class="error-message">{{ $errors->first('body') }}</p>
                    @endif
                </div>
                <div>
                    {!! Form::submit('入力内容確認', ['class' => 'btn btn-success']) !!}
                </div>    
            {!! Form::close() !!}
        </div>
    </div>
@endsection