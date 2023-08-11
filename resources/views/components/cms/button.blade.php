{{--
    Simple CMS button
--}}
<button {{ $attributes->merge([
    'class' => 'rounded px-6 py-2
        bg-black border border-t-primary-700 border-r-primary-700 border-b-primary-900 border-l-primary-900
        hover:text-secondary-400 hover:bg-primary-700 hover:border-t-primary-500 hover:border-r-primary-500 hover:border-b-primary-900 hover:border-l-primary-900'
]) }}>
    {{ $slot }}
</button>



