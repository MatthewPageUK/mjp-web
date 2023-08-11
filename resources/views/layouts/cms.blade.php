{{--
    Main CMS Layout
 --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- Page meta tags --}}
        <x-layout.page-tags />

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,900&display=swap" rel="stylesheet" />
        <link href="https://fonts.bunny.net/css?family=orbitron:400,500,600,900&display=swap" rel="stylesheet" />

        <!-- Icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body
        class="font-sans antialiased bg-zinc-800 text-white bg-fixed bg-cover"
        style="background-image: url('/mjp-back-1.jpg')"
        x-data="{
            page: '{{ $routeName }}',
            openMenu: false,
        }"
    >

        {{-- Page Wrapper --}}
        <div class="md:flex min-h-screen"
            x-data="{
                openMenu: false,
                isMobile: (window.innerWidth < 1024),
                toggle() {
                    this.openMenu = ! this.openMenu
                },
            }"
            x-on:resize.window.debounce.500ms="isMobile = (window.innerWidth < 1024)"
            x-on:click.outside="openMenu = false"
        >
            {{-- Mobile burger menu button / header --}}
            <x-cms.layout.header />

            {{-- Navbar menu --}}
            <x-cms.layout.navbar :menu="$menu" />

            {{-- Main page --}}
            <div class="flex-1">
                <main class="max-w-7xl mx-auto px-6 lg:px-8 text-white">
                    {{ $slot }}
                </main>
            </div>

        </div>
        @livewireScripts
    </body>
</html>
