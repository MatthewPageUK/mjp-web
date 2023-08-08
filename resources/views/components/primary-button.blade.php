@if (isset($href))
    <a {{ $attributes->merge(['type' => 'submit', 'class' => '
        inline-flex items-center px-4 py-2
        bg-zinc-800
        text-white uppercase
        tracking-widest hover:bg-zinc-700 focus:bg-gray-700 active:bg-zinc-900
        focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2
        transition ease-in-out duration-500


        rounded-md
        border border-t-zinc-700 border-r-zinc-700 border-b-zinc-900 border-l-zinc-900
        hover:text-amber-400
        hover:bg-zinc-700
        hover:border-t-zinc-500 hover:border-r-zinc-500 hover:border-b-zinc-900 hover:border-l-zinc-900

        ']) }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['type' => 'submit', 'class' => '
        inline-flex items-center px-4 py-2
        bg-zinc-800
        text-white uppercase
        tracking-widest hover:bg-zinc-700 focus:bg-gray-700 active:bg-zinc-900
        focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2
        transition ease-in-out duration-500


        rounded-md
        border border-t-zinc-700 border-r-zinc-700 border-b-zinc-900 border-l-zinc-900
        hover:text-amber-400
        hover:bg-zinc-700
        hover:border-t-zinc-500 hover:border-r-zinc-500 hover:border-b-zinc-900 hover:border-l-zinc-900

        ']) }}>
        {{ $slot }}
    </button>
@endif