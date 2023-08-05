{{--
    CMS Form Panel with title
--}}

@props(['title' => ''])

<form
    {{ $attributes->merge(['class' => 'XXmt-8 XXp-8 XXborder XXborder-zinc-500 rounded-lg XXbg-zinc-900']) }}
>
    <h2 class="mb-4 text-2xl font-semibold text-amber-400">{{ $title }}</h2>

    <div class="grid grid-cols-12 gap-x-8 gap-y-1 md:gap-y-4">
        {{ $slot }}
    </div>

</form>
