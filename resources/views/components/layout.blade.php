<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    @vite('resources/css/app.css')

    <!-- google font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">

    <!-- flowbite -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />

    <!-- tiny-slider -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css">

</head>

<body>
        <x-navbar/>

        {{$slot}}

        <x-footer/>
    <script src="{{asset('js/main.js')}}"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</body>

</html>
