<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
{{--    <link href="https://fonts.googleapis.com/css?family=Arimo:400,700|Varela+Round" rel="stylesheet">--}}
    <link href="https://fonts.googleapis.com/css?family=Ubuntu:400,500,700" rel="stylesheet">
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css" rel="stylesheet" >

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @stack('css-lib')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @stack('css')
    <script>
      var tomorrow_date = '{{ \Carbon\Carbon::today()->addDays(1)->toDateString() }}';
    </script>
</head>
<body>
<div id="app">
    @include('partials.header_fixed')
    @include('partials.success_message')
    @yield('content')
</div>
@include('partials.footer')
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
@stack('footer-js')
</body>
</html>
