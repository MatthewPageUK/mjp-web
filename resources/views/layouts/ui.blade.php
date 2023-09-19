<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- Page meta tags --}}
        <x-ui.layout.page-tags />

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:100,200,300,400,500,600,900&display=swap" rel="stylesheet" />
        <link href="https://fonts.bunny.net/css?family=orbitron:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet" />

        <link href="https://fonts.bunny.net/css?family=gochi-hand:400" rel="stylesheet" />

        {{-- <link href="https://fonts.bunny.net/css?family=blinker:100,200,300,400,600,700,800,900" rel="stylesheet" /> --}}

        <!-- Icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body class="font-sans antialiased bg-fixed bg-cover bg-primary-800 bg-gradient-to-b from-black"
        style="background-image: url('/mjp-back-1.jpg')"
        x-data="{
            page: '{{ \Route::currentRouteName() }}',
        }"
    >
        <div class="min-h-screen">

            {{-- Main header --}}
            <x-ui.layout.header />

            {{-- Main page --}}
            <main class="max-w-7xl mx-auto py-6 lg:py-12 text-white">
                {{ $slot }}
            </main>

        </div>

        {{-- Footer --}}
        <x-ui.layout.footer />

        @livewireScripts
    </body>
</html>
