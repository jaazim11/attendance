<!doctype html>
<!-- 
* Workday - A time clock application for employees
* Support: official.codefactor@gmail.com
* Version: 2.0
* Author: Brian Luna
* Copyright 2021 Codefactor
* 
-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('meta')
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/assets/images/img/favicon-16x16.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/assets/images/img/favicon-32x32.png') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('/assets/images/img/favicon.ico') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    @yield('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/auth.css') }}">
</head>
<body>
    <div class="wrapper">
        @yield('auth')
    </div>

    <script src="{{ asset('/assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/assets/js/validate-form.js') }}"></script>
    @yield('scripts')
</body>
</html>
