@props(
    [
        'wiremodel' => 'selectedSkill',
        'skills' => [],
    ]
)
<select wire:model="{{ $wiremodel }}" class="bg-primary-800 ml-2 border border-primary-700 rounded-lg hover:bg-primary-600 hover:border-primary-600">
    <option value="">Any skills</option>
    @foreach ($skills as $skill)
        <option value="{{ $skill->slug }}">{{ $skill->name }}</option>
    @endforeach
</select>