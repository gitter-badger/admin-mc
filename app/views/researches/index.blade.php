@extends('layouts.default')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @include('includes.alert')
            <section class="panel">
                <header class="panel-heading clearfix">
                    {{ $title }}
                    <span class="pull-right">
                            <a class="btn btn-success btn-sm btn-new-user" href="{{ URL::route('research.create') }}">Create Research</a>
					</span>
                </header>
                <div class="panel-body">
                    @if(count($researches))
                        <table class="display table table-bordered table-striped" id="example">
                            <thead>
                            <tr>
                                <th>Research Description</th>
                                <th>Created At</th>
                                <th>Updated At</th>

                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($researches as $research)
                                <tr>
                                    <td>{{ $research->description }}</td>
                                    <td>{{ $research->created_at->toDayDateTimeString() }}</td>
                                    <td>{{ $research->updated_at->toDayDateTimeString() }}</td>


                                    <td class="text-center">
                                        <a class="btn btn-xs btn-success btn-edit" href="{{ URL::route('research.edit', array('id' => $research->id)) }}">Edit</a>
                                        <a href="#" class="btn btn-danger btn-xs btn-archive deleteBtn" data-toggle="modal" data-target="#deleteConfirm" deleteId="{{ $research->id }}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        No Data Found
                    @endif
                </div>
            </section>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="deleteConfirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Confirmation</h4>
                </div>
                <div class="modal-body">
                    Are you sure to delete?
                </div>
                <div class="modal-footer">
                    {{ Form::open(array('route' => array('research.delete', 0), 'method'=> 'delete', 'class' => 'deleteForm')) }}
                    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                    {{ Form::submit('Yes, Delete', array('class' => 'btn btn-success')) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>


@stop


@section('style')

    {{ HTML::style('plugins/data-tables/dataTables.bootstrap.css') }}
@stop


@section('script')

    {{ HTML::script('plugins/data-tables/jquery.dataTables.min.js') }}

    {{ HTML::script('plugins/data-tables/dataTables.bootstrap.js') }}

    <script type="text/javascript" charset="utf-8">
        $(document).ready(function() {
            $('#example').dataTable();

            // delete
            $('.deleteBtn').click(function() {
                var deleteId = $(this).attr('deleteId');
                var url = "<?php echo URL::route('research.index'); ?>";
                $(".deleteForm").attr("action", url+'/'+deleteId);
            });
        });
    </script>
@stop