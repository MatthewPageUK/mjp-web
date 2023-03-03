{{-- Main web site header component --}}
<header
    class="z-50 sticky top-0 flex space-x-8 items-center px-8 py-6 pt-10 bg-zinc-800 text-white border-b-2 border-amber-400 shadow-lg"
>
    <div>
        <a href="/" class="border w-32 h-16 block">SITE LOGO</a>
    </div>
    <div class="flex space-x-2">
        {{-- Skills --}}
        <x-layout.header-button href="#" icon="construction">
            {{ __('Skills') }}
        </x-layout.header-button>

        {{-- Experience --}}
        <x-layout.header-button href="#" icon="public">
            {{ __('Experience') }}
        </x-layout.header-button>

        {{-- Projects --}}
        <x-layout.header-button href="#" icon="rocket_launch" :active="true">
            {{ __('Projects') }}
        </x-layout.header-button>

        {{-- Demos --}}
        <x-layout.header-button href="#" icon="smart_toy">
            {{ __('Demos') }}
        </x-layout.header-button>

        {{-- Contact --}}
        <x-layout.header-button href="#" icon="connect_without_contact">
            {{ __('Contact') }}
        </x-layout.header-button>
    </div>
    <div class="flex space-x-2 flex-grow justify-end">
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
    </div>

    {{-- Authentication --}}
    @if (Route::has('login'))
        <div class="flex items-center sm:fixed sm:top-0 sm:right-0 px-8 py-2 text-right text-sm">
            @auth
                {{-- Logged in user dashboard --}}
                <a href="{{ url('/dashboard') }}" class="flex items-center text-white dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                    Dashboard
                    <span class="material-icons-outlined text-sm ml-1">account_circle</span>
                </a>
            @else
                {{-- Log in --}}
                <a href="{{ route('login') }}" class="flex items-center text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                    Log in
                    <span class="material-icons-outlined text-sm ml-1">login</span>
                </a>
                @if (Route::has('register'))
                    {{-- Register --}}
                    <a href="{{ route('register') }}" class="flex items-center ml-4 text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                        Register
                        <span class="material-icons-outlined text-sm ml-1">group_add</span>
                    </a>
                @endif
            @endauth
        </div>
    @endif
</header>
