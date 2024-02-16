@php(
    $class = "inline-flex
        items-center
        px-4 py-2
        uppercase
        tracking-widest

        text-primary-900
        dark:text-white

        dark:focus:bg-primary-700
        dark:active:bg-primary-900
        focus:outline-none
        focus:ring-2
        focus:ring-secondary-500
        focus:ring-offset-2
        XXtransition ease-in-out duration-500

        bg-amber-400
        hover:bg-amber-500

        rounded-md
        dark:bg-primary-800
        dark:border
        dark:border-t-primary-700
        dark:border-r-primary-700
        dark:border-b-primary-900
        dark:border-l-primary-900
        dark:hover:text-secondary-400
        dark:hover:bg-primary-700
        dark:hover:border-t-primary-500
        dark:hover:border-r-primary-500
        dark:hover:border-b-primary-900
        dark:hover:border-l-primary-900"
)
@if (isset($href))
    <a {{ $attributes->merge(['class' => $class]) }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['type' => 'submit', 'class' => $class]) }}>
        {{ $slot }}
    </button>
@endif