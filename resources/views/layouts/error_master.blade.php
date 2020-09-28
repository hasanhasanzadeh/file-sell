<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css')}}" rel="stylesheet">

    <link href="{{asset('css/app.css') }}" rel="stylesheet">
    <link href="{{asset('/frontend/front-style.css')}}" rel="stylesheet">
    <script src="{{asset('js/sweet-alert.min.js')}}"></script>
</head>
<body>

<div class="container-fluid" id="app">
    <div class="row">
        <div class="col-12 py-4">
            @include('sweet::alert')
            @yield('content')
        </div>
    </div>
</div>

<script src="{{asset('/js/app.js')}}"></script>
<script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js')}}"></script>
</body>
</html>
