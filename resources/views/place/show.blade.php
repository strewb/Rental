@extends('app')
@section('styles')
    <link href="{{ asset('/css/smoothproduct.css') }}" rel="stylesheet">
@endsection
{{--here we already setup with live server  so if you save this  its will update live server code also--}}
@section('content')
    <div class="row">
        <div class="page-header">
            <h2>{{$place->title}}</h2>
        </div>
        <div class="col-md-5">
            <div class="sp-loading"><img src="{{ asset('images/sp-loading.gif') }}" alt=""><br>LOADING IMAGES</div>
            <div class="sp-wrap">
               <?php $places = $place->Pictures();
                ?>
                @foreach($places as $picture)
                    @if($picture!='')
                        <a href="{{ asset($picture) }}"><img src="{{ asset($picture) }}" alt=""></a>
                    @else
                        <a href="http://placehold.it/200x200"><img src="http://placehold.it/200x200" alt=""></a>
                    @endif
                @endforeach
            </div>
            <h4 class="contact_title">Contact For More Detail</h4>
            <div class="contact">
                <h3>{{$place->user->name}}</h3>
                <p>Phone: {{$place->phone}}</p>
                <p>Email: <a href="mailto:{{$place->email}}">{{$place->email}}</a></p>
            </div>
        </div>
        <div class="col-md-5">
            <div class="list_table">
                <ul>
                    <li class="label">Property ID</li>
                    <li>#{{$place->id}}</li>
                </ul>
                <ul>
                    <li class="label">Title</li>
                    <li>{{$place->title}}</li>
                </ul>

                <ul>
                    <li class="label">Property Type</li>
                    <li>{{$place->property_type}}</li>
                </ul>
                <ul>
                    <li class="label">Rent Per Month</li>
                    <li>24324234$</li>
                </ul>

                <ul>
                    <li class="label">Offered Room</li>
                    <li>{{$place->room}}</li>
                </ul>
                <ul>
                    <li class="label">Details of Apartment</li>
                    <li>{{$place->description}}</li>
                </ul>

                <ul>
                    <li class="label">location</li>
                    <li>{{$place->location}}</li>
                </ul>
                <ul>
                    <li class="label">Last Updated</li>
                    <li>{{$place->updated_at}}</li>
                </ul>
                <ul>
                    <li class="label">Added On</li>
                    <li>{{$place->created_at}}</li>
                </ul>
                <ul>
                    <li class="label">Present Status</li>
                    <li>{{$place->status}}</li>
                </ul>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('/js/smootproduct.min.js') }}"></script>
    <script type="text/javascript">
        /* wait for images to load */
        $(function () {
            $('.sp-wrap').smoothproducts();
        });
    </script>
@endsection
@stop


