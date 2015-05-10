@extends('layouts.default')

@section('content')

    <div class="row">
        <div class="col-md-12">
            @include('includes.alert')
            <div class="col-md-6 col-md-offset-3">
                <div class="box box-info">

                    {{Form::model($hostel,['route' => ['hostel.update',$hostel->id], 'class' => 'form-horizontal', 'method' => 'put' ])}}
                    <div class="box-body">
                        <div class="form-group">
                            {{ Form::label('description', 'Hostel Description', array('class' => 'control-label')) }}
                            {{ Form::textarea('description', null, array('class' => 'form-control', 'placeholder' => 'Hostel Description','id'=>'editor')) }}

                        </div>

                    </div>
                    <div class="box-footer">
                        {{ Form::submit('Update Hostel', array('class' => 'btn btn-success')) }}
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








