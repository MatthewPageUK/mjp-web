{{--
    Simple CMS text only button
--}}
@props(['label' => ''])

<button {{ $attributes->merge([
    'class' => 'rounded px-6 py-2
        bg-black border border-t-zinc-700 border-r-zinc-700 border-b-zinc-900 border-l-zinc-900
        hover:text-amber-400 hover:bg-zinc-700 hover:border-t-zinc-500 hover:border-r-zinc-500 hover:border-b-zinc-900 hover:border-l-zinc-900'
]) }}>
    {{ $label }}
</button>



