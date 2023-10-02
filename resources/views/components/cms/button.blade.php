{{--
    Simple CMS button
--}}
<button {{ $attributes->merge([
    'class' => 'rounded px-6 py-2
        bg-black border border-t-primary-700 border-r-primary-700 border-b-primary-900 border-l-primary-900
        enabled:hover:text-secondary-400 enabled:hover:bg-primary-700 enabled:hover:border-t-primary-500 enabled:hover:border-r-primary-500 enabled:hover:border-b-primary-900 enabled:hover:border-l-primary-900
        disabled:opacity-20 disabled:cursor-not-allowed'
]) }}>
    {{ $slot }}
</button>



