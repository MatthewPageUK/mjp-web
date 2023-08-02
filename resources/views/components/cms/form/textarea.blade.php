{{--
    CMS Text area form field
--}}
<textarea
    {{ $attributes->merge(['class' => 'w-full bg-zinc-800 border border-zinc-700 rounded-lg bg-zinc-800 hover:bg-zinc-700 hover:border-zinc-600']) }}
>
    {{ $slot }}
</textarea>

