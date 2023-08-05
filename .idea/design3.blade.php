<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>dddd</title>

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
    <body
        class="font-sans antialiased text-white min-h-screen
            bg-fixed bg-cover bg-bottom

        "
        style="background-image: url('/mjp-back-1.jpg')"
        x-data="{
            page: '{{ \Route::currentRouteName() }}',
        }"
    >



        <header
            x-data="{
                openMenu: false,
                isMobile: (window.innerWidth < 1024) ? true : false,
                toggle() {
                    this.openMenu = ! this.openMenu
                },
            }"
            x-on:resize.window.debounce.500ms="isMobile = (window.innerWidth < 1024) ? true : false"
            x-on:click.outside="openMenu = false"

            class="
                border
                overflow-hidden
                bg-zinc-800 border-b-2 border-amber-400
                z-50 sticky top-0 w-full

                md:w-[150px] md:h-full md:fixed
                lg:w-[400px] lg:sticky
                "
        >
            {{-- Burger menu button --}}
            <button
                x-on:click.prevent="toggle()"
                class="absolute top-4 right-4 lg:hidden text-white hover:text-amber-500 ease-in-out duration-500"
            >
                <x-icons.material class="text-4xl ml-1">menu</x-icons.material>
            </button>

        {{-- lg:flex lg:space-x-8 lg:items-center px-8 py-6 lg:pt-10 bg-zinc-800 text-white  shadow-lg --}}
            <div class="text-left p-4 mb-0">
                <a href="/" class="md:rotate-90 md:w-[400px] lg:rotate-0 origin-bottom-left block text-4xl text-white">Matthew Page</a>
                <span class="text-xs">Backend Web Developer</span>
            </div>









            <div class="bg-zinc-900 p-4 w-full" x-show="(isMobile && openMenu) || ! isMobile">
                {{-- Header buttons --}}
                <nav class="lg:flex lg:space-x-2">
                    {{-- Skills --}}
                    <x-layout.header-button href="{{ route('skills') }}" icon="construction" tag="skill">
                        {{ __('Skills') }}
                    </x-layout.header-button>

                    {{-- Experience --}}
                    <x-layout.header-button href="{{ route('experiences') }}" icon="public" tag="experience">
                        {{ __('Experience') }}
                    </x-layout.header-button>

                    {{-- Projects --}}
                    <x-layout.header-button href="{{ route('projects') }}" icon="rocket_launch" tag="project">
                        {{ __('Projects') }}
                    </x-layout.header-button>

                    {{-- Demos --}}
                    <x-layout.header-button href="{{ route('demos') }}" icon="smart_toy" tag="demo">
                        {{ __('Demos') }}
                    </x-layout.header-button>

                    {{-- Contact --}}
                    <x-layout.header-button href="#" icon="connect_without_contact" tag="contact">
                        {{ __('Contact') }}
                    </x-layout.header-button>
                </nav>

                <nav class="mt-8 flex space-x-4 flex-grow justify-center lg:justify-end">
                    {{-- Github Icon --}}
                    <x-layout.header-icon href="{{ $settings->getValue('url_github') }}" title="My Github profile" class="fill-white hover:fill-amber-400">
                        <x-icons.github class="w-8 h-8 text-white"/>
                    </x-layout.header-icon>

                    {{-- LinkedIn Icon --}}
                    <x-layout.header-icon href="{{ $settings->getValue('url_linkedin') }}" title="My LinkedIn profile" class="fill-white hover:fill-amber-400">
                        <x-icons.linkedin class="w-8 h-8 text-white"/>
                    </x-layout.header-icon>

                    {{-- Youtube Icon --}}
                    <x-layout.header-icon href="{{ $settings->getValue('url_youtube') }}" title="My Youtube channel" class="fill-white hover:fill-amber-400">
                        <x-icons.youtube class="w-8 h-8 text-white"/>
                    </x-layout.header-icon>
                </nav>

                {{-- Authentication --}}
                @if (Route::has('login'))
                    <nav class="mt-8 lg:mt-4 flex justify-center lg:justify-start lg:fixed lg:top-0 lg:right-0 px-8 py-2 text-right text-sm">
                        @auth
                            {{-- Logged in user dashboard --}}
                            <a href="{{ url('/dashboard') }}" class="flex items-center text-white dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                                Dashboard
                                <x-icons.material class="text-sm ml-1">account_circle</x-icons.material>
                            </a>
                        @else
                            {{-- Log in --}}
                            <a href="{{ route('login') }}" class="flex items-center text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                                Log in
                                <x-icons.material class="text-sm ml-1">login</x-icons.material>
                            </a>
                            @if (Route::has('register'))
                                {{-- Register --}}
                                <a href="{{ route('register') }}" class="flex items-center ml-4 text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                                    Register
                                    <x-icons.material class="text-sm ml-1">group_add</x-icons.material>
                                </a>
                            @endif
                        @endauth
                    </nav>
                @endif
            </div>


        </header>



















        <div class="">

            {{-- Main header --}}
            {{-- <x-layout.header /> --}}

            {{-- Mastheads --}}


            {{-- @if ($showMasthead)
                <livewire:layout.show-masthead />
            @endif --}}

            {{-- Main page --}}
            <main class="max-w-7xl md:ml-[150px] lg:ml-[420px] lg:mt-[-200px] p-6 lg:p-8 text-white">
               <p>asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas</p>
               <p>asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas  asdas asdasas d asasdasas  dasasdasas dasa sdasa sdasasda sasda sasdasasdasasdasas dasasdas asdasa sdasasda sasdas</p>
            </main>

        </div>

        {{-- Footer --}}
        {{-- <x-layout.footer /> --}}



{{-- Main web site footer component --}}
<footer
    class="lg:flex px-6 py-4 text-sm bg-zinc-800 text-white"
>
    <p class="flex-1">
        {{ $settings->getValue('site_name') }} - {{ $settings->getValue('site_tagline') }}
    </p>
    <p class="flex-1 text-center text-xs text-zinc-400">
        Copyright &copy; {{ date('Y') }}
    </p>

</footer>


{{-- Hit Counter - party like it's 1999 --}}
<div class="p-2">
    <livewire:hit-counter :page="url()->current()" />
</div>

<p class="p-4">
    <a class="flex items-center justify-end hover:text-amber-400" href="#top" title="{{ __('Go to top of page') }}">
        {{ __('Top') }}
        <span class="material-icons-outlined text-sm ml-1 hover:fill-amber-400">arrow_circle_up</span>
    </a>
</p>

<p class="flex items-center text-xs text-green-400 bg-black px-6 py-2">
    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
    <a href="#" class="flex items-center hover:text-amber-400"><span class="material-icons-outlined text-sm mr-1 ml-4 hover:fill-amber-400">terminal</span> Source code</a>
    <span class="flex-1 text-right block text-zinc-500"><a href="{{ route('the.secret') }}">&pi;</a></span>
</p>

        @livewireScripts
    </body>
</html>
