@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title') Show All Places :: @parent
@stop

{{-- Content --}}
@section('main')
    <div class="page-header">
        <h3>
            Show All Place Listing
        </h3>
    </div>

    <table id="table" class="table table-striped table-hover">
        <thead>
            <tr>
                <th>id</th>
                <th>Title</th>
                <th>Room</th>
                <th>Property Type</th>
                <th>Available From</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($places as $place)
                <tr>
                    <td>{{ $place->id }}</td>
                    <td>{{ $place->title}}</td>
                    <td>{{ $place->room}}</td>
                    <td>{{ $place->property_type}}</td>
                    <td>{{ $place->available_from}}</td>
                    <td>{{ $place->status}}</td>
                    <td>

                        <a href="{{route('place.edit',$place->id)}}" class="btn btn-success btn-sm iframe" >
                            <span class="glyphicon glyphicon-pencil"></span> Edit</a>
                            {!! Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('place.destroy', $place->id))) !!}
                            {!! Form::submit('Delete', array('class' => 'btn btn-sm btn-danger delete-row')) !!}
                            {!! Form::close() !!}
                        </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop

{{-- Scripts --}}
@section('scripts')
    @parent
    <script type="text/javascript">
        var oTable;
        $(document).ready(function () {
            oTable = $('#table').dataTable( {
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
            });
        });
    </script>
@stop
