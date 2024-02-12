<x-icons.material class="group-hover/card:animate-ping">rocket_launch</x-icons.material>
<span class="flex-1">
    Created a new <x-ui.skills.linked-skill-list :models="$project->skills"/> project<br />
    <a href="{{ $project->routeUrl }}" class="text-2xl text-secondary-100 hover:text-secondary-400" title="View the {{ $project->name }} project page">
        {{ $project->name }}</a>
</span>
<a href="{{ $project->routeUrl }}" class="text-secondary-400 hover:text-secondary-600">
    <img src="{{ $project->image?->url }}" alt="{{ $project->name }}" class="rounded-lg max-h-16" />
</a>
