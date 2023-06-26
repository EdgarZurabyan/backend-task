<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('adminlte_css')
</head>
<body class="hold-transition @yield('body_class')">
<div class="wrapper">
    @yield('body')
</div>

<script src="{{ asset('js/app.js') }}"></script>
@yield('adminlte_js')
</body>
</html>
