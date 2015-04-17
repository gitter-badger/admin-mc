@extends('layouts.default')

@section('content')

    <div class="row">
        <div class="col-md-12">
            @include('includes.alert')
            <div class="box box-info">

                {{ Form::open(['route' => 'result.store', 'method' => 'post', 'class' => 'form-signin','files' => true]) }}
                <div class="box-body">
                    <div class="form-group">
                        {{ Form::label('title', 'Contact Email Address', array('class' => 'control-label')) }}
                        {{ Form::text('title', '', array('class' => 'form-control', 'placeholder' => 'Contact Email Address', 'autofocus')) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('title', 'Contact Phone/Mobile', array('class' => 'control-label')) }}
                        {{ Form::text('title', '', array('class' => 'form-control', 'placeholder' => 'Contact Phone/Mobile', 'autofocus')) }}
                    </div>


                    <div class="form-group">
                        {{ Form::label('description', 'Postal Address', array('class' => 'control-label')) }}
                        {{ Form::textarea('description', '', array('class' => 'form-control', 'placeholder' => 'Postal Address','id'=>'editor')) }}

                    </div>



                </div>
                <div class="box-footer">
                    {{ Form::submit('Save', array('class' => 'btn btn-success')) }}
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








