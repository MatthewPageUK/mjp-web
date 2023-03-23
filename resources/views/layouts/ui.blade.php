<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.bunny.net/css?family=orbitron:400,500,600&display=swap" rel="stylesheet" />

        <link href="https://fonts.bunny.net/css?family=adamina:100,200,300,400,600,700,800,900" rel="stylesheet" />

        {{-- <link href="https://fonts.bunny.net/css?family=blinker:100,200,300,400,600,700,800,900" rel="stylesheet" /> --}}

        <!-- Icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body class="font-sans antialiased bg-zinc-800"
        x-data="{
            page: '{{ \Route::currentRouteName() }}',
        }"
    >
        <div class="min-h-screen bg-zinc-800">

            {{-- Main header --}}
            <x-layout.header />

            {{-- Mastheads --}}
            @if ($showMasthead)
                <livewire:layout.show-masthead />
            @endif

            {{-- Main page --}}
            <main class="max-w-7xl mx-auto p-6 lg:p-8 text-white">
                {{ $slot }}
            </main>

        </div>

        {{-- Footer --}}
        <x-layout.footer />

        @livewireScripts
    </body>
</html>
