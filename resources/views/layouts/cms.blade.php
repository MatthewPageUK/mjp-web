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


        <div class="
            fixed top-0 left-0 right-0 flex bg-zinc-800 z-100 p-2 border-b shadow-lg items-center
        ">
            <button
                x-on:click="openMenu = !openMenu"
                class="
                    p-2 pb-1 bg-zinc-400 rounded-lg shadow-lg
                    hover:bg-zinc-200 hover:text-amber-600
            ">
                <span class="material-icons-outlined">menu</span>
            </button>
            <h1 class="
                flex-1 text-center font-bold text-center m-1 p-2
                sm:text-2xl
                md:text-3xl
                lg:text-4xl
                xl:text-5xl
            ">Content Management System</h1>
        </div>

        <div
            x-show="openMenu"
            class="fixed top-4 left-16 md:left-32 border md:w-96 bg-zinc-400 rounded-lg shadow-lg text-white p-8"

        >
            <ul>
                <li><a href="{{ route('cms') }}">Dashboard</a></li>
                <li><a href="{{ route('cms.bullet-points') }}">Bullet Points</a></li>
            </ul>
        </div>

        <div class="bg-fixed bg-cover"
            style="background-image: url('/mjp-back-1.jpg')">
            {{-- Main page --}}
            <main class="min-h-screen max-w-7xl mx-auto p-6 lg:p-8 text-white">
                {{ $slot }}
            </main>

        </div>

        @livewireScripts
    </body>
</html>
