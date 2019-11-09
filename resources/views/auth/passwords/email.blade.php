@extends('layouts.app')

@section('content')
<div class="container">
     <div>
        <h3 class="text-muted"><i class="far fa-envelope"></i>パスワードリセットメール送信</h3>
    </div>
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            <div class="text-muted">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="col-sm-12">
                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}
    
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="text-muted control-label">登録メールアドレス</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
    
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
    
                        <div class="form-group">
                            <button type="submit" class="btn btn-danger">
                                パスワードリセットメール送信
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
