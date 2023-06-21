<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel</title>
    @vite('resources/js/app.js')

</head>

</head>

<body>

<livewire:student-module />

<script src="{{asset('js/app.js')}}"></script>
    @livewireScripts
</body>

</html>