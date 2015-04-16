@extends('layouts.default')

@section('content')

    <div class="row">
        <div class="col-md-12">
            @include('includes.alert')
            <div class="box box-info">

                {{ Form::open(['route' => 'result.store', 'method' => 'post', 'class' => 'form-signin','files' => true]) }}
                <div class="box-body">
                    <div class="form-group">
                        {{ Form::label('title', 'Result Title', array('class' => 'control-label')) }}

                        {{ Form::text('title', '', array('class' => 'form-control', 'placeholder' => 'Result Title', 'autofocus')) }}

                    </div>


                    <div class="form-group">
                        {{ Form::label('description', 'Result Description', array('class' => 'control-label')) }}
                        {{ Form::textarea('description', '', array('class' => 'form-control', 'placeholder' => 'Notice Description','id'=>'editor')) }}

                    </div>
                    <div class="form-group">
                        {{ Form::label('result_file', 'Result Upload (×Only PDF File)') }}
                        {{ Form::file('result_file', array('class' => 'form-control')) }}
                    </div>
                </div>
                <div class="box-footer">
                    {{ Form::submit('Publish Result', array('class' => 'btn btn-success')) }}
                </div>
                {{ Form::close() }}
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








