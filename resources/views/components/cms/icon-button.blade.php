{{--
    Simple CMS icon only button
--}}
@props(['icon' => '', 'iconClass' => '', 'href' => null])

@if ($href)

    <a href="{{ $href }}" {{ $attributes->merge(['class' => 'hover:text-secondary-400']) }}>
        <x-icons.material class="block {{ $iconClass }}">{{ $icon }}</x-icons.material>
    </a>

@else

    <button {{ $attributes->merge(['class' => 'hover:text-secondary-400']) }}>
        <x-icons.material class="block {{ $iconClass }}">{{ $icon }}</x-icons.material>
    </button>

@endif
