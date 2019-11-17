<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-dark bg-success"> 
        <a class="navbar-brand" href="/">OKOSHI</a>
         
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                @if (Auth::check())
                    <li class="nav-item">{!! link_to_route('topics.create', '投稿', [], ['class' => 'nav-link active']) !!}</li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle active" data-toggle="dropdown">ユーザー情報</a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li class="dropdown-item">{!! link_to_route('users.show', 'ユーザー詳細', ['id' => Auth::id()]) !!}</li>
                            <li class="dropdown-divider"></li>
                            <li class="dropdown-item">{!! link_to_route('logout.get', 'ログアウト') !!}</li>
                        </ul>
                    </li>
                    <li class="nav-item">{!! link_to_route('users.index', '登録者一覧', [], ['class' => 'nav-link active']) !!}</li>
                    <li class="nav-item">{!! link_to_route('contact.index', '問い合わせ', [], ['class' => 'nav-link active']) !!}</li>
                
                @else
                
                    <li class="nav-item">{!! link_to_route('signup.get', '登録', [], ['class' => 'nav-link active']) !!}</li>
                    <li class="nav-item">{!! link_to_route('login', 'ログイン', [], ['class' => 'nav-link active']) !!}</li>
                
                @endif
            </ul>
        </div>
    </nav>
    @if (Auth::check())
        <div class="text-right bg-success">
            <h5 class="text-light">こんにちは、{{Auth::user()->name}}さん</h5>
        </div>
    @endif
</header>