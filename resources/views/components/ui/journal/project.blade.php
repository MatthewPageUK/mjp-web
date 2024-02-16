<x-icons.material
    class="group-hover/card:animate-ping"
>
    rocket_launch
</x-icons.material>

<span class="flex-1">
    <span class="block">
        Created a new
        <x-ui.skills.linked-skill-list :models="$project->skills"/>
        project
    </span>

    <a
        href="{{ $project->routeUrl }}"
        class="text-2xl text-amber-600 hover:text-amber-400 dark:text-secondary-100 dark:hover:text-secondary-400"
        title="View the {{ $project->name }} project page"
    >
        {{ $project->name }}
    </a>
</span>
<a href="{{ $project->routeUrl }}">
    <img
        src="{{ $project->image?->url }}"
        alt="{{ $project->name }}"
        class="rounded-lg max-h-16"
    />
</a>
