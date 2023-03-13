{{-- Main web site footer component --}}
<footer
    class="flex px-6 py-4 text-sm bg-zinc-800 text-white"
>
    <p class="flex-1">
        {{ $settings->getValue('site_name') }} - {{ $settings->getValue('site_tagline') }}
    </p>
    <p class="flex-1 text-center text-xs text-zinc-400">
        Copyright &copy; {{ date('Y') }}
    </p>
    <p class="flex-1">
        <a class="flex justify-end hover:text-amber-400" href="#top" title="{{ __('Go to top of page') }}">
            {{ __('Top') }}
            <span class="material-icons-outlined text-sm ml-1 hover:fill-amber-400">arrow_circle_up</span>
        </a>
    </p>
</footer>
<p class="flex items-center text-xs text-green-400 bg-black px-6 py-2">
    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
    <a href="#" class="flex items-center hover:text-amber-400"><span class="material-icons-outlined text-sm mr-1 ml-4 hover:fill-amber-400">terminal</span> Source code</a>
    <span class="flex-1 text-right block text-zinc-500"><a href="{{ route('the.secret') }}">&pi;</a></span>
</p>

{{-- <h3 class="text-center mb-4">Github Activity</h3> --}}
{{-- <img class="w-full" src="https://ghchart.rshah.org/MatthewPageUK" alt="MatthewPageUK's Github chart" /> --}}
