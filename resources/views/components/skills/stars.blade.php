@for ($x = 0; $x < 10; $x++)
    @if ($x >= $skill->level)
        <span class="material-icons-outlined text-primary-600 text-base">star_rate</span>
    @else
        <span class="material-icons-outlined text-secondary-400 text-base">star_rate</span>
    @endif
@endfor