@extends('layouts.default')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="col-md-6 col-md-offset-3">
                @include('includes.alert')
                <div class="box box-info">

                    {{ Form::open(['route' => 'about.store', 'method' => 'post', 'class' => 'form-signin']) }}
                    <div class="box-body">
                        <div class="form-group">
                            {{ Form::label('description', 'About Us Description', array('class' => 'control-label')) }}
                            {{ Form::textarea('description', '', array('class' => 'form-control', 'placeholder' => 'About Us Description','id'=>'editor')) }}

                        </div>

                    </div>
                    <div class="box-footer text-center">
                        {{ Form::submit('Create About Us', array('class' => 'btn btn-success')) }}
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

@stop


@section('script')

    {{ HTML::script('js/ckeditor/ckeditor.js') }}

    <script>
        CKEDITOR.replace( 'editor', {
        } );
    </script>
@stop







