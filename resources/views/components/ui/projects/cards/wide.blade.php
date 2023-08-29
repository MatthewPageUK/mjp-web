{{--
    Shows project in wide horizontal card with image, title, snippet and date.
--}}
@props(['project' => null])
<x-ui.card>
    <div class="grid grid-cols-1 lg:grid-cols-2 overflow-hidden">
        <p class="p-4">
            <a href="{{ $project->routeUrl }}" class="block mb-2">
                <span class="block font-bold text-lg text-secondary-400">{{ $project->name }}</span>
                <span class="block text-sm">{{ $project->snippet }}</span>
                <span class="block text-xs mt-2 text-primary-400 flex items-center gap-1">Created : <x-ui.badges.age :date="$project->created_at" /></span>
            </a>
        </p>
        <div class="order-first lg:order-last">
            <a href="{{ $project->routeUrl }}">
                <img src="{{ $project->image }}" class="" />
            </a>
        </div>
    </div>
</x-ui.card>
