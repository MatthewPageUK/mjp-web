@props(
    [
        'wiremodel' => 'selectedSkillGroup',
        'skillGroups' => [],
    ]
)
<select
    wire:model.live="{{ $wiremodel }}"
    class="
        dark:bg-primary-800
        ml-2
        border-0 dark:border
        dark:border-primary-700
        rounded-lg
        dark:hover:bg-primary-600
        dark:hover:border-primary-600
    "
>
    <option value="">All</option>
    @foreach ($skillGroups as $skillGroup)
        <option value="{{ $skillGroup->slug }}">{{ $skillGroup->name }}</option>
    @endforeach
</select>
