<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<div class="col-md-offset-2 col-md-8">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h5>登录</h5>
        </div>
        <div class="panel-body">
            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if(session()->has($msg))
                    <div class="flash-message">
                        <p class="alert alert-{{ $msg }}">
                            {{ session()->get($msg) }}
                        </p>
                    </div>
                @endif
            @endforeach
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="email">邮箱：</label>
                    <input type="text" name="email" class="form-control" value="{{ old('email') }}">
                </div>

                <div class="form-group">
                    <label for="password">密码：</label>
                    <input type="password" name="password" class="form-control" value="{{ old('password') }}">
                </div>


                <div class="checkbox">
                    <label><input type="checkbox" name="remember"> 记住我</label>
                </div>

                <button type="submit" class="btn btn-primary">登录</button>
            </form>

            <hr>

            <p>还没账号？<a href="{{ route('signup') }}">现在注册！</a></p>
        </div>
    </div>
</div>
</body>
</html>