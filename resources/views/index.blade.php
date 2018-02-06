<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Title & Logo --}}
    <title>{{ config('app.name') }}</title>
    <link rel="icon" href="{{ asset('img/logo.png') }}">

    {{-- Styles --}}
    <link rel="stylesheet" href="{{ asset('css/app,js') }}">
</head>
<body>
    
    

    {{-- ScriptS --}}
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>