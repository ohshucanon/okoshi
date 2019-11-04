@extends('layouts.app')

@section('content')
<h3 class="text-muted"><i class="fas fa-users"></i>登録者一覧</h3>
    <div class="row">
        <div class="col-sm-9">
            @include('users.users', ['users' => $users])
        </div>
        <div class="col-sm-3">
            <aside class="">
                <form action="{{ action('UsersController@index') }}" method="get">
                    <div class="form-group">
                        <div class="selectbox mb-2 text-muted">
                            <h5><i class="fas fa-search"></i>活動エリア検索</h5>
                            {!! Form::select('activityarea', ['北海道'=>'北海道', '東北'=>'東北', '関東'=>'関東', '中部'=>'中部', '近畿'=>'近畿', '中国'=>'中国', '四国'=>'四国', '九州'=>'九州', '沖縄'=>'沖縄'], null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="submit">
                            <input class="btn btn-outline-success"type="submit" value="検索">
                        </div>
                    </div>
                </form>
            </aside>
        </div>
    </div>
@endsection