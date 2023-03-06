{{-- A header button component --}}
<div>
    <a
        href="{{ $href }}"
        class="
            flex items-center
            rounded px-6 py-2
            ease-in-out duration-500

        {{-- @todo --}}
        @if (isset($active) && $active)
            border-2 border-t-0 border-l-0 border-r-0 border-b-amber-400
            rounded-none
            text-amber-400
            px-8
            border-none
        @else
            border border-t-zinc-700 border-r-zinc-700 border-b-zinc-900 border-l-zinc-900
            hover:text-amber-400
            hover:bg-zinc-700
            hover:border-t-zinc-500 hover:border-r-zinc-500 hover:border-b-zinc-900 hover:border-l-zinc-900
        @endif
        "
    >
        <span class="material-icons-outlined md-48 mr-2">{{ $icon }}</span>
        <span class="font-bold">
            {{ $slot }}
        </span>
    </a>
</div>