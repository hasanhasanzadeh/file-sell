<!doctype html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <script>window.Laravel = {csrfToken:'{{csrf_token()}}'} </script>
    <link rel="icon" href="{{asset('storage/images/'.$setting->icon_image)}}" type="image/ico" sizes="40x40">

    <title>@yield('title')</title>

    {!! SEO::generate(true) !!}
    <!-- styles links -->
    <link rel="stylesheet" href="{{url('/css/app.css')}}">
    <link rel="stylesheet" href="{{url('/css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{url('/frontend/css/front-style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <script src="{{asset('js/sweet-alert.min.js')}}"></script>
    @yield('style')
</head>
<body>

@include('sweet::alert')
@yield('content')


<script src="{{asset('js/app.js')}}"></script>
@yield('script')
</body>
</html>
