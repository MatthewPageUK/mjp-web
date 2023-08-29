{{--
    Shows a Skill in small wide card with logo, name and stars.
--}}
@props(['skill' => null])

<x-ui.card>
    <a
        href="{{ $skill->url }}"
        title="About my {{ $skill->name }} skills"
        class="block p-4"
        >
        <span class="block font-bold text-lg">{{ $skill->name }}</span>
        <x-ui.skills.stars :skill="$skill" />
    </a>
</x-ui.card>
