@extends('layouts.app')

@section('content')
 　 <div>
        <h3 class="text-muted mb-5"><i class="far fa-paper-plane"></i>問い合わせ確認画面</h3>
    </div>
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            {!! Form::open(['route' => 'contact.send']) !!}    
                {{ csrf_field() }}
                <div class="mb-5 text-muted">
                    {!! Form::label('email', 'メールアドレス') !!}<br>
                    {{ $inputs['email'] }}
                    {!! Form::hidden('email', $inputs['email'], ['class' => 'form-control']) !!}
                </div>
                <div class="mb-5 text-muted">
                    {!! Form::label('title', 'タイトル') !!}<br>
                    {{ $inputs['title'] }}
                    {!! Form::hidden('title', $inputs['title'], ['class' => 'form-control']) !!}
　　　　　　　　</div>                
                <div class="mb-5 text-muted">
                    {!! Form::label('body', 'お問い合わせ内容') !!}<br>
                    {!! nl2br(e($inputs['body'])) !!}
                    {!! Form::hidden('body',$inputs['body'] , ['class' => 'form-control', 'rows' => '8']) !!}
                </div>
                <div>
                    <button class="btn btn-success" type="submit" name="action" value="submit">
                        送信する
                    </button>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection