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
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
       <p>Hi there people!</p>
    </body>
</html>
