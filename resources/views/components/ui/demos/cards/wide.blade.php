{{--
    Shows post in wide horizontal card with image, title, snippet and date.
--}}
@props(['demo' => null])
<x-ui.card>
    <div class="grid grid-cols-1 lg:grid-cols-2 overflow-hidden">
        <p class="p-4">
            <a href="{{ $demo->routeUrl }}" class="block mb-2">
                <span class="block font-bold text-lg group-hover/card:text-secondary-400">{{ $demo->name }}</span>
                <span class="block text-sm">{{ $demo->snippet }}</span>
                <span class="block text-xs mt-2 text-primary-400 flex items-center gap-1">Created : <x-ui.badges.age :date="$demo->created_at" /></span>
            </a>
        </p>
        <div class="order-first lg:order-last">
            <a href="{{ $demo->routeUrl }}">
                <x-ui.imageable :model="$demo" />
            </a>
        </div>
    </div>
</x-ui.card>
