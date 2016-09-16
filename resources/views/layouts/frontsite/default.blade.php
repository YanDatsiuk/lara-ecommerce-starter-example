<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <title>{{$pageTitle or 'Ретро байк'}}</title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{asset('frontsite/css/materialize.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="{{asset('frontsite/css/lightbox.css')}}" rel="stylesheet">
    <link href="{{asset('frontsite/css/style.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>

</head>
<body>

@include('partials.frontsite.navigation')

@yield('content')

@include('partials.frontsite.footer')


<!--  Scripts-->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="{{asset('frontsite/js/materialize.js')}}"></script>
<script src="{{asset('frontsite/js/lightbox.js')}}"></script>
<script src="{{asset('frontsite/js/init.js')}}"></script>

</body>
</html>