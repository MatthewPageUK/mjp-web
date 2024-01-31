@props(['month'])

{{-- First day spacers --}}
@php($spacers = $month->copy()->firstOfMonth()->dayOfWeek == 0 ? 6 : $month->copy()->firstOfMonth()->dayOfWeek - 1)

@for ($i = 0; $i < $spacers; $i++)
    <div class="hidden md:block"></div>
@endfor
