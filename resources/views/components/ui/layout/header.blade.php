
{{-- Main web site header component --}}
@use('App\Enums\Section')
<header
    x-data="{
        openMenu: false,
        isMobile: (window.innerWidth < 1024),
        toggle() {
            this.openMenu = ! this.openMenu
        },
    }"
    x-on:resize.window.debounce.500ms="isMobile = (window.innerWidth < 1024)"
    x-on:click.outside="openMenu = false"
    class="
        z-50 sticky top-0 px-8 py-6 lg:pt-8
        bg-white
        shadow-lg
        dark:bg-primary-800
        {{-- bg-gradient-to-t from-amber-500 to-amber-300 dark:from-primary-800 dark:to-primary-900 --}}
        dark:text-white
        dark:border-b-2
        dark:border-secondary-400
    "
>
    <div class="w-full max-w-7xl mx-auto lg:flex lg:space-x-8 lg:items-center">

        {{-- Main Logo --}}
        <div class="lg:justify-start w-full lg:w-48">
            <x-ui.layout.header.logo />
        </div>

        {{-- Burger menu button --}}
        <x-ui.layout.header.burger-button />

        <div
            class="flex flex-wrap space-x-24 lg:space-x-8 lg:items-center w-full"
            x-show="(isMobile && openMenu) || ! isMobile" x-XXtransition.opacity x-XXtransition.duration.500ms
        >

            {{-- Header buttons --}}
            <nav class="mt-8 lg:mt-0 lg:flex lg:space-x-2">
                {{-- Skills --}}
                <x-ui.layout.header.button href="{{ route('skills') }}" icon="{{ Section::Skills->getUiIcon() }}" tag="skill" title="My web development skills">
                    {{ __('Skills') }}
                </x-ui.layout.header.button>

                {{-- Experience --}}
                <x-ui.layout.header.button href="{{ route('experiences') }}" icon="public" tag="experience" title="Professional work experience">
                    {{ __('Work') }}
                </x-ui.layout.header.button>

                {{-- Projects --}}
                <x-ui.layout.header.button href="{{ route('projects') }}" icon="{{ Section::Projects->getUiIcon() }}" tag="project" title="Developer projects I am working on">
                    {{ __('Projects') }}
                </x-ui.layout.header.button>

                {{-- Demos --}}
                <x-ui.layout.header.button href="{{ route('demos') }}" icon="smart_toy" tag="demo" title="Web development demos and fun widgets">
                    {{ __('Demos') }}
                </x-ui.layout.header.button>

                {{-- Journal --}}
                <x-ui.layout.header.button href="{{ route('journal') }}" icon="draw" tag="journal" title="Developer Journal">
                    {{ __('Journal') }}
                </x-ui.layout.header.button>

                {{-- Library --}}
                <x-ui.layout.header.button href="{{ route('library') }}" icon="local_library" tag="library" title="Come through to the library...">
                    {{ __('Library') }}
                </x-ui.layout.header.button>

                {{-- Posts --}}
                {{-- <x-ui.layout.header.button href="{{ route('posts') }}" icon="feed" tag="post" title="Posts and articles">
                    {{ __('Posts') }}
                </x-ui.layout.header.button> --}}
            </nav>

            <nav class="mt-8 lg:mt-0 lg:flex space-x-3 flex-grow justify-center lg:justify-end">
                {{-- Github Icon --}}
                @if (Settings::tryGetValue('url_github'))
                    <x-ui.layout.header.icon id="header-icon-github" href="{{ Settings::tryGetValue('url_github') }}" title="My Github profile">
                        <x-icons.github class="w-6 h-6 xl:w-8 xl:h-8 text-white"/>
                    </x-ui.layout.header.icon>
                @endif

                {{-- LinkedIn Icon --}}
                @if (Settings::tryGetValue('url_linkedin'))
                    <x-ui.layout.header.icon id="header-icon-linkedin" href="{{ Settings::tryGetValue('url_linkedin') }}" title="My LinkedIn profile">
                        <x-icons.linkedin class="w-6 h-6 xl:w-8 xl:h-8 text-white"/>
                    </x-ui.layout.header.icon>
                @endif

                {{-- Youtube Icon --}}
                @if (Settings::tryGetValue('url_youtube'))
                    <x-ui.layout.header.icon id="header-icon-youtube" href="{{ Settings::tryGetValue('url_youtube') }}" title="My Youtube channel">
                        <x-icons.youtube class="w-6 h-6 xl:w-8 xl:h-8 text-white"/>
                    </x-ui.layout.header.icon>
                @endif

                {{-- Contact Icon --}}
                <x-ui.layout.header.icon href="/#contact" title="Contact me" target="_self" class="fill-none">
                    <x-icons.contact class="w-6 h-6 xl:w-8 xl:h-8 fill-none"/>
                </x-ui.layout.header.icon>
            </nav>

            {{-- Authentication nav bar --}}
            {{-- <x-ui.layout.auth-nav /> --}}

            {{-- Dark mode buttons --}}
            <nav class="mt-8 lg:mt-0 flex justify-center gap-4 lg:justify-start lg:fixed lg:top-0 lg:right-0 px-8 py-2 text-right text-sm tracking-tight font-light">
                <x-ui.layout.light-dark-mode />
            </nav>

        </div>
    </div>
</header>
