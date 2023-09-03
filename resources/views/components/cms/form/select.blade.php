{{--
    CMS Select form field
--}}
<select
    {{ $attributes->merge(['class' => 'w-full border border-primary-700 rounded-lg bg-primary-800 hover:bg-primary-700 hover:border-primary-600
        hover:ring-secondary-400 focus:ring-secondary-400 focus:ring-offset-secondary-400 ring-secondary-400 ring-offset-secondary-400
    ']) }}
>
    {{ $slot }}
</select>