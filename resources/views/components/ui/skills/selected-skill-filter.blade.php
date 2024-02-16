@props(
    [
        'wiremodel' => 'selectedSkill',
        'skills' => [],
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
    <option value="">Any skills</option>
    @foreach ($skills as $skill)
        <option value="{{ $skill->slug }}">{{ $skill->name }}</option>
    @endforeach
</select>
