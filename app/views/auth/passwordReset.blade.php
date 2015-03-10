@extends('layouts.default')

@section('content')
    <div class="login-box">
        @include('includes.alert')
        <div class="login-logo">
            Reset Password
        </div><!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Change your current password</p>
            {{Form::open(['route'=>'doPasswordReset', 'method'=> 'post','role'=>'form'])}}

            <div class="form-group has-feedback">
                {{Form::password('currentPassword',['class'=>'form-control','placeholder'=>'Current Password'])}}
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
                {{Form::password('password',['class'=>'form-control','placeholder'=>'New Password'])}}
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
                {{Form::password('password_confirmation',['class'=>'form-control','placeholder'=>'Retype New Password'])}}
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">

                <div class="col-xs-4">
                    {{Form::submit('Change Password',['class'=> 'btn btn-primary btn-flat'])}}
                </div><!-- /.col -->
            </div>
            {{Form::close()}}


        </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
@stop