<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @production
            <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
        @endproduction
        <title>{{ $title ?? 'Login' }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @stack('styles')
    </head>
    <body class="h-full">
        <div>
            {{ $slot }}
        </div>

        @stack('scripts')
    </body>
</html>
