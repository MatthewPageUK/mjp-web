{{--
    Shows a Project in small vertical card with image, title and date.
--}}
@props(['project' => null])

<x-ui.card>
    <a href="{{ $project->routeUrl }}" class="block space-y-2 pb-4" title="View the '{{ $project->name }}' project">
        <x-ui.imageable :model="$project" />
        <span class="block leading-tight text-lg px-4">{{ $project->name }}</span>
        <span class="block text-xs px-4">{{ $project->skills->pluck('name')->implode(', ') }}</span>
        <span class="block text-xs px-4 text-primary-400 flex items-center gap-1">Last activity
            <x-ui.badges.age :date="$project->updated_at" />
        </span>
    </a>
</x-ui.card>
