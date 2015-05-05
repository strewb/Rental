@extends('app')
@section('title') Home :: @parent @stop

{{--this is home view --}}
@section('content')
    <div class="wellcome">
        <h1>Welcome To Online Rental Service</h1>
        <p class="lead">Rent unique places or list your places for rent!</p>
    </div>
    <hr>

    {{--we count if have any places then show using forech loop--}}
    @if($places->count())
        @foreach($places as $place)
    <div class="media listing">
        <div class="pull-left">

            <?php $pictures = $place->Pictures(); ?>
            <a href="#">
                <img class="img-thumbnail" src="{{ $pictures[0]? asset($pictures[0]):'http://placehold.it/200x200' }}" alt="" width="200" height="200">
            </a>
            <div class="user_name">
                <p>by <span>{{$place->user->name}}.</span></p>
            </div>
        </div>

        <div class="media-body">
            <h2>{{$place->title}}</h2>
            <div class="description">
                <p><b>Rent Per Month:</b> USD {{$place->price}}</p>
                <p><b>Offered Room:</b> {{$place->room}}</p>
                <p><b>Available From:</b> {{$place->available_from}}</p>
                <p><b>Location:</b> {{$place->location}}</p>
                <p><b>Details of Apartment:</b> {{$place->description}}</p>
                <div class="button_area">
                    <div class="col-sm-3">
                        <a href="tel:{{$place->phone}}" class="call">Phone : {{$place->phone}}</a>
                    </div>
                    <div class="col-sm-2 button">
                        <a href="{{route('place.show',$place->id)}}">View Details</a>
                    </div>
                    <div class="col-sm-1 button">
                        <a href="mailto:{{$place->email}}">Contact</a>
                    </div>
                    @if(Auth::check())
                        @if(Auth::user()->id==$place->user_id)
                            <div class="col-sm-1 col-sm-offset-4 ">
                            {!! Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('place.destroy', $place->id))) !!}
                            {!! Form::submit('Delete', array('class' => 'btn btn-danger delete-row')) !!}
                            {!! Form::close() !!}
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @endif

    {!! $places->render() !!}

    </div>
@endsection

@stop
