<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{$title or 'Admin'}} - {{Config::get('customConfig.siteName')}}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    {{HTML::style('bootstrap/css/bootstrap.min.css')}}

    {{HTML::style('css/font-awesome.min.css')}}

    {{HTML::style('dist/css/AdminLTE.min.css')}}


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body class="login-page">

<div class="login-box">
    @include('includes.alert')
    <div class="login-logo">
        <a href="{{route('dashboard')}}"><b>SUST </b>ADMISSION</a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        {{Form::open(['route'=>'doLogin', 'method'=> 'post','role'=>'form'])}}
            <div class="form-group has-feedback">
                {{Form::email('email',null,['class'=>'form-control','placeholder'=>'E-mail'])}}

                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                {{Form::password('password',['class'=>'form-control','placeholder'=>'Password'])}}
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">

                <div class="col-xs-4">
                    {{Form::submit('Sign In',['class'=> 'btn btn-primary btn-block btn-flat'])}}
                </div><!-- /.col -->
            </div>
        {{Form::close()}}


    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->

{{HTML::script('js/jquery.min.js')}}
{{HTML::script('bootstrap/js/bootstrap.min.js')}}

</body>
</html>