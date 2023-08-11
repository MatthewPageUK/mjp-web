@if (isset($href))
    <a {{ $attributes->merge(['type' => 'submit', 'class' => '
        inline-flex items-center px-4 py-2
        bg-primary-800
        text-white uppercase
        tracking-widest hover:bg-primary-700 focus:bg-primary-700 active:bg-primary-900
        focus:outline-none focus:ring-2 focus:ring-secondary-500 focus:ring-offset-2
        transition ease-in-out duration-500


        rounded-md
        border border-t-primary-700 border-r-primary-700 border-b-primary-900 border-l-primary-900
        hover:text-secondary-400
        hover:bg-primary-700
        hover:border-t-primary-500 hover:border-r-primary-500 hover:border-b-primary-900 hover:border-l-primary-900

        ']) }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['type' => 'submit', 'class' => '
        inline-flex items-center px-4 py-2
        bg-primary-800
        text-white uppercase
        tracking-widest hover:bg-primary-700 focus:bg-primary-700 active:bg-primary-900
        focus:outline-none focus:ring-2 focus:ring-secondary-500 focus:ring-offset-2
        transition ease-in-out duration-500


        rounded-md
        border border-t-primary-700 border-r-primary-700 border-b-primary-900 border-l-primary-900
        hover:text-secondary-400
        hover:bg-primary-700
        hover:border-t-primary-500 hover:border-r-primary-500 hover:border-b-primary-900 hover:border-l-primary-900

        ']) }}>
        {{ $slot }}
    </button>
@endif