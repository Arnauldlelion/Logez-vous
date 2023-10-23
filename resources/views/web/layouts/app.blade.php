<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">

      <title>{{ config('app.name', 'Logez-vous') }}</title>
      

      <!-- Styles -->
      <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/css/common.css') }}">
      {{-- <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}"> --}}
      <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css') }}">
      <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/lightgallery-bundle.css')}}" />
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
   


        <script src="{{ asset('assets/js/lightgallery.umd.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/code.jquery.com_jquery-3.7.1.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/all.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/main.js') }}"></script>
        <script src="{{ asset('assets/js/sweetalert2.all.min.js') }}"></script>
        <script src="{{ asset('assets/js/popper.min.js')}}"></script>
        <script src="{{ asset('assets/js/all.js') }}"></script>
        <script src="{{ asset('assets/js/app.js') }}"></script>

</head>

<body>
    @if(request()->is('/'))
    @include('web.layouts.header')
    @else
        @include('web.layouts.main-header')
    @endif
    {{-- Navbar code here --}}
    @yield('content')

    {{-- Login Modal --}}
    @include('web.auth.login')

    {{-- Footer code here --}}
    @if(!request()->is('search-appartment'))
    @include('web.layouts.footer')
@endif


</body>

</html>
