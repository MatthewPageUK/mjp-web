{{-- Version --}}
<p class="w-full max-w-7xl mx-auto md:flex md:items-center gap-4 text-xs text-green-700 px-6 py-4">
    Laravel v{{ Illuminate\Foundation\Application::VERSION }} on PHP v{{ PHP_VERSION }}

    {{-- Source code --}}
    @if (Settings::tryGetValue('source'))
        <a
            href="{{ Settings::tryGetValue('source') }}"
            class="flex items-center gap-1 hover:text-green-500 hover:drop-shadow-[1px_1px_7px_rgba(100,255,100,1)] XXtransition duration-1000"
            target="_blank"
        >
            <x-icons.material>terminal</x-ui.icons.material>
            Source code
        </a>
    @endif
</p>