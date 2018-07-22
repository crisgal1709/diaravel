<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name') }}</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="/adminlte/css/bootstrap/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="/adminlte/css/fontawesome/font-awesome.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="/adminlte/css/ionicons/ionicons.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="/adminlte/css/adminlte/AdminLTE.min.css">
    <link rel="stylesheet" href="/adminlte/css/adminlte/_all_skins.min.css">

    <!-- iCheck -->
    <link rel="stylesheet" href="/adminlte/css/icheck/ichek.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body class="hold-transition login-page" style="background-image: url('/front/images/pattern.jpeg')">
<div class="login-box">
    <div class="login-logo">
        <a href="{{ url('/home') }}"><b>{{ config('app.name') }} </b></a>
    </div>

    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form method="post" action="{{ url('/login') }}">
            {!! csrf_field() !!}

            <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                @if ($errors->has('email'))
                    <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>

            <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                <input type="password" class="form-control" placeholder="Password" name="password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @if ($errors->has('password'))
                    <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif

            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox" name="remember"> Remember Me
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        {{-- <a href="{{ url('/password/reset') }}">I forgot my password</a><br>
        <a href="{{ url('/register') }}" class="text-center">Register a new membership</a> --}}

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<script src="/adminlte/js/jquery/jquery.min.js"></script>
    <script src="/adminlte/js/bootstrap/bootstrap.min.js"></script>

    <!-- AdminLTE App -->
    <script src="/adminlte/js/adminlte/adminlte.min.js"></script>

    <script src="/adminlte/js/icheck/icheck.min.js"></script>
    <script src="/adminlte/js/select2/select2.min.js"></script>
    <script src="/adminlte/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/adminlte/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="/adminlte/alertifyjs/alertify.min.js"></script>
    <script src="/js/notify.js"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
</body>
</html>
