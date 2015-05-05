{{--this is the master layout wu  use for all pages --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@section('title') Online Rental @show</title>
    @section('meta_keywords')
        <meta name="keywords" content="your, awesome, keywords, here"/>
    @show @section('meta_author')
        <meta name="author" content="Jon Doe"/>
    @show @section('meta_description')
        <meta name="description"
              content="Lorem ipsum dolor sit amet, nihil fabulas et sea, nam posse menandri scripserit no, mei."/>
    @show
    <link href="{{ asset('/css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/datepicker.css') }}" rel="stylesheet">
    {{--<link href="{{elixir('css/all.css')}}" rel="stylesheet">--}}
    @yield('styles')
    <link href="{{ asset('/css/custom.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link rel="shortcut icon" href="{{{ asset('assets/site/ico/favicon.ico') }}}">

</head>
<body>
{{--here we include header part--}}
@include('partials.nav')

@include('flash::message')

<div class="container">
@include('partials.notifications')
@yield('content')
</div>

@include('partials.footer')

<!-- Scripts -->
<script src="{{ asset('/js/all.js') }}"></script>
<script src="{{ asset('/js/bootstrap-datepicker.js') }}"></script>

{{--<script src="{{ elixir('js/all.js') }}"></script>--}}

{{-- TODO: Incorporate into elixir workflow. --}}


<script>
    $('#flash-overlay-modal').modal();
    $('div.alert').not('.alert-danger').delay(3000).slideUp(300);
</script>
@yield('scripts')

</body>
</html>
