<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{$title or 'Admin'}} - {{Config::get('customConfig.siteName')}}</title>


    {{HTML::style('bootstrap/css/bootstrap.min.css')}}

    {{HTML::style('css/font-awesome.min.css')}}

    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />

    {{HTML::style('dist/css/AdminLTE.min.css')}}

    {{HTML::style('dist/css/skins/skin-blue.min.css')}}
    @yield('style')

    {{ HTML::script('js/jquery.min.js') }}
    {{ HTML::script('js/ckeditor/ckeditor.js') }}
    {{ HTML::script('js/jquery.nestable.js') }}

    @yield('script')

    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <sc
    <![endif]-->

</head>
