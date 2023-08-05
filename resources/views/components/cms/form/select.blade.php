{{--
    CMS Select form field
--}}
<select
    {{ $attributes->merge(['class' => 'w-full bg-zinc-900 border border-zinc-700 rounded-lg bg-zinc-800 hover:bg-zinc-700 hover:border-zinc-600
    hover:ring-amber-400 focus:ring-amber-400 focus:ring-offset-amber-400 ring-amber-400 ring-offset-amber-400
    ']) }}
>
    {{ $slot }}
</select>