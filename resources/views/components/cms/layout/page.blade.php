{{-- Inner page of the CMS layout --}}
<div
    {{ $attributes->merge(['class' => 'pt-24 lg:pt-8']) }}}
>
    {{ $slot }}
</div>
