<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @production
            <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
        @endproduction
        <title>{{ $title ?? 'Help Central | Ticketing System' }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @stack('styles')
    </head>
    <body class="h-full">
        <x-customer.navbar />
        <div class="p-3">
            {{ $slot }}
        </div>

        @stack('scripts')
        {{-- <script>
            document.addEventListener('livewire:init', () => {
                Livewire.on('alert-on', (payload) => {
                    console.log(payload)
                    Swal.fire({
                        title: payload.title,
                        text: payload.message,
                        icon: payload.icon,
                        confirmButtonText: 'OK'
                    })
                });
            })
        </script> --}}
    </body>
</html>
