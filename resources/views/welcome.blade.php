<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @vite('resources/css/welcome.css')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    {{-- <link href="{{ asset('welcome.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="css/welcome.css">


</head>

<body>
    <p>Welcome to my Task App</p>
    <x-buttons.simple-button route="register" buttonTitle="Register" />
</body>

</html>
