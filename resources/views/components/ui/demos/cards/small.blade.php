{{--
    Shows a Demo in small vertical card with image, title and date.
--}}
@props(['demo' => null])

<x-ui.card>
    <a href="{{ $demo->routeUrl }}" class="block space-y-2 pb-4" title="View the '{{ $demo->name }}' demo">
        <x-ui.imageable :model="$demo" />
        <span class="block leading-tight text-lg px-4">{{ $demo->name }}</span>
        <span class="block text-xs px-4">{{ $demo->skills()->pluck('name')->implode(', ') }}</span>
        <x-ui.badges.age :date="$demo->created_at" class="px-4"/>
    </a>
</x-ui.card>
