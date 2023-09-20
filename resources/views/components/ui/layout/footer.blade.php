{{-- Main web site footer component --}}
<footer
    class="bg-primary-800"
>
    <div class="w-full max-w-7xl mx-auto md:flex px-6 py-4 text-sm text-white">
        <p class="flex-1">
            <a href="{{ route('home') }}" title="Homepage" class="hover:text-amber-400">
                {{ Settings::getValue('site_name') }} - {{ Settings::getValue('site_tagline') }}
            </a>
        </p>
        <p class="flex-1 md:text-center text-xs text-primary-400">
            Copyright &copy; {{ date('Y') }}
        </p>
        <p class="flex-1">
            <a class="flex justify-end hover:text-secondary-400" href="#top" title="{{ __('Go to top of page') }}">
                {{ __('Top') }}
                <span class="material-icons-outlined text-sm ml-1 hover:fill-secondary-400">arrow_circle_up</span>
            </a>
        </p>
    </div>
</footer>
<div class="bg-black">
    <p class="w-full max-w-7xl mx-auto md:flex md:items-center gap-4 text-xs text-green-700 px-6 py-4">
        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})

        @if (Settings::getValue('source'))
            <a href="{{ Settings::getValue('source') }}" class="flex items-center gap-1 hover:text-green-500 hover:drop-shadow-[1px_1px_7px_rgba(100,255,100,1)] transition duration-1000" target="_blank">
                <x-icons.material>terminal</x-ui.icons.material>
                Source code
            </a>
        @endif
    </p>
</div>