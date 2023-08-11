{{--
    CMS Form Panel with title
--}}

@props(['title' => ''])

<form
    {{ $attributes->merge(['class' => 'rounded-lg']) }}
>
    <h2 class="mb-4 text-2xl font-semibold text-secondary-400">{{ $title }}</h2>

    {{ $slot }}

</form>
