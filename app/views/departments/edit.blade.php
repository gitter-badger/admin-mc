@extends('layouts.default')

@section('content')

    <div class="row">
        <div class="col-md-12">
            @include('includes.alert')
            <div class="col-md-6 col-md-offset-3">
            <div class="box box-info">

                {{Form::model($department,['route' => ['department.update',$department->id], 'class' => 'form-horizontal', 'method' => 'put' ])}}
                <div class="box-body">
                    <div class="form-group">
                        {{ Form::label('name', 'Department Name', array('class' => 'control-label')) }}

                        {{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Department Name', 'autofocus')) }}

                    </div>

                </div>
                <div class="box-footer">
                    {{ Form::submit('Update Department', array('class' => 'btn btn-success')) }}
                </div>
                {{ Form::close() }}
            </div>
            </div>
        </div>
    </div>

@stop










