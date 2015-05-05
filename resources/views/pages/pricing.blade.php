{{--this is blade templating . mainly extend app layouts--}}
@extends('app')
@section('title') Pricing :: @parent @stop
@section('content')
    <div class="row">
        <div class="page-header">
            <h2>Pricing Page</h2>

        </div>
        <p>here you can add content then press save</p>
    </div>
@endsection