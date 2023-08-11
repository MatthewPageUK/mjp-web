{{--
    CMS Form Panel with title
--}}

@props(['title' => ''])

<form
    {{ $attributes->merge(['class' => 'rounded-lg']) }}
>
    <h2 class="mb-4 text-2xl font-semibold text-secondary-400">{{ $title }}</h2>

    <div class="grid grid-cols-12 gap-x-8 gap-y-1 md:gap-y-4">
        {{ $slot }}
    </div>

</form>
