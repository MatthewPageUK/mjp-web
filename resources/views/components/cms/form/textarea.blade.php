{{--
    CMS Text area form field
--}}
<textarea
    {{ $attributes->merge(['class' => 'w-full bg-primary-900 border border-primary-700 rounded-lg hover:border-primary-600
        hover:ring-secondary-400 focus:ring-secondary-400 focus:ring-offset-secondary-400 ring-secondary-400 ring-offset-secondary-400
    ']) }}
>
    {{ $slot }}
</textarea>

