{{--
    Shows project in wide horizontal card with image, title, snippet and date.
--}}
@props(['project' => null])
<x-ui.card>
    <a href="{{ $project->routeUrl }}" title="View project {{ $project->name }}" class="grid grid-cols-1 lg:grid-cols-2 overflow-hidden">
        <p class="p-4 grid">
            <span class="block font-bold text-lg leading-tight group-hover/card:text-secondary-400">{{ $project->name }}</span>
            <span class="block text-sm">{{ $project->snippet }}</span>
            <span>{{ implode(', ', $project->skills->pluck('name')->toArray()) }}</span>

            <span class="block text-xs text-primary-400 grid grid-cols-2 items-center self-end">Last active : <x-ui.badges.age :date="$project->last_active" /></span>
            <span class="block text-xs text-primary-400 grid grid-cols-2 items-center self-end">Created : <x-ui.badges.age :date="$project->created_at" /></span>

        </p>
        <div class="order-first lg:order-last">
            <x-ui.imageable :model="$project" />
        </div>
    </a>
</x-ui.card>
