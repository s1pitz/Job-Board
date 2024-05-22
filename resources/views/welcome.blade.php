<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite('resources/css/app.css')
        <!-- Styles -->
        <style>

        </style>
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <div class="min-h-screen flex flex-col items-center justify-center">
            <h1 class="text-6xl font-bold text-center">Welcome to Laravel</h1>
            <p class="mt-4 text-lg text-center">This is a Laravel application with Vite and Tailwind CSS</p>
        </div>
        @vite('resources/js/app.js')
    </body>
</html>
