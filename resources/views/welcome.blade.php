<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>window.Laravel = { csrfToken: '{{ csrf_token() }}'}</script>
    <title>Workout Plan</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://www.gstatic.com/charts/loader.js"></script>



</head>
<body>
<div id="app">

    @auth
        <index :user="{{Auth::user()}}" ></index>
    @endauth

    @guest
        <welcome></welcome>
    @endguest
</div>

<script src=" {{asset('js/app.js') }}"></script>
</body>
</html>
