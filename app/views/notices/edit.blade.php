@extends('layouts.default')

@section('content')

    <div class="row">
        <div class="col-md-12">
            @include('includes.alert')
            <div class="box box-info">

                {{ Form::open(['route' => ['notice.update',$notice->id], 'method' => 'put', 'class' => 'form-signin']) }}
                <div class="box-body">
                    <div class="form-group">
                        {{ Form::label('title', 'Notice Title', array('class' => 'control-label')) }}

                        {{ Form::text('title', $notice->title, array('class' => 'form-control', 'placeholder' => 'Notice Title', 'autofocus')) }}

                    </div>


                    <div class="form-group">
                        {{ Form::label('description', 'Notice Description', array('class' => 'control-label')) }}
                        {{ Form::textarea('description', $notice->description, array('class' => 'form-control', 'placeholder' => 'Notice Description','id'=>'editor')) }}

                    </div>
                </div>
                <div class="box-footer">
                    {{ Form::submit('Update Notice', array('class' => 'btn btn-success')) }}
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








