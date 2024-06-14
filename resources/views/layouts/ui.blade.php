<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    x-data="{
        darkMode: localStorage.getItem('darkMode') || localStorage.setItem('darkMode', 'dark'),
        page: '{{ \Route::currentRouteName() }}',
    }"
    x-init="$watch('darkMode', val => localStorage.setItem('darkMode', val))"
    x-bind:class="{'dark': darkMode === 'dark' || (darkMode === 'system' && window.matchMedia('(prefers-color-scheme: dark)').matches)}"
>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- Page meta tags --}}
        <x-ui.layout.page-tags />

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:100,200,300,400,500,600,900&display=swap" rel="stylesheet" />
        <link href="https://fonts.bunny.net/css?family=gochi-hand:400" rel="stylesheet" />

        <!-- Icons -->
        {{-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet"> --}}
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,300,0,0" />

        <!-- Scripts -->
        @filamentStyles
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles

    </head>
    <body
        x-cloak
        class="
            font-sans antialiased
            text-primary-900 dark:text-primary-100
            bg-primary-100 dark:bg-primary-900
            bg-fixed bg-cover
            {{ Page::getBackgroundClasses() }}

        "
    >
        <div class="min-h-screen">

            {{-- Main header --}}
            <x-ui.layout.header />

            {{-- Main page --}}
            <main
                class="max-w-7xl mx-auto px-8 xl:px-0 py-6 lg:py-12">
                {{ $slot }}
            </main>

        </div>

        {{-- Footer --}}
        <x-ui.layout.footer />
        @livewire('notifications')
        @filamentScripts
        @livewireScripts
    </body>
</html>
