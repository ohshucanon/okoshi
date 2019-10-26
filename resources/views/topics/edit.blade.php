@extends('layouts.app')

@section('content')

    <div>
        <h3 class="text-muted"><i class="far fa-edit"></i>投稿編集フォーム</h3>
    </div>
    
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            @if (Auth::check())
                {!! Form::model($topic, ['route' => ['topics.update', $topic->id], 'method' => 'put']) !!}
                    <div class="form-group text-muted">
                        {!! Form::label('title', 'タイトル(50文字以内)') !!}
                        {!! Form::text('title', old('title'), ['class' => 'form-control']) !!}
                        {!! Form::label('content', '本文(800文字以内)') !!}
                        {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '10']) !!}
                    </div>
                    {!! Form::submit('編集完了', ['class' => 'btn btn-success']) !!}
                {!! Form::close() !!}
            @endif
        </div>
    </div>
@endsection