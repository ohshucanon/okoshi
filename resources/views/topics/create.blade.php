@extends('layouts.app')

@section('content')
    <div>
        <h3>投稿フォーム</h3>
    </div>
    
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            @if (Auth::check())
                {!! Form::open(['route' => 'topics.store']) !!}
                    <div class="form-group">
                        {!! Form::label('title', 'タイトル(50文字以内)') !!}
                        {!! Form::text('title', old('title'), ['class' => 'form-control']) !!}
                        {!! Form::label('content', '本文(800文字以内)') !!}
                        {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '5']) !!}
                    </div>
                    {!! Form::submit('投稿する', ['class' => 'btn btn-success']) !!}
                {!! Form::close() !!}
            @endif
        </div>
    </div>
@endsection