{{--
    Simple CMS icon only button
--}}
@props(['icon' => '', 'iconClass' => ''])

<button {{ $attributes->merge(['class' => 'hover:text-secondary-400']) }}>
    <x-icons.material class="block {{ $iconClass }}">{{ $icon }}</x-icons.material>
</button>
