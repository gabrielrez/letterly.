<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="https://fonts.googleapis.com/css2?family=Lora:wght@400;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <title>Letterly.</title>
        @vite('resources/css/app.css')
    </head>
    <body class="max-w-4xl mx-auto bg-white text-black font-lora transition duration-200 ease-in-out">
        {{ $slot }}
    </body>
    <style>
        .save-effect {
        position: absolute;
        font-size: 18px;
        color: #8B0000;
        animation: saveAnimation 1.2s ease-out forwards;
        }
    
        @keyframes saveAnimation {
            0% {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
            50% {
                transform: translateY(-50px) scale(1.2);
            }
            100% {
                opacity: 0;
                transform: translateY(-100px) scale(1);
            }
        }
    
    </style>    
</html>