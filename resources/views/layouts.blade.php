<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css">
    @yield('style')
</head>
<body>
    <nav class="navbar navbar-inverse" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{url('/')}}">Главная</a>
            </div>
            <div class="navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="{{url('/orders')}}">Orders</a></li>
                    <li><a href="{{url('/weather')}}">Weather</a></li>
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
