<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css2?family=Lora:wght@400;700&display=swap" rel="stylesheet">
        <title>Letterly.</title>
        @vite('resources/css/app.css')
    </head>
    <body class="max-w-4xl mx-auto text-black font-lora transition duration-200 ease-in-out">
        {{ $slot }}
    </body>
</html>