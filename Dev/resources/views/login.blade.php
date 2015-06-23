<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>DeathmatchZ Admin Login</title>
    <meta content="width=device-width, initial-scale=1.0, user-scalable=no" name="viewport">
    <script src="{{ asset('js/html5-trunk.js') }}"></script>
    <link href="{{ asset('icomoon/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>
<body>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span4 offset4">
            <div class="signin">
                <h1 class="center-align-text">Dev Login</h1>
                <form action="{{ asset('/login') }}" class="signin-wrapper" method="post">
                    <div class="content">
                        <input class="input input-block-level" name="email" placeholder="Email" type="email" value="">
                        <input class="input input-block-level" name="password" placeholder="Password" type="password">
                        <input type="hidden" name="_token" type="CSRFToken" value="{{{ csrf_token() }}}" />
                    </div>
                    @if(Session::has('incorrectPassword'))
                        <div class="alert alert-block alert-error fade in">
                            <button data-dismiss="alert" class="close" type="button">×</button>
                            <h4 class="alert-heading">Error! </h4>
                            <p>Login Denied! Insecure password!</p>
                        </div>
                    @endif
                    <div class="actions">
                        <input class="btn btn-info pull-right" type="submit" value="Login">
                        <div class="clearfix"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<footer>
  <p class="copyright">&copy; DeathmatchZ Admin Panel - <a href="http://drwhat.co/">DrWhat</a></p>
</footer>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>
</body>
</html>