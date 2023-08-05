{{--
    CMS Form Panel with title
--}}

@props(['title' => ''])

<form
    {{ $attributes->merge(['class' => 'XXmt-8 XXp-8 XXborder XXborder-zinc-500 rounded-lg XXbg-zinc-900']) }}
>
    <h2 class="mb-4 text-2xl font-semibold text-amber-400">{{ $title }}</h2>

    {{ $slot }}

</form>
