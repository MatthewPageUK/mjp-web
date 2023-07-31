{{--
    Simple CMS icon only button
--}}
@props(['icon' => ''])

<button {{ $attributes->merge(['class' => 'hover:text-amber-400']) }}>
    <x-icons.material>{{ $icon }}</x-icons.material>
</button>
