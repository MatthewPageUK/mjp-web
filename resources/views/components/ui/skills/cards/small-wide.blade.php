{{--
    Shows a Skill in small wide card with logo, name, level and last used date.
--}}
@props(['skill' => null])

<x-ui.card>
    <a href="{{ $skill->routeUrl }}" class="block lg:flex gap-2 p-4 items-center">
        <span class="flex gap-2 flex-1 block text-lg">
            {{ $skill->name }}
        </span>
        <span class="text-xs text-primary-500 border-primary-500 border-r pr-2">
            Used {{ $skill->lastUsed?->diffForHumans() }}
        </span>
        <span class="text-xs text-primary-500">
            {{ $skill->level->getGeneralLabel() }} ({{ $skill->level->value }})
        </span>
    </a>
</x-ui.card>
