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

        <!-- Icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body class="font-sans antialiased bg-zinc-800 text-white pt-24"
        x-data="{
            page: '{{ $routeName }}',
            openMenu: false,
        }"
    >
        {{-- Header --}}
        <header class="font-orbitron fixed top-0 left-0 right-0 h-24 flex bg-zinc-800 z-100 p-2 border-b shadow-lg items-center">

            {{-- Logo --}}
            <a href="{{ route('cms.dashboard') }}" title="CMS Dashboard">
                <img src="/logo-chrome.png" class="w-16 md:w-32 h-auto mx-auto ml-2" alt="">
            </a>

            {{-- Title --}}
            <h1 class="uppercase text-amber-400 sm:text-xl md:text-2xl lg:text-3xl xl:text-4xl flex-1 text-center font-bold text-center m-1 p-2">
                Content Management System
            </h1>

            {{-- Menu burger --}}
            <button
                x-on:click="openMenu = !openMenu"
                class="p-2 pb-1 bg-zinc-600 rounded-lg shadow-lg hover:bg-zinc-200 hover:text-amber-600"
            >
                <span class="material-icons-outlined">menu</span>
            </button>
        </header>

        {{-- Nav menu --}}
        <nav
            x-show="openMenu"
            class="font-orbitron fixed top-4 right-16 md:right-16 border md:w-96 bg-zinc-900 rounded-lg shadow-lg text-white p-4"
        >
            <ul class="grid grid-cols-2 gap-2">
                <li><a href="{{ route('cms.dashboard') }}" class="block">Dashboard</a></li>
                <li><a href="{{ route('cms.bullet-points') }}" class="block">Bullet Points</a></li>
                <li><a href="{{ route('cms.demos') }}" class="block">Demos</a></li>
                <li><a href="{{ route('cms.demos') }}" class="block">Skills</a></li>
                <li><a href="{{ route('cms.demos') }}" class="block">Projects</a></li>
                <li><a href="{{ route('cms.demos') }}" class="block">Experience</a></li>
                <li><a href="{{ route('cms.demos') }}" class="block">Settings</a></li>
            </ul>
        </nav>

        <div class="bg-fixed bg-cover" style="background-image: url('/mjp-back-1.jpg')">

            {{-- Main page --}}
            <main class="min-h-screen max-w-7xl mx-auto p-6 lg:p-8 text-white">
                {{ $slot }}
            </main>

        </div>

        @livewireScripts
    </body>
</html>
