
{{-- Main web site header component --}}
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
    class="z-50 sticky top-0 lg:flex lg:space-x-8 lg:items-center px-8 py-6 lg:pt-10 bg-primary-800 text-white border-b-2 border-secondary-400 shadow-lg"
>
    {{-- Main Logo --}}
    <div class="lg:justify-start w-full lg:w-48">
        <x-ui.layout.header-logo />
    </div>

    {{-- Burger menu button --}}
    <button
        x-on:click.prevent="toggle()"
        class="absolute top-0 right-1 lg:hidden hover:text-secondary-500 ease-in-out duration-500"
    >
        <x-icons.material class="text-4xl ml-1">menu</x-icons.material>
    </button>

    <div class="lg:flex lg:space-x-8 lg:items-center w-full" x-show="(isMobile && openMenu) || ! isMobile" x-transition.opacity x-transition.duration.500ms>
        {{-- Header buttons --}}
        <nav class="mt-8 lg:mt-0 lg:flex lg:space-x-2">
            {{-- Skills --}}
            <x-ui.layout.header-button href="{{ route('skills') }}" icon="construction" tag="skill" title="My web development skills">
                {{ __('Skills') }}
            </x-ui.layout.header-button>

            {{-- Experience --}}
            <x-ui.layout.header-button href="{{ route('experiences') }}" icon="public" tag="experience" title="Professional work experience">
                {{ __('Experience') }}
            </x-ui.layout.header-button>

            {{-- Projects --}}
            <x-ui.layout.header-button href="{{ route('projects') }}" icon="rocket_launch" tag="project" title="Developer projects I am working on">
                {{ __('Projects') }}
            </x-ui.layout.header-button>

            {{-- Demos --}}
            <x-ui.layout.header-button href="{{ route('demos') }}" icon="smart_toy" tag="demo" title="Web development demos and fun widgets">
                {{ __('Demos') }}
            </x-ui.layout.header-button>

            {{-- Posts --}}
            <x-ui.layout.header-button href="{{ route('posts') }}" icon="feed" tag="post" title="Posts and articles">
                {{ __('Posts') }}
            </x-ui.layout.header-button>
        </nav>

        <nav class="mt-8 lg:mt-0 flex space-x-3 flex-grow justify-center lg:justify-end">
            {{-- Github Icon --}}
            <x-ui.layout.header-icon href="{{ Settings::getValue('url_github') }}" title="My Github profile" class="fill-white hover:fill-green-800">
                <x-icons.github class="w-8 h-8 text-white"/>
            </x-ui.layout.header-icon>

            {{-- LinkedIn Icon --}}
            <x-ui.layout.header-icon href="{{ Settings::getValue('url_linkedin') }}" title="My LinkedIn profile" class="fill-white hover:fill-blue-700">
                <x-icons.linkedin class="w-8 h-8 text-white"/>
            </x-ui.layout.header-icon>

            {{-- Youtube Icon --}}
            <x-ui.layout.header-icon href="{{ Settings::getValue('url_youtube') }}" title="My Youtube channel" class="fill-white hover:fill-red-700">
                <x-icons.youtube class="w-8 h-8 text-white"/>
            </x-ui.layout.header-icon>

            {{-- Contact Icon --}}
            <x-ui.layout.header-icon href="/#contact" title="Contact me" target="_self" class="fill-none">
                <x-icons.contact class="w-8 h-8 text-white hover:text-secondary-400"/>
            </x-ui.layout.header-icon>
        </nav>

        {{-- Authentication nav bar --}}
        <x-ui.layout.auth-nav />

    </div>
</header>
