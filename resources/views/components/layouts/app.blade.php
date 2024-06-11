<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <style> [x-cloak] { display: none; } </style>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <title>{{ $title ?? 'Page Title' }}</title>
    </head>

    <x-nav.header></x-nav.header>

    <body class="bg-black/95 overflow-hidden antialiased">
        {{ $slot }}

        @livewireScripts

        <x-nav.footer></x-nav.footer>
    </body>
</html>
