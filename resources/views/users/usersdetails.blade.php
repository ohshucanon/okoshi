@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-2">
            <div class="card">
                <div class="card-header text-center">
                    <h3 class="card-title">{{ $user->name }}</h3>
                </div>
                <div class="card-body">
                    <img class="rounded-circle img-fluid" src="{{ Gravatar::src($user->email, 300) }}" alt="">
                </div>
            </div>
        </aside>
        <div class="col-sm-10">
           @include('users.navtabs')
            <div class="col-sm-10 p-2 mb-2 border border-success rounded">
                <h3 class="mb-5 text-muted">名前：{{ $user->name }}</h3>
                <h3 class="mb-5 text-muted">活動エリア：{{ $user->activityarea }}</h3>
                <h3 class="mb-2 text-muted">活動拠点：{{ $user->activitybase }}</h3>
                <div class="clearfix">
                    <div class="float-right">
                        @if(Auth::id() == $user->id)
                            {!! link_to_route('users.edit', 'ユーザー情報を編集', ['id' => $user->id], ['class' => 'btn btn-outline-success']) !!}
                            {!! link_to_route('users.passwordEdit', 'パスワードを変更', ['id' => $user->id], ['class' => 'btn btn-outline-warning']) !!}
                            <input type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#unsubscribeModal" value="退会する">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--退会確認モーダル-->
    <div class="modal fade" id="unsubscribeModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-muted" id="myModalLabel">退会確認画面</h4></h4>
                </div>
                <div class="modal-body text-muted">
                    <label>本当に退会しますか？</label>
                    <p>※退会すると、記事の投稿やコメントが出来なくなります。</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default text-muted" data-dismiss="modal">閉じる</button>
                    {!! Form::model($user, ['route' => ['users.delete', $user->id]]) !!}
                        {!! Form::submit('退会する', ['class' => 'btn btn-danger']) !!}       
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $('.btn btn-outline-danger').click(function(){
            $('#unsubscribeModal').val( $(this).val() );
        });
    </script>
   
@endsection