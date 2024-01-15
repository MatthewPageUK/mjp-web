<x-icons.material>{{ $skillLog->type->getUiIcon() }}</x-icons.material>
<span class="flex-1">
    {{ $skillLog->type->getLabel() }}
    <x-ui.skills.linked-skill-list :models="$skillLog->skills" />
    - {{ $skillLog->description }}
    @if ($skillLog->notes)
        <br />{{ $skillLog->notes }}
    @endif
    <span class="block text-primary-400 text-sm">{{ $skillLog->level->getLabel() }} ({{ $skillLog->duration }})</span>
</span>
