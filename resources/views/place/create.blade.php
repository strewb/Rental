@extends('app')

{{-- Web site Title --}}
@section('title') List Your Place :: @parent
@stop


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="page-header">
                    <h2>Submit Your place</h2>
                </div>
                @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                {!! Form::open(['url' => 'place','files'=>true]) !!}
                    <div class="form-group">
                        {!! Form::label('title', 'Title: ') !!}
                        {!! Form::text('title', null, ['class' => 'form-control']) !!}
                    </div>
                        <div class="form-group">
                        {!! Form::label('description', 'Description: ') !!}
                        {!! Form::textarea('description', null, ['class' => 'form-control','rows'=>3]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('property_type', 'Property Type: ') !!}
                        {!! Form::select('property_type', [ '0' => 'Select Type','Residential' => 'Residential',
                        'Commercial' => 'Commercial', 'Land' => 'Land','ID House' => 'ID House','Others' => 'Others'], null, ['class' => 'form-control']) !!}

                    </div>
                    <div class="form-group">
                        {!! Form::label('room', 'Room: ') !!}
                        {!! Form::text('room', null, ['class' => 'form-control']) !!}
                    </div>
                        <div class="form-group">
                            {!! Form::label('price', 'Monthly Price: ') !!}
                            {!! Form::text('price', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                        {!! Form::label('location', 'Location: ') !!}
                        {!! Form::text('location', null, ['class' => 'form-control']) !!}
                    </div>
                        <div class="form-group">
                        {!! Form::label('available_from', 'Available From: ') !!}
                        {!! Form::text('available_from', null, ['class' => 'form-control','id'=> 'datepicker']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('pictures', 'Pictures: ') !!}
                        {!! Form::file('pictures[]', array('class' => 'form-control','multiple'=>true)) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('email', 'Contact Email: ') !!}
                        {!! Form::text('email', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('phone', 'Contact Phone: ') !!}
                        {!! Form::text('phone', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('status', 'Current Status: ') !!}
                        {!! Form::text('status', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::hidden('user_id', Auth::user()->id, ['class' => 'form-control']) !!}
                        {!! Form::submit('Submit Place', ['class' => 'btn btn-primary form-control']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(function () {
            $('#datepicker').datepicker()
        });
    </script>
@stop