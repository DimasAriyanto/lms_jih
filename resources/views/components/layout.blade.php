<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    @vite('resources/css/app.css')
</head>

<body>
        <x-navbar/>

        {{$slot}}

        <x-footer/>
    <script src="{{asset('js/main.js')}}"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</body>

</html>
