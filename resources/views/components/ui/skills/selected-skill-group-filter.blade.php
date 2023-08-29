@props(
    [
        'wiremodel' => 'selectedSkillGroup',
        'skillGroups' => [],
    ]
)
<select wire:model="{{ $wiremodel }}" class="bg-primary-800 ml-2 border border-primary-700 rounded-lg hover:bg-primary-600 hover:border-primary-600">
    <option value="">All</option>
    @foreach ($skillGroups as $skillGroup)
        <option value="{{ $skillGroup->slug }}">{{ $skillGroup->name }}</option>
    @endforeach
</select>
