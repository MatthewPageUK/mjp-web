@for ($x = 0; $x < 10; $x++)
    @if ($x >= $skill->level->value)
        <x-icons.material class="text-primary-300 text-lg opacity-10">star_rate</x-icons.material>
    @else
        <x-icons.material class="text-secondary-400 text-lg">star_rate</x-icons.material>
    @endif
@endfor