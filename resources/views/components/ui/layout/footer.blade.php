{{-- Main web site footer component --}}
<footer
    class="flex px-6 py-4 text-sm bg-primary-800 text-white"
>
    <p class="flex-1">
        <a href="{{ route('home') }}" title="Homepage" class="hover:text-amber-400">
            {{ Settings::getValue('site_name') }} - {{ Settings::getValue('site_tagline') }}
        </a>
    </p>
    <p class="flex-1 text-center text-xs text-primary-400">
        Copyright &copy; {{ date('Y') }}
    </p>
    <p class="flex-1">
        <a class="flex justify-end hover:text-secondary-400" href="#top" title="{{ __('Go to top of page') }}">
            {{ __('Top') }}
            <span class="material-icons-outlined text-sm ml-1 hover:fill-secondary-400">arrow_circle_up</span>
        </a>
    </p>
</footer>
<p class="flex items-center gap-4 text-xs text-green-400 bg-black px-6 py-4">
    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})

    @if (Settings::getValue('source'))
        <a href="{{ Settings::getValue('source') }}" class="flex items-center gap-1 hover:text-secondary-400">
            <x-icons.material>terminal</x-ui.icons.material>
            Source code
        </a>
    @endif
</p>
