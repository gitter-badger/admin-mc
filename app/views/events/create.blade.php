@extends('layouts.default')

@section('content')

    <div class="row">
        <div class="col-md-12">
            @include('includes.alert')
            <div class="box box-info">

                {{ Form::open(['route' => 'event.store', 'method' => 'post', 'class' => 'form-signin']) }}
                <div class="box-body">
                    <div class="form-group">
                        {{ Form::label('title', 'Event Title', array('class' => 'control-label')) }}

                        {{ Form::text('title', '', array('class' => 'form-control', 'placeholder' => 'Event Title', 'autofocus')) }}

                    </div>


                    <div class="form-group">
                        {{ Form::label('description', 'Event Description', array('class' => 'control-label')) }}
                        {{ Form::textarea('description', '', array('class' => 'form-control', 'placeholder' => 'Event Description','id'=>'editor')) }}

                    </div>

                    <div class="form-group">
                        {{ Form::label('place', 'Event Place', array('class' => 'control-label')) }}

                        {{ Form::text('place', '', array('class' => 'form-control', 'placeholder' => 'Event Place')) }}

                    </div>
                </div>
                <div class="box-footer">
                    {{ Form::submit('Create Event', array('class' => 'btn btn-success')) }}
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








