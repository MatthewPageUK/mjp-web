{{--
    CMS Form Panel with title
--}}

@props(['title' => ''])

<form
    {{ $attributes->merge(['class' => 'mt-8 p-8 border border-zinc-500 rounded-lg bg-zinc-900']) }}
>
    <h2 class="mb-4 text-2xl font-semibold text-amber-400">{{ $title }}</h2>

    {{ $slot }}

</form>
