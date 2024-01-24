<x-icons.material>smart_toy</x-icons.material>
<span class="flex-1">
    Created a new <x-ui.skills.linked-skill-list :models="$demo->skills" /> demo<br />
    <a href="{{ $demo->routeUrl }}" class="text-2xl text-secondary-100 hover:text-secondary-400" title="View the {{ $demo->name }} demo page">
        {{ $demo->name }}</a>
</span>
<a href="{{ $demo->routeUrl }}" class="text-secondary-400 hover:text-secondary-600">
    <img src="{{ $demo->image->url }}" alt="{{ $demo->name }}" class="rounded-lg max-h-16" />
</a>
