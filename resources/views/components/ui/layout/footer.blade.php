{{-- Main web site footer component --}}
<footer
    class="flex px-6 py-4 text-sm bg-primary-800 text-white"
>
    <p class="flex-1">
        {{ Settings::getValue('site_name') }} - {{ Settings::getValue('site_tagline') }}
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
<p class="flex items-center text-xs text-green-400 bg-black px-6 py-4">
    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
    <a href="#" class="flex items-center hover:text-secondary-400"><span class="material-icons-outlined text-sm mr-1 ml-4 hover:fill-secondary-400">terminal</span> Source code</a>
    <span class="flex-1 text-right block text-primary-500"><a href="{{ route('the.secret') }}">&pi;</a></span>
</p>
