@extends('layouts.app')

@section('content')
    <div>
        <h3 class="text-muted"><i class="far fa-edit"></i>投稿フォーム</h3>
    </div>
    
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            @if (Auth::check())
                {!! Form::open(['route' => 'topics.store']) !!}
                    <div class="form-group text-muted">
                        {!! Form::label('title', 'タイトル(50文字以内)') !!}
                        {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => '(例1)○○のPRに関して意見募集！／(例2)○○市での活動報告']) !!}
                        <br>
                        {!! Form::label('content', '本文(800文字以内)') !!}
                        {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '10', 'placeholder' => '(例)□□県○○町で地域おこし協力隊の活動を行なっている□□□□と申します。
現在○○町では名産の△△△を有効活用した町のPR活動を行おうと思っているのですが〜…等']) !!}
                        <br>
                        {!! Form::label('topics_genre', '投稿ジャンル') !!}
                        {!! Form::select('topics_genre', ['活動報告'=>'活動報告', '意見募集'=>'意見募集', '交流'=>'交流', '雑談'=>'雑談', 'その他'=>'その他'], null, ['class' => 'form-control']) !!}
                    </div>
                    {!! Form::submit('投稿する', ['class' => 'btn btn-success']) !!}
                {!! Form::close() !!}
            @endif
        </div>
    </div>
@endsection